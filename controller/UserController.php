<?php

    namespace Controller;
    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;
    use Model\Managers\TopicManager;
    use Model\Entities\User;


    class UserController extends AbstractController implements ControllerInterface{

        public function index(){
                     
                   return [
                "view" => VIEW_DIR."security/profile.php",
                "meta_description" => "Page d'accueil du profil",
                "data" => [ 
                    
                ]
            ];
        }


    }