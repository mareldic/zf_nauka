<?php
namespace User\Form;

use Zend\Form\Annotation\InputFilter;
class LoginFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
        	"name" => "email",
            "required" => true,
            "validators" => array(
        	   array(
                   "name" => "EmailAddress",
        	       "options" => array(
            	       "domain" => true,
                    ),
               ),
            ),
        ));
        
        $this->add(array(
            'name'       => 'password',
            'required'   => true,
        ));
    }
}