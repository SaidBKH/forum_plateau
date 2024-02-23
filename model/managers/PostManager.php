<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Post";
    protected $tableName = "post";

    public function __construct(){
        parent::connect();
    }

// récupérer tous les posts d'un post spécifique (par son id)
    public function findPostsByTopic($id) {
        $sql = "SELECT * 
        FROM ".$this->tableName." t 
        WHERE t.topic_id = :id";
        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }


    public function findPostsByUser($id) {

        $sql = "SELECT * 
                FROM post 
                WHERE user_id = :id";
       
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            'Model\Entities\Post'        );
    }

        public function updateText($id, $text) {
            $sql = "UPDATE {$this->tableName} SET text = :text WHERE id_post = :id";
            DAO::update($sql, ['text' => $text, 'id' => $id]);
        }
    
        public function deleteById($id) {
            $sql = "DELETE FROM {$this->tableName} WHERE id_post = :id";
            DAO::delete($sql, ['id' => $id]);
            header("Location: index.php?ctrl=forum&action=index");
exit();
        }
    }
