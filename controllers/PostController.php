<?php
require_once dirname(dirname(__FILE__))."/DAO/PostDAO.php";
require_once dirname(dirname(__FILE__))."/controllers/IController.php";


class PostController implements IController{
    private $postDAO;

    public function __construct(){
        $this->postDAO = new PostDAO();
    }

    public function index(){
        $posts = $this->postDAO->findAll();
        // $getTreding = $this->postDAO->getTreding();
        // $getPagination = $this->postDAO->paginate();
        include './Views/posts/index.php';
    }

    public function create(){
        include dirname(__FILE__)."/views/posts/create.php";
    }

    public function store($post){
        $this->postDAO->insert($post);
        header("Location: index.php");
    }

    public function edit($id){
        $post = $this->postDAO->findById($id);
        include './Views/posts/edit.php';
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