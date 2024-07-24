<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\UserManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["titleCategory", "DESC"]);

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

    public function showPostsByTopic($id){

    $postManager = new PostManager();
    $posts = $postManager->findPostsByTopic($id);
    return [
        "view" => VIEW_DIR."forum/listPostsByTopic.php",
        "meta_description" => "blabla du sujet",
        "data" => [
            "posts" => $posts,
        ]
    ];

    }



    public function showListUsers() {
        
    
        $userManager = new UserManager();
        // récupérer la liste de toutes les users grâce à la méthode findAll de Manager.php (triés par nom)
        $users = $userManager->findAll(["username", "ASC"]);

        // le controller communique avec la vue "listusers" (view) pour lui envoyer la liste des users (data)
        return [
            "view" => VIEW_DIR."forum/listusers.php",
            "meta_description" => "Liste des users du forum",
            "data" => [
                "users" => $users
            ]
        ];
    }

    public function showDetUser($id){

        $userManager = new UserManager();
        $user = $userManager->findUser($id);
        return [
            "view" => VIEW_DIR."forum/detUser.php",
            "meta_description" => "profil de l'utilisateur",
            "data" => [
                "user" => $user
            ]
        ];

    }

    public function delPost($postId){
        $postManager = new PostManager();
        $post = $postManager->findOneById($postId);
        $topicId = $post->getTopic()->getId();
        $postManager->deletePost($postId);
        $this->redirectTo("forum", "showPostsByTopic", $topicId);
        
    }

    

}