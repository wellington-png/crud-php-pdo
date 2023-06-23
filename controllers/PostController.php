<?php
require_once dirname(__FILE__)."/DAO/PostDAO.php";
require_once dirname(__FILE__)."/controllers/IController.php";


class PostController implements IController{
    private $postDAO;

    public function __construct(){
        $this->postDAO = new PostDAO();
    }

    public function index(){
        $posts = $this->postDAO->findAll();
        require_once dirname(__FILE__)."/views/posts/index.php";
    }

    public function create(){
        require_once dirname(__FILE__)."/views/posts/create.php";
    }

    public function store($post){
        $this->postDAO->insert($post);
        header("Location: index.php");
    }

    public function edit($id){
        $post = $this->postDAO->findById($id);
        require_once dirname(__FILE__)."/views/posts/edit.php";
    }

    public function update($post){
        $this->postDAO->update($post);
        header("Location: index.php");
    }

    public function delete($id){
        $this->postDAO->delete($id);
        header("Location: index.php");
    }
        
}
?>