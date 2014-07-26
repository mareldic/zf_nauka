<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        //return new ViewModel();
//         return array(
//         	"version" => "0.0.1",
//             "applicationName" => "Training Center",
//         );

        $serviceLocator = $this->getServiceLocator();
        $config = $serviceLocator->get('config');
        return array(
        	"version" => $config['application']["version"],
            "applicationName" => $config["application"]["name"]
        );
        
    }
    
    public function aboutAction()
    {
//         $view = new ViewModel();
//         $view->setTemplate("/application/index/about");
//         return $view;
        return array();
    }
}
