<?php

namespace Moi\MonProjet\Controller; // namespace permettra d'éviter de toujours faire des require
class ProductsController extends \Moi\Core\Controller{
       public function products(){
           $productModel = new \Moi\MonProjet\Model\Product();
            $product = $productModel->getAll();
           $this->render("products",[
               "req_products"=>$product
           ]);
 }

    public function product(){
        $productModel = new \Moi\MonProjet\Model\Product();
        $product = $productModel->getById($_GET['id']);
        $this->render("product",[
            "products"=>$product
        ]);
    }
        public function products_add(){
            if(!empty($_POST["name"])&&!empty($_POST["description"])&&!empty($_POST["image"])){
                $productModel = new \Moi\MonProjet\Model\Product();
                $productModel->add(htmlentities($_POST["name"]),htmlentities($_POST["description"]), htmlentities($_POST["image"]));
                header("Location:../public/admin");
            }
            $this->render("products_add");
        }

}