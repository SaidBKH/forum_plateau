<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

   // public function register () {}
  //  public function login () {}
  //  public function logout () {}

    public function registerForm() {
        return [
            "view" => VIEW_DIR . "security/registerForm.php",
            "meta_description" => "Formulaire d'inscription"
        ];
    }

    public function register() {

        $userManager = new UserManager();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nickName = filter_input(INPUT_POST, "nickName", FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
            $confirmPassword = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);       

         
         
         
            if (!preg_match("/^.{12,}$/", $password)) {
                echo "Le mot de passe doit contenir au moins 12 caractères.";
                $this->redirectTo("home","index");
             }


            //var_dump($nickName, $email, $password, $confirmPassword);
            if($nickName && $email && $password && $confirmPassword) {
        
                if ($userManager->emailExist($email)) {
                    echo "l'email existe deja";
                    $this->redirectTo("home","index");
                }
                
                // si les mots de passe correspondent 
                if ($password == $confirmPassword) {
                
                    $userManager->add([
                            "nickname" => $nickName,
                            "email" => $email,
                            "password" => password_hash($password, PASSWORD_DEFAULT), 
                            // password_hash — Crée une clé de hachage pour un mot de passe
                        // PASSWORD_DEFAULT - Utilisation de l'algorithme bcrypt (par défaut depuis PHP 5.5.0).
                            "role" => "Utilisateur"
                    ]);


                    $this->redirectTo("home", "index");
                }
            } 
        }
    }
}
