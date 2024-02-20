<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\PostManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["name", "DESC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function listTopicsByCategory($id) {

        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }
    public function listPostsByTopic($id) {
        $postManager = new PostManager();
        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($id);
        $posts = $postManager->findPostsByTopic($id);
        
        return [
            "view" => VIEW_DIR . "forum/listPosts.php",
            "meta_description" => "liste des post par sujet ",
            "data" => [
                "topic" => $topic,
                "posts" => $posts
            ]
        ];
    }
    public function listUser() {
        
        // créer une nouvelle instance de CategoryManager
        $userManager = new UserManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $users = $userManager->findAll(["nickName", "DESC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listUsers.php",
            "meta_description" => "Liste des Utilisateurs du forum",
            "data" => [
                "users" => $users
            ]
        ];
    }
    

    public function listPostsByUser($id) {

        $postManager = new PostManager();
        $userManager = new userManager();
        $user = $userManager->findOneById($id);
        $posts = $postManager->findPostsByUser($id);

        return [
            "view" => VIEW_DIR."forum/listPosts.php",
            "meta_description" => "Liste des post par utlisateur : ".$user,
            "data" => [
                "user" => $user,
                "posts" => $posts,
            ]
        ];
    }
    public function editPost($id) {
        $postManager = new PostManager();
        $post = $postManager->findOneById($id);

        return [
            "view" => VIEW_DIR . "forum/editPost.php",
            "meta_description" => "Modifier le post",
            "data" => [
                "post" => $post
            ]
        ];
    }

    public function confirmDeletePost($id) {
        $postManager = new PostManager();
        $post = $postManager->findOneById($id);

        return [
            "view" => VIEW_DIR . "forum/confirmDeletePost.php",
            "meta_description" => "Supprimer le post",
            "data" => [
                "post" => $post
            ]
        ];
    }

    public function updatePost($id) {
        $postManager = new PostManager();
        $post = $postManager->findOneById($id);

        if (isset($_POST['text'])) {
            $text = $_POST['text'];
            $postManager->updateText($id, $text);
            header("Location: index.php?ctrl=forum&action=listPostsByTopic&Id=" . $post->getTopic()->getId());
            exit();
        }
    }

    public function deletePost($id) {
        $postManager = new PostManager();
        $post = $postManager->findOneById($id);

        if (isset($_POST['confirm_delete'])) {
            $postManager->deleteById($id);
            header("Location: index.php?ctrl=forum&action=listPostsByTopic&Id=" . $post->getTopic()->getId());
            exit();
        }
    }
}

