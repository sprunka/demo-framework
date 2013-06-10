<?php

namespace DEMO\Framework\Controller;

use \DEMO\Framework\View\Template;
use DEMO\Application\Models;
use Inflection\Inflection;

/**
 * Base class for Controllers
 * @author Sean Prunka
 * @version 1.0
 *
 */
abstract class VanillaController
{
    protected $pController;
    protected $pAction;
    protected $pTemplate;

    public $renderHeader;
    public $render;

    public function __construct($controller, $action, Inflection $inflect)
    {
        $this->pController = ucfirst($controller);
        $this->pAction = $action;

        $model = '\\DEMO\\Application\\Models\\' . ucfirst($inflect->singularize($controller));
        $this->renderHeader = RENDER_HEADER;
        $this->render = 1;
        $this->$model = new $model($inflect);
        $this->pTemplate = new Template($controller, $action);
    }

    abstract public function beforeAction();

    abstract public function afterAction();

    public function set($name, $value)
    {
        $this->pTemplate->set($name, $value);
    }

    public function __destruct()
    {
        if ($this->render) {
            $this->pTemplate->render($this->renderHeader);
        }
    }
}
