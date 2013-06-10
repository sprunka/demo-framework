<?php
namespace DEMO\Application\Controllers;

use DEMO\Framework\Controller\VanillaController as VanillaController;

/**
 * Error Controller
 * @author Sean Prunka
 * @version 1.0
 */
class ErrorController extends VanillaController
{
    /**
     * Initialize
     */
    public function beforeAction()
    {
        $this->set('title', 'HTTP 404 File not found');
        $this->set('subtitle', '');
    }

    public function http404()
    {
    }

    public function afterAction()
    {
    }
}
