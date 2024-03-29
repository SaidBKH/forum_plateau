<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Topic extends Entity{

    private $id;
    private $title;
    private $user;
    private $category;
    private $creationDate;
    private $closed;

           
    private $nbTopics; 
    private $reCount;

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

    /**
     * Get the value of title
     */ 
    public function getTitle(){
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser(){
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user){
        $this->user = $user;
        return $this;
    }

    public function __toString(){
        return $this->title;
    }

    /**
 * Get the value of category
 */ 
public function getCategory(){
    return $this->category;
}

/**
 * Set the value of category
 *
 * @return  self
 */ 
public function setCategory($category){
    $this->category = $category;
    return $this;
}

/**
 * Get the value of creationDate
 */ 
public function getCreationDate(){
    $date = $this->creationDate->format('d-m-Y H:i');
    return $date;
}

/**
 * Set the value of creationDate
 *
 * @return  self
 */ 
public function setCreationDate($creationDate){
    $this->creationDate =new \DateTime($creationDate);
    return $this;
}

/**
 * Get the value of closed
 */ 
public function getClosed(){
    return $this->closed;
}

/**
 * Set the value of closed
 *
 * @return  self
 */ 
public function setClosed($closed){
    $this->closed = $closed;
    return $this;
}

public function getNbTopics()
{
        return $this->nbTopics;
}

/**
 * Set the value of nbMessages
 *
 * @return  self
 */ 
public function setNbTopics($nbTopics)
{
        $this->nbTopics = $nbTopics;

        return $this;
}



public function getReCount()
{
    return $this->reCount;
}

/**
 * @return  self
 */ 
public function setReCount($reCount)
{
    $this->reCount = $reCount;

    return $this;
}



}

