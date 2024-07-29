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
    $userManager = new UserManager();
    $users = $userManager->findAll();
    $posts = $postManager->findPostsByTopic($id);
    return [
        "view" => VIEW_DIR."forum/listPostsByTopic.php",
        "meta_description" => "blabla du sujet",
        "data" => [
            "posts" => $posts,
            "users" => $users
        ]
    ];

    }



    public function showListUsers() {
        
    
        $userManager = new UserManager();
        // récupérer la liste de toutes les users grâce à la méthode findAll de Manager.php (triés par nom)
        $users = $userManager->findAll(["username", "ASC"]);

        // le controller communique avec la vue "listusers" (view) pour lui envoyer la liste des users (data)
        return [
            "view" => VIEW_DIR."forum/listUsers.php",
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
    
    public function addNewPost(){
        
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $postManager = new PostManager();
        if(isset($_POST["submit"]))   {
            
            $postManager->add([
                "topic_id" => 1,
                "user_id" => 1,
                "content" => $content
            ]);
            $this->redirectTo("forum", "showPostsByTopic", 1);
        }
        
        
    }  

    public function editPost($id) {

        $postManager = new PostManager();
        $post = $postManager->findOneById($id);
        $topicId = $post->getTopic()->getId();

        
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        if(isset($_POST["submit"]))   {
            $postManager->updatePost(
                $id,
                $content
            );
            $this->redirectTo("forum", "showPostsByTopic", $topicId);

        }
    }

    public function showEditPost($id){

        $postManager = new PostManager;
        $post = $postManager->findOneById($id);
        return [
            "view" => VIEW_DIR."forum/editPost.php",
            "meta_description" => "page d'edition",
            "data" => [
            "post" => $post
            ]
        ];


    }


}