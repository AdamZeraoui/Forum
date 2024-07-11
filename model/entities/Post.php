<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Post extends Entity{

    private $id;
    private $creation_date;
    private $topic;
    private $user;
    private $content;

    public function construct($data){
        $this->hydrate($data);
    }


    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of topic
     */
    public function getTopic() {
        return $this->topic;
    }

    /**
     * Set the value of topic
     */
    public function setTopic($topic): self {
        $this->topic = $topic;
        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set the value of user
     */
    public function setUser($user): self {
        $this->user = $user;
        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Set the value of content
     */
    public function setContent($content): self {
        $this->content = $content;
        return $this;
    }

    /**
     * Get the value of creation_date
     */
    public function getCreationDate() {
        return $this->creation_date;
    }

    /**
     * Set the value of creation_date
     */
    public function setCreationDate($creation_date): self {
        $this->creation_date = $creation_date;
        return $this;
    }

    public function __toString(){
        return $this->content;
    }
}