<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/User for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        return $view;
    }

/*     public function registerAction()
    {
        $view = new ViewModel();
        $view->setTemplate("/user/index/new-member");
        return $view;
    }
    
    public function loginAction()
    {
        $view = new ViewModel;
        $view->setTemplate("/user/index/login");
        return $view;
    } */
}
