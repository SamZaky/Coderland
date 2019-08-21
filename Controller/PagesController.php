<?php
namespace Moi\MonProjet\Controller; // namespace permettra d'éviter de toujours faire des require
use Controller;


class PagesController extends \Moi\Core\Controller {

    public function home(){
        // Afficher la vue en utilisant la méthode render de la class parent Controller
        /*$test = "abc";
        $name = "hak";
        $temp = 50;*/

        /*$db= new \PDO('mysql:host=localhost;dbname=projet',"root","root");

        $recup=$db-> prepare('SELECT * FROM products');
        $recup->execute();
        $req_products = $recup->fetchAll(\PDO::FETCH_ASSOC);
        $this->render("home",[
            "req_products"=>$req_products]);*/
            $this->render("home");

    }
    public function contact(){
        $this->render("contact");
    }

    public function front(){
        $this->render("front");
    }
    public function back(){
        $this->render("back");
    }
    public function error(){
        //include"../views/404.php";
        $this->render("404");
    }

    public function rps(){
        $this->render("rps");
    }
}