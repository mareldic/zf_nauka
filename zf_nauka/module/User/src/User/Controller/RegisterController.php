<?php
namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Form\RegisterForm;
use User\Form\RegisterFilter;
use User\Model\User;
use User\Model\UserTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
/**
 * RegisterController
 *
 * @author
 *
 * @version
 *
 */
class RegisterController extends AbstractActionController
{

    /**
     * The default action - show the home page
     */
    public function indexAction()
    {
        $form = new RegisterForm();
        $view = new ViewModel(array("form"=>$form));
        return $view;
    }
    
    public function processAction()
    {
        if (!$this->request->isPost())
        {
            return $this->redirect()->toRoute(null, array(
            	"controller" => "register",
                "action" => "index",
            ));
        }
        
        $post = $this->request->getPost();
        
        $form = new RegisterForm();
        $inputFilter = new RegisterFilter();
        $form->setInputFilter($inputFilter);
        
        $form->setData($post);
        if (!$form->isValid())
        {
            $model = new ViewModel(array(
            	"error" => true,
                "form" => $form,
            ));
            $model->setTemplate('user/register/index');
            return $model;
        }
        
        // Create user
        $this->createUser($form->getData());
        
        return $this->redirect()->toRoute(NULL, array(
        	"controller" => "register",
            "action" => "confirm"
        ));        
    }
    
    public function confirmAction()
    {
    	$viewModel  = new ViewModel();
    	$viewModel->setTemplate("/user/register/confirm");
    	return $viewModel;
    }
    
    protected function createUser(array $data)
    {    
    	$sm = $this->getServiceLocator();
    	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    
    	$resultSetPrototype = new ResultSet();
    	$resultSetPrototype->setArrayObjectPrototype(new User);
    	$tableGateway       = new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
    
    	$user = new User();
    	$user->exchangeArray($data);
    
    	$userTable = new UserTable($tableGateway);
    	$userTable->saveUser($user);
    
    	return true;
    }
}