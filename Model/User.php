<?php
namespace Moi\MonProjet\Model; // namespace permettra d'éviter de toujours faire des require


class User {

    function __construct(){
        $this->db = new \PDO('mysql:host=localhost;dbname=projet',"root","root");
    }
    public function signup($firstname, $lastname,$email,$passwordHash){
    $request=$this->db->prepare('INSERT INTO user(firstName, lastName,email,password)VALUES(:firstName, :lastName,:email,:password)');
    $request->execute([
        "firstName"=>$firstname,
        "lastName"=>$lastname,
        "email"=>$email,
        "password"=>$passwordHash

     ]);
    }

    public function mailVerif($email){
        $mailrequest = $this->db->prepare("SELECT * FROM user WHERE email= :email");
        $mailrequest->execute(["email"=>$email]);
        $mailVerif = $mailrequest->fetch(\PDO::FETCH_ASSOC);
        return $mailVerif;
    }
}