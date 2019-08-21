<?php

/*if(!isset($_GET["url"])){
 $url="/";
}else{
 $url=$_GET["url"];
}

switch($url){
 case "/":
  include"../src/controller/PagesController.php";
  $home= new PagesController() ;
  $home->home();
  break;
 case "products":
  include"../src/controller/ProductsController.php";
  $products= new ProductsController() ;
  $products->products();
  break;
 case "products/add" :
  include"../src/controller/ProductsController.php";
  $products_add= new ProductsController() ;
  $products_add->products_add();
   break;
 default:
  include"../src/controller/PagesController.php";
  $error= new PagesController() ;
  $error->error();
  break;
}*/
namespace Moi\Core; // namespace permettra d'éviter de toujours faire des require
class Router{
function __construct(){
    $this ->url= !isset($_GET["url"])?"/" : ($_GET["url"]);//meme chose qu'en haut avec le if et else ici ?-> alors et : -> sinon // une propriété
}

    private $routes=[ // une propriété
        "/" => [
            "action" => "PagesController@home",
            "name" => "home"

        ],

        "contact" => [
            "action" => "PagesController@contact",
            "name" => "contact"

        ],

        "front" => [
            "action" => "PagesController@front",
            "name" => "front"

        ],

        "back" => [
            "action" => "PagesController@back",
            "name" => "back"

        ],

        "rps" => [
            "action" => "PagesController@rps",
            "name" => "rps"

        ],

        "products" => [
            "action" => "ProductsController@products",
            "name" => "listeProduits"

        ],

        "product" => [
            "action" => "ProductsController@product",
            "name" => "listeProduit"

        ],

        "add" => [
            "action" => "ProductsController@products_add",
            "name" => "listeAjout",
            "admin" => true
        ],

        "error" => [
            "action" => "PagesController@error",
            "name" => "pageError"

        ],

        "admin" => [
            "action" => "AdminProductController@admin",
            "name" => "admin",
            "admin" => true
        ],

        "suppression" => [
            "action" => "AdminProductController@delete",
            "name" => "listeDelete",
            "admin" => true
        ],

        "edit" => [
            "action" => "AdminProductController@edit",
            "name" => "listeDedit",
            "admin" => true
        ],

        "delete" => [
            "action" => "AdminProductController@delete",
            "name" => "listeDelete",
            "admin" => true
        ],

        "signup" => [
            "action" => "ConnexionController@signup",
            "name" => "listeSignup"

        ],

        "login" => [
            "action" => "ConnexionController@login",
            "name" => "listeLogin"

        ],

        "logout" => [
            "action" => "ConnexionController@logout",
            "name" => "listeLogout"

        ],



    ];

    public function run(){
        foreach ($this->routes as $path=>$route) {// à paritr du moment que c'est une propriété on utilise $this
            //var_dump($this->routes);
            //var_dump($this->url);


            if ($path == $this->url) {
                if (isset($route["admin"]) && $route["admin"] === true && (empty($_SESSION["user"]) || $_SESSION["user"]["role"] != "1")) {
                    header("Location:../public/");
                    exit();
                }
                $action = explode("@", $route["action"]);
                $controllerN = "\Moi\MonProjet\Controller\\" . $action[0];
                $methodN = $action[1];
                //include "../src/controller/" . $controllerN . ".php";
                $controller = new $controllerN();
                $controller->$methodN();
            }
        }
        if(!isset($action)){
            //include "../src/controller/PagesController.php";
            $controller = new \Moi\MonProjet\Controller\PagesController();
            $controller -> error();
        }
    }
}


