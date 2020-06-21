<?php

namespace Source\Controllers;
Use Source\Core\Controller;

class Products extends Controller {

    

    
    public function index(){
        

        $this->loadTemplate("home",$this->data);
    }

    
    
};