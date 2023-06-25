<?php
require_once dirname(dirname(__FILE__))."/DAO/UserDAO.php";
require_once dirname(dirname(__FILE__))."/controllers/IController.php";

session_start();


class UserController implements IController{
    private $userDAO;

    public function __construct(){
        $this->userDAO = new UserDAO();
    }

    public function index(){
        $users = $this->userDAO->findAll();
        include './Views/users/index.php';
    }

    public function create(){
        include "./Views/users/create.php";
    }

    public function store($user){
        if ($this->userDAO->findByEmail($user["email"])) {
            echo "Email já cadastrado";
            return;
        }
        if ($user["password"] != $user["password_confirmation"]) {
            echo "Senhas não conferem";
            return;
        }
        $this->userDAO->insert($user);
        header("Location: index.php");
    }

    public function edit($id){
        $user = $this->userDAO->findById($id);
        include './Views/users/edit.php';
    }

    public function update($user){
        $this->userDAO->update($user);
        header("Location: index.php");
    }

    public function delete($id){
        $this->userDAO->delete($id);
        header("Location: index.php");
    }

    public function login(){
        
        if(isset($_POST["email"]) && isset($_POST["password"])){
            $user = $this->userDAO->findByEmail($_POST["email"]);
            if($user){
                if($user["password"] == $_POST["password"]){
                    $_SESSION["user"] = $user;
                    header("Location: index.php");
                }else{
                    echo "Senha incorreta";
                }
            }else{
                echo "Usuário não encontrado";
            }
        }
        include './Views/users/login.php';
    }
    public function logout(){
        session_destroy();
        header("Location: index.php");
    }
}
?>