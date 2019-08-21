<?php
namespace Moi\Core;
class Controller {

    protected function render($viewName, $variables = []){
        //var_dump($variables); // ["test" => "abc", "name" => "hak"]

        extract($variables);//extract permet de prendre test et hak et d'en faire des variable

        //echo $test;

        ob_start();
        require "../views/$viewName.php";
        $content = ob_get_clean();
        require "../views/layout.php";

    }

}