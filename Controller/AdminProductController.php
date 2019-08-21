<?php
namespace Moi\MonProjet\Controller; // namespace permettra d'éviter de toujours faire des require
use Controller;


class AdminProductController extends \Moi\Core\Controller {

    public function admin(){

        $productModel = new \Moi\MonProjet\Model\Product();
        $req_products = $productModel->getAll();
        $this->render("admin",[
            "req_products"=>$req_products]);
    }


    public function edit(){

        $productModel = new \Moi\MonProjet\Model\Product();
        $product = $productModel->getById($_GET["id"]);
        if (!empty($_POST['name']) && !empty($_POST['image'])&& !empty($_POST['description'])) {
            $productModel->editadmin($_GET['id'],htmlentities($_POST['name']),htmlentities($_POST['description']),htmlentities($_POST['image']));
            header('Location:../public/admin');
        }
        $this->render("edit",[
            "product"=>$product]);
    }

    public function delete(){
        $productModel = new \Moi\MonProjet\Model\Product();
        $productModel->delete($_GET['id']);
        header("Location:../public/admin");
        exit();
    }

}