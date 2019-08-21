<?php
namespace Moi\MonProjet\Model; // namespace permettra d'éviter de toujours faire des require
class Product{

    function __construct(){
        $this->db = new \PDO('mysql:host=localhost;dbname=projet',"root","root");
    }

    public function add ($name, $description, $image){

        $request = $this->db->prepare("INSERT INTO articles (name,description,image) VALUES (:name,:description,:image)");
        $request->execute([
            "name"=>$name ,
            "description"=>$description,
            "image"=>$image
        ]);
    }

    public function getById($id){
        // Requête récupérant les données du produit dont l'ID se trouve en paramètre
        // Retourner les résultats(return)
        $display = $this->db->prepare('SELECT * FROM articles WHERE id=:id');
        $display->execute(["id"=>$id]);
        $product = $display->fetch(\PDO::FETCH_ASSOC);
        return $product;
    }

    public function editadmin($id, $name,$description,$image){
        // Effectuer une requête qui modifie le produit dont l'ID et les données se trouvent en paramètre
        $request = $this->db->prepare('UPDATE articles SET name = :name , description = :description, image = :image WHERE id = :id');
        $request->execute([
            "name" => $name,
            "description" => $description,
            "image"=>$image,
            "id" => $id
            ]);
    }

    public function delete($id){
        // Effectuer une requête qui supprime le produit dont l'ID se trouve dans l'URL
        $delete = $this->db->prepare("DELETE FROM articles WHERE id = :id");
        $delete->execute(["id" => $id]);
    }

    public function getAll(){
        // Effectuer une requête qui récupère tous les produits stockés en base de données
        // Retourner les résultats(return)
        $recup=$this->db-> prepare('SELECT * FROM articles');
        $recup->execute();
        $req_products = $recup->fetchAll(\PDO::FETCH_ASSOC);
        return $req_products;
    }

}