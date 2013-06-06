<?php
namespace DEMO\Framework;

use DEMO\Tools\Tools as Tools;
use DEMO\Tools\HTML as HTML;

/**
 * Base template for views
 * @author Sean Prunka
 *
 */
class Template
{

    protected $variables = array ();
    protected $pController;
    protected $pAction;

    public function __construct($controller, $action)
    {
        $this->pController = $controller;
        $this->pAction = $action;
    }

    /** Set Variables **/

    public function set($name, $value)
    {
        $this->variables[$name] = $value;
    }

    /** Display Template **/

    public function render($renderHeader = RENDER_HEADER)
    {

        $html = new HTML();
        //FIXME: Something other than this!
        //This can lead to very bad places potentially.
        //extract() is not a secure method of getting these variables out.
        //By some standards, extract() here is almost as bad as register globals, Mmmm'kay?
        extract($this->variables);
        /**
         * jg
         * Gah!  Don't use this in such a generic location?  It makes sense to call extract() for very small, isolated
         * scopes, where you know exactly what you are going to be doing in the code.  But when you import code from
         * an arbitrary (potentially growing and modified by other people) list of controllers,
         * it is getting controversial.
         */

        if ($renderHeader == RENDER_HEADER) {

            if (file_exists(ROOT_PATH . DS . 'Application' . DS . 'Views' . DS . $this->pController . DS . 'header.php')) {
                include (ROOT_PATH . DS . 'Application' . DS . 'Views' . DS . $this->pController . DS . 'header.php');
            } else {
                include (ROOT_PATH . DS . 'Application' . DS . 'Views' . DS . 'header.php');
            }
        }

        if (file_exists(ROOT_PATH . DS . 'Application' . DS . 'Views' . DS . $this->pController . DS . $this->pAction . '.php')) {
            include (ROOT_PATH . DS . 'Application' . DS . 'Views' . DS . $this->pController . DS . $this->pAction . '.php');
        }

        if ($renderHeader == RENDER_HEADER) {
            if (file_exists(ROOT_PATH . DS . 'Application' . DS . 'Views' . DS . $this->pController . DS . 'footer.php')) {
                include (ROOT_PATH . DS . 'Application' . DS . 'Views' . DS . $this->pController . DS . 'footer.php');
            } else {
                include (ROOT_PATH . DS . 'Application' . DS . 'Views' . DS . 'footer.php');
            }
        }
    }
}
