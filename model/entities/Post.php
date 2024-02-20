<?php
namespace Model\Entities;

use App\Entity;

final class Post extends Entity{

    private $id;
    private $text;
    private $user;
    private $topic;
    private $creationDate;

    public function __construct($data){         
        $this->hydrate($data);        
    }
   
    public function getId(){
        return $this->id;
    }
   /**
     * Set the value of id
     *
     * @return  self
     */

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getText(){
        return $this->text;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */


    public function setText($text){
        $this->text = $text;
        return $this;
    }

    public function getUser(){
        return $this->user;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */

    public function setUser($user){
        $this->user = $user;
        return $this;
    }

    public function getTopic(){
        return $this->topic;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */

    public function setTopic($topic){
        $this->topic = $topic;
        return $this;
    }

    public function getCreationDate(){
        return $this->creationDate;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */

    public function setCreationDate($creationDate){
        $this->creationDate = $creationDate;
        return $this;
    }
}
