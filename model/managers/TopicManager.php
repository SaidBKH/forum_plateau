<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class TopicManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";

    public function __construct(){
        parent::connect();
    }

    // récupérer tous les topics d'une catégorie spécifique (par son id)
    public function findTopicsByCategory($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.category_id = :id";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }
    public function updateTitle($id, $title) {
        $sql = "UPDATE {$this->tableName} SET title = :title WHERE id_topic = :id";
        DAO::update($sql, ['title' => $title, 'id' => $id]);
    }

    public function deleteTopicById($id) {
        $sql = "DELETE FROM {$this->tableName} WHERE id_topic = :id";
        DAO::delete($sql, ['id' => $id]);
        header("Location: index.php?ctrl=forum&action=index");
exit();
    }
  
    public function deleteById($id) {
        $sql = "DELETE FROM {$this->tableName} WHERE id_post = :id";
        DAO::delete($sql, ['id' => $id]);
        header("Location: index.php?ctrl=forum&action=index");
exit();
    }


    public function lockTopic($id) {
        $sql = "UPDATE {$this->tableName} SET closed = 1 WHERE id_topic = :id";
       var_dump($sql); 
        DAO::update($sql, ['id' => $id]);

    }
    
    public function unlockTopic($id) {
        $sql = "UPDATE {$this->tableName} SET closed = 0 WHERE id_topic = :id";
        DAO::update($sql, ['id' => $id]);
    }
    

    public function findLatestTopics() {
        $sql = "SELECT * FROM topic ORDER BY creationDate DESC LIMIT 5";
        return  $this->getMultipleResults(
            DAO::select($sql), 
            $this->className
        );
    }

   
}
