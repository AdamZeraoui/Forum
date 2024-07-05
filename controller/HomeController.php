<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class HomeController extends AbstractController implements ControllerInterface {
    

    public function index(){

        if(Session::getUser()){
            $this->redirectTo("forum");
        }
        else {
            return [
                "view" => VIEW_DIR."home.php",
                "meta_description" => "Page d'accueil du forum"
            ];
        }

    }
        
    public function users(){
        $this->restrictTo("ROLE_USER");

        $manager = new UserManager();
        $users = $manager->findAll(['register_date', 'DESC']);

        return [
            "view" => VIEW_DIR."security/users.php",
            "data" => [ 
                "users" => $users 
            ]
        ];
    }
}
