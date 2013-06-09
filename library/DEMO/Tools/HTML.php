<?php
namespace DEMO\Tools;

/**
 * Helper tool for HTML output.
 * @author PRUNKAS
 *
 */
class HTML
{
    /**
     * Creates a link to one of the project's applications.
     * @param  string $text        Displayed text of the link
     * @param  string $path        Path on specified destination
     * @param  string $destination Which application
     * @param  string $target      target window
     * @param  string $class       Class to apply to link
     * @return string HTML formatted link
     */
    public function link($text, $path, $destination = BASE_PATH, $target = null, $class = null)
    {
        switch ($destination) {
            case WIKI_BASE:
                $path = str_replace(' ', '_', $path);
                break;
            default:
                $path = str_replace(' ', '-', $path);
                break;
        }

        $destination = (in_array($destination, array (BASE_PATH, GB_SEARCH_BASE, WIKI_BASE)) ? $destination : BASE_PATH);
        $target = ($target ? ' target="' . $target . '"' : '');
        $class = ($class ? ' class="' . $class . '"' : '');
        $data = '<a href="' . $destination . '/' . $path . '"' . $target . $class . '>' . $text . '</a>';

        return $data;
    }
    /**
     * Creates a link to one of the project's applications.
     * @param  string $text        Displayed text of the link
     * @param  string $path        Path on specified destination
     * @param  string $imageFile   Image to be displayed
     * @param  string $altText     Textual descriprition of the image being used
     * @param  string $destination Which application
     * @param  string $target      target window
     * @param  string $class       Class to apply to link
     * @return string HTML formatted link
     */
    public function imageLink($text, $path, $imageFile, $altText = "no description given", $destination = BASE_PATH, $target = null, $class = null)
    {
        switch ($destination) {
            case WIKI_BASE:
                $path = str_replace(' ', '_', $path);
                break;
            default:
                $path = str_replace(' ', '-', $path);
                break;
        }
        $src = BASE_PATH . '/img/' . $imageFile;
        $destination = (in_array($destination, array (BASE_PATH, GB_SEARCH_BASE, WIKI_BASE)) ? $destination : BASE_PATH);
        $target = ($target ? ' target="' . $target . '"' : '');
        $class = ($class ? ' class="' . $class . '"' : '');
        $data = '<a href="' . $destination . '/' . $path . '"' . $target . $class . 'title="' . $text . '"><img src="' . $src . '" title="' . $text . '" alt="' . $altText . '"/></a>';

        return $data;
    }

    /**
     * Creates a script tag to load the specified JS file.
     * @param  string $fileName base filename without extension
     * @return string HTML formatted script link
     */
    public function includeJs($fileName)
    {
        $data = '<script src="' . BASE_PATH . '/js/' . $fileName . '.js" type="text/javascript"></script>';

        return $data;
    }

    /**
     * Creates a link tag for the specified CSS file
     * @param  string $fileName base filename without extension
     * @return string
     */
    public function includeCss($fileName)
    {
        $data = '<link rel="stylesheet" href="' . BASE_PATH . '/css/' . $fileName . '.css" />';

        return $data;
    }

    /**
     * Creates a link tag for the specified CSS file
     * @param  string $fileName base filename without extension
     * @return string
     */
    public function image($fileName, $altText = "no description given", $title = null, $class = null)
    {
        $class = ($class ? ' class="' . $class . '"' : '');
        $title = ($title ? ' title="' . $title . '"' : '');
        $data = '<img src="' . BASE_PATH . '/img/' . $fileName . '"' . $title . $class . ' alt="' . $altText . '" />';

        return $data;
    }
}
