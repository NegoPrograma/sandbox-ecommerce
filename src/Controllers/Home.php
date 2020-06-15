<?php

namespace Source\Controllers;
Use Source\Core\Controller;

class Home extends Controller {

    /**
     * 
     */
    private $data = array();

    
    public function index(){
        

        $this->loadTemplate("home",$this->data);
    }

    
    
};