<?php

namespace Source\Core;
class Core {

    /**
     * currentController e Action
     * detem a string que dizem o nome atual do controller
     * que deve ser usado e a ação que deve ser chamada
     * pelo controller.
     */

    /**
     * método que inicia o ciclo MVC.
     */
    public function run(){

        $url = explode("index.php",$_SERVER["PHP_SELF"]);
        $url =  end($url);
        $params = array();
        if(!empty($url) && $url != "/"){
            $url = explode("/",$url);
            array_shift($url);

          $currentController = "Source\\Controllers\\". ucfirst(strtolower($url[0]));

          if(isset($url[1])){
              $currentAction = $url[1];
            } else {
              $currentAction = "index";
            }
          if(count($url) > 2){
             $params = array_slice($url,2);
          }            

        } else {
          $currentController = "Source\\Controllers\\Home";
          $currentAction = "index";
        }

        $c = new $currentController();
        call_user_func_array([$c,$currentAction],$params);

    }
    
}