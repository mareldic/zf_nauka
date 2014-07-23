<?php
namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Form\LoginForm;
use User\Form\LoginFilter;
/**
 * LoginController
 *
 * @author
 *
 * @version
 *
 */
class LoginController extends AbstractActionController
{

    /**
     * The default action - show the home page
     */
    public function indexAction()
    {
        $form = new LoginForm();
        $view = new ViewModel(array("form" => $form));
        return $view;
    }
    
    public function processAction()
    {
        if (!$this->request->isPost())
        {
            return $this->redirect()->toRoute(NULL, array(
                "controller" => "login",
                "action" => "index",
            ));
        }
        
        $post = $this->request->getPost();
        
        $form = new LoginForm();
        $inputFilter = new LoginFilter();
        $form->setInputFilter($inputFilter);
        
        $form->setData($post);        
        if (!$form->isValid())
        {
            $model = new ViewModel(array(
            	"error" => true,
                "form" => $form,
            ));
            $model->setTemplate("user/login/index");
            return $model;
        }
        return $this->redirect()->toRoute(NULL, array(
        	"controller" => "login",
            "action" => "confirm"
        ));
    }
}