<?php
namespace User\Form;

use Zend\Form\Form;
class RegisterForm extends Form
{
    public function __construct($name=null)
    {
        parent::__construct("Register");
        $this->setAttribute('method', 'post');
        
        // input name
        $this->add(array(
        	"name" => "name",
            "attributes"=> array(
        	   "type" => "text",
               "required"=>"required",
            ),
            "options"=> array(
            	'label' => "Full Name",
            ),
        ));
        
        // input email
        $this->add(array(
        	"name"=> 'email',
            "attributes" => array(
        	   "type" => "email",
               "required"=>"required",
            ),
            "options"=> array(
            	"label" => "Email",
            ),
        ));
        
        // input password
        $this->add(array(
        	"name"=> "password",
            "attributes"=>array(
        	   "type" => "password",
               "required" =>"requied"
            ),
            "options"=> array(
        	   "label" => "Password",
            ),
        ));
        
        // input confirm password
        $this->add(array(
        	"name"=>"confirm_password",
            "attributes"=>array(
                "type"=>"password",
                "required"=>"required"
            ),
            "options"=>array(
        	   "label" =>"Confirm password",
            ),
        ));
        
        // submit button
        $this->add(array(
        	"name"=>"submit",
            "attributes" => array(
        	   "type"=>"submit",
               "value"=>"Register",
            ),
        ));
    }
}