<?php
namespace DEMO\Application\Controllers;

use DEMO\Framework\Controller\VanillaController as VanillaController;
/**
 * Sample Controller for Navigation Menu
 * @author Sean Prunka
 * @version 1.0
 *
 */
class NavController extends VanillaController
{

    /**
     * Initialize
     */
    public function beforeAction()
    {
    }

    /**
     * This is the menu method of the Nav Controller.
     * This is the method that will be called when you visit /Nav/menu
     */
    public function menu()
    {
        $this->set('renderHeader', DONT_RENDER_HEADER);
    }

    public function afterAction()
    {
    }

}
