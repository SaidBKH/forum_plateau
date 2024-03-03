<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class CategoryManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Category";
    protected $tableName = "category";

    public function __construct(){
        parent::connect();
    }
    public function addCategory($name) {
        $sql = "INSERT INTO {$this->tableName} (name) VALUES (:name)";
        DAO::insert($sql, ['name' => $name]);
    }


}