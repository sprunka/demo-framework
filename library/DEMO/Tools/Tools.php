<?php
namespace DEMO\Tools;

/**
 * A set of useful tools.
 *
 * @author PRUNKAS
 */
class Tools
{

    /**
     * This method should extract a requested var from the superglobal $_POST and perform sanitization if needed.
     * @param string $key
     * @param boolean $sanitize Default = FALSE
     * @param string $sanitizeMethod Default = null
     *
     * @return mixed
     */
    public static function getPostVar($key, $sanitize = false, $sanitizeMethod = null)
    {
        if (isset($_POST[$key])) {
            if ($sanitize && method_exists('DEMO\\Tools\\Tools', $sanitizeMethod)) {
                $value = self::$sanitizeMethod($_POST[$key]);
            } else {
                $value = $_POST[$key];
            }
            return $value;
        } else {
            return null;
        }
    }

    /**
     * Sanitizes string input for HTML output
     * @param string $text
     * @return string
     */
    public static function sanitizeHTML($text)
    {
        return htmlspecialchars($text);
    }

    /**
     * Sanitizes string input for MySQL output
     * @param string $text
     * @return string
     */
    public static function sanitizeMySQL($text)
    {
        return mysql_real_escape_string($text);
    }

    /**
     * Sanitizes string input for cli output
     * @param string $text
     * @return string
     */
    public static function sanitizeShell($cmd)
    {
        return escapeshellcmd($cmd);
    }

    /**
     * Creates an empty file. (Erases contents if file exists, creates file if not exists.)
     * @param string $filePath
     */
    public static function eraseContents($filePath)
    {
        $fh = fopen($filePath, "w");
        fwrite($fh, "");
        fclose($fh);
    }

    /**
     * Creates a temporary plain text file
     * @param string $text File contents
     * @param string $prefix
     * @return string
     */
    public static function createTextFile($text, $prefix)
    {
        $tempFile = tempnam(BLAST_TMP_PATH, $prefix);
        $handle = fopen($tempFile, "wb");
        fwrite($handle, $text);
        fclose($handle);
        return $tempFile;
    }

    /**
     * Reads a plain text file and returns the contents.
     * @param string $filename
     * @return string
     */
    public static function readTextFile($filename)
    {
        if (file_exists($filename)) {
            if (filesize($filename) > 0) {
                $handle = fopen($filename, 'rb');
                $contents = fread($handle, filesize($filename));
                fclose($handle);
                return $contents;
            } else {
                return "Error Reading File: {$filename}\n";
            }
        } else {
            return "File does not exist.";
        }

    }

    /**
     * Deletes files older than $howLong minutes in $dir matching $extPattern
     *
     * @param int $howOld
     * @param string $dir
     * @param string $extPattern
     */
    public static function cleanUpOldFiles($howOld, $dir, $extPattern)
    {
        $howOld = intval($howOld);
        $files = glob($dir . $extPattern, GLOB_BRACE);
        $logger = new Logger(BLAST_LOG_PATH . "deletions.log");
        foreach ($files as $file) {
            $filedate = date("U", filemtime($file));
            if ((date('U') - $filedate) > $howOld * 60) {
                $logger->warn("Deleting: $file");
                unlink($file);
            }
        }
    }

    /**
     * Takes a caught Exception and makes it human readable via HTML.
     * @param Exception $e
     * @param string $niceMsg
     * @return string
     */

    public static function getException(\Exception $e, $niceMsg)
    {
        $msg = $e->getMessage();
        $errorMsg = "I caught an exception. Please inform a developer.\n";
        $errorMsg .= $niceMsg;
        $errorMsg .= "Exact Message: " . $msg . "\n";
        if (DEBUG) {
            $errorMsg .= "An Error has occured:\n";
            $errorMsg .= "File: " . $e->getFile() . "\n";
            $errorMsg .= "Line: " . $e->getLine() . "\n";
            $errorMsg .= "<pre>StackTrace:\n" . print_r($e->getTraceAsString(), true) . "</pre>";
        }
        return $errorMsg;
    }

    /**
     * This method needs to never be called in production.
     * In fact it should probably be either commented out or deleted prior to production.
     *
     * @param mixed $var
     * @param string $name
     * @param bool $echo
     */
    public static function debug($var, $name = 'DEBUG', $echo = true)
    {
        if (DEBUG) {
            $output = "<pre>{$name}:\n" . print_r($var, true) . "</pre>\n";
            if ($echo) {
                echo $output;
            }
            return $output;
        } else {
            return null;
        }
    }

    /**
     * Convert an Array to stdClass.
     * @param array $array
     */
    public static function arrayToObject(array $array)
    {
        // Iterate through our array looking for array values.
        // If found recurvisely call itself.
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = self::arrayToObject($value);
            }
        }

        # Typecast to (object) will automatically convert array -> stdClass
        return (object) $array;
    }
}
