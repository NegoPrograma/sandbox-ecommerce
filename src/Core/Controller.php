<?php

namespace Source\Core;

class Controller{

    public function loadView($viewName,$viewData = array()){
        require_once 'src/Views/'.$viewName.'.php';
    }

    public function loadTemplate($viewName,$viewData = array()){
        require_once "src/Views/template.php";
    }

  
}