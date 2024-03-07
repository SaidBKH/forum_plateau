<?php
namespace Controller;
//Un name space est un espace ou sont  grouper un ensemble d'éléments, le but est d'eviter les conflits de noms,
//si j'aiplusieurs fichiers portant le même nom, tant qu'ils se trouvent dans des sous-dossiers différents, ils ne se confondront pas

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;


class HomeController extends AbstractController implements ControllerInterface {

    public function index(){

        $managerCategory = new CategoryManager();
        $managerTopic = new TopicManager();
        $categories = $managerCategory->findAll();;
        $latestTopics = $managerTopic->findLatestTopics();
        $topicManager = new TopicManager();
        $userManager = new UserManager();
        $postManager = new PostManager();
        

        return [
            "view" => VIEW_DIR."home.php",
            "meta_description" => "Page d'accueil du forum",
            "data" => [ 
                "categories" => $categories, 
                "latestTopics" => $latestTopics,
                "statUsers" => $userManager->countElem(),
                    "statTopics" => $topicManager->countElem(),
                    "statPosts" => $postManager->countElem()
            ]
        ];
    }     
    
    public function users(){
        $this->restrictTo("ROLE_USER");

        $manager = new UserManager();
        $users = $manager->findAll(['registerDate', 'DESC']);

        return [
            "view" => VIEW_DIR."security/users.php",
            "meta_description" => "Liste des utilisateurs du forum",
            "data" => [ 
                "users" => $users 
            ]
        ];
    }
}
