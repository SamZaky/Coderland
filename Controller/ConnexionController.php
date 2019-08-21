<?php
namespace Moi\MonProjet\Controller; // namespace permettra d'éviter de toujours faire des require
use Controller;


class ConnexionController extends \Moi\Core\Controller{

    public function signup(){

        $signModel = new \Moi\MonProjet\Model\User();

        if (!empty($_POST['firstname']) && !empty($_POST['lastname'])&& !empty($_POST['email'])&& !empty($_POST['password'])&& !empty($_POST['password_2'])) {

            $password = htmlentities($_POST['password']);
            $password_2=htmlentities($_POST['password_2']);

            if ($password == $password_2){
                $passwordHash = password_hash($password,PASSWORD_BCRYPT );//PASSWORD_DEFAULT serait conseillé car il utilisera le cryptage par defaut de php
                $mailVerif=$signModel->mailVerif(htmlentities($_POST['email']));
                if ($mailVerif["email"]== null){
                    $signModel->signup(htmlentities($_POST['firstname']),htmlentities($_POST['lastname']),htmlentities($_POST['email']),$passwordHash);
                    header('Location:../public/');

                }else{
                    echo "Cette adresse mail existe déjà";
                }

            }

        }
        $this->render("signup");
    }

    public function login(){
        $logModel = new \Moi\MonProjet\Model\User();
        if (!empty($_POST['email'])&& !empty($_POST['password'])){
            $user=$logModel->mailVerif(htmlentities($_POST['email']));
            $password=htmlentities($_POST['password']);
            if ($user['email']==htmlentities($_POST['email'])){
                $passwordHash = $user['password'];
                $verif = password_verify($password,$passwordHash);
                if ($verif==true){
                    $_SESSION["user"] = ['email'=>$user['email'] , 'password'=>$user['password'], 'role'=>$user['role']];
                    header('Location:../public/');
                    echo "<p>Logged In ;)</p>";
                }else{
                    header('Location:../public/login');
                    echo "<p>Email ou Mot De Passe Incorrect !</p>";

                }
            }

        }
        $this->render("login");
    }

    public function logout(){
        $this->render("logout");

    }


    }