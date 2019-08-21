<?php
ini_set("display_errors", 2);//trouve les erreurs
//require "../core/rooter.php";
//$router = new Router();
// namespace permettra d'éviter de toujours faire des require ici le namespace est Moi\Core plus le nom de la class qui est ici Router;

session_start();

use Moi\Core\Router;
function h_autoload($className){
    $prefix = "Moi\Core\\"; // Resto\

    if(strpos($className, $prefix) ==0){

        // Retirer le prefixe de $className
        $className = str_replace($prefix, "", $className);

        // Remplacer les \ par des /
        $className = str_replace("\\", "/", $className);

        $chemin = __DIR__ . "/../core/" . $className . ".php";

        if(file_exists($chemin)){
            require $chemin;
        }
    }
}
spl_autoload_register("h_autoload");




function w_autoload($className){
    $prefix = "Moi\MonProjet\\"; // Resto\

    if(strpos($className, $prefix) ==0){

        // Retirer le prefixe de $className
        $className = str_replace($prefix, "", $className);

        // Remplacer les \ par des /
        $className = str_replace("\\", "/", $className);

        $chemin = __DIR__ . "/../src/" . $className . ".php";

        if(file_exists($chemin)){
            require $chemin;
        }
    }
}
spl_autoload_register("w_autoload");



$router = new Moi\Core\Router();
$router ->run();