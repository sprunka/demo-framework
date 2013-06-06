<?php
namespace DEMO\Application\Controllers;

use DEMO\Framework\VanillaController as VanillaController;

/**
 * Sample Controller for Hello
 * @author Sean Prunka
 * @version 1.0
 *
 */
class HelloController extends VanillaController
{

    /**
     * Initialize
     */
    public function beforeAction()
    {
        $this->set('title', 'Hello World');
        $this->set('subtitle', '');
    }

    /**
     * This is the world method of the Hello Controller.
     * This is the method that will be called when you visit /hello/world
     */
    public function world()
    {
    }

    public function afterAction()
    {
    }
}
