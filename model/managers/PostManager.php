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

    public function findPostsbyTopic($topicId) {

        $sql = "SELECT * FROM ".$this->tableName." 
        
        WHERE post.topic_id = :topicId";
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ["topicId" => $topicId]), 
            $this->className
        );
    }

    public function getTopicIdByPostId($postId)
    {
        $sql = "SELECT post.topic_id FROM ".$this->tableName." 
        WHERE post.id_post = :postId";
        return  $this->getMultipleResults(
            DAO::select($sql, ["postId" => $postId]), 
            $this->className
        );
    }
    
    public function deletePost($postId){
        
        $sql = "DELETE FROM ".$this->tableName."
        WHERE post.id_post = :postId";
        return  $this->getMultipleResults(
            DAO::select($sql, ["postId" => $postId]), 
            $this->className
        );

    }

    public function updatePost($postId,$content){

        $sql = "UPDATE ". $this->tableName."
        SET content=:content
        WHERE post.id_post = :postId";
        
        DAO::update($sql, [
            "postId" => $postId,
            "content" => $content
        ]);
    }


}