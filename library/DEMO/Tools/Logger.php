<?php
namespace DEMO\Tools;

/**
 * For generating log files.
 * @author Sean Prunka, John Cleveland
 * @version 2.0
 *
 */
class Logger
{

    // Logger levels
    const DEBUG = "DEBUG";
    const INFO = "INFO";
    const WARN = "WARN";
    const ERROR = "ERROR";

    private $logFilePath = "";
    private $messages;
    private $messageLevels;

    public function __construct($logFilePath)
    {
        $this->logFilePath = $logFilePath;

        if (!file_exists($logFilePath)) {
            $fh = fopen($logFilePath, 'w');
            fclose($fh);
        }
    }

    public function debug($msg)
    {
        $this->logMessage($msg, self::DEBUG);
    }

    public function info($msg)
    {
        $this->logMessage($msg, self::INFO);
    }

    public function warn($msg)
    {
        $this->logMessage($msg, self::WARN);
    }

    public function error($msg)
    {
        $this->logMessage($msg, self::ERROR);
    }

    public function getAllMessages()
    {
        return $this->messages;
    }

    public function getAllMessageLevels()
    {
        return $this->messageLevels;
    }

    public function getErrorMessages()
    {
        return $this->getMessagesByLevel(self::ERROR);
    }

    public function getWarningMessages()
    {
        return $this->getMessagesByLevel(self::WARN);
    }

    public function getInfoMessages()
    {
        return $this->getMessagesByLevel(self::INFO);
    }

    public function getDebugMessages()
    {
        return $this->getMessagesByLevel(self::DEBUG);
    }

    public function clear()
    {
        $this->messages = array ();
        $this->messageLevels = array ();

        // Clear the log file
        $fh = fopen($this->logFilePath, "w");
        fwrite($fh, "");
        fclose($fh);
    }

    private function logMessage($message, $level)
    {

        $this->messages[] = $message;
        $this->messageLevels[] = $level;

        $logFile = fopen($this->logFilePath, "a");
        fwrite($logFile, date("Y.m.d H:i:s") . " $level: " . $message . "\n");
        fclose($logFile);
    }

    private function getMessagesByLevel($level)
    {
        for ($i = 0; $i < count($this->messages); $i++) {
            if (strcmp($this->messageLevels[$i], $level) == 0) {
                $messagesByLevel[] = $this->messages[$i];
            }
        }

        return $messagesByLevel;
    }
}
