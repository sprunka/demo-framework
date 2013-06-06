<?php
namespace DEMO\Framework;

use DEMO\Application\Models;

/**
 * Base class for Controllers
 * @author Sean Prunka
 * @version 1.0
 *
 */
class VanillaController
{
    
    protected $pController;
    protected $pAction;
    protected $pTemplate;
    
    public $renderHeader;
    public $render;
    
    public function __construct($controller, $action)
    {
        
        global $inflect;
        
        $this->pController = ucfirst($controller);
        $this->pAction = $action;
        
        $model = '\\DEMO\\Application\\Models\\' . ucfirst($inflect->singularize($controller));
        $this->renderHeader = RENDER_HEADER;
        $this->render = 1;
        $this->$model = new $model();
        $this->pTemplate = new Template($controller, $action);
    
    }
    
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
