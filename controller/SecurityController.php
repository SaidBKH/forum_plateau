<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;

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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nickName = filter_input(INPUT_POST, "nickName", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $confirmPassword = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);       

       // var_dump($nickName, $email, $password, $confirmPassword);

        if ($password !== $confirmPassword) {
            return [
                "view" => VIEW_DIR . "security/registerForm.php",
                "meta_description" => "Formulaire d'inscription",
                "data" => [
                    "error" => "Les mots de passe ne correspondent pas."
                ]
            ];
        }
    }

}
}