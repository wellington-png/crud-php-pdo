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
        include './Views/posts/index.php';
    }

    public function blog_list($page=1, $limit=10){
        $posts = $this->postDAO->paginate($page, $limit);
        // var_dump($posts);
        include './Views/posts/blog-list.php';
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

    public function post_detail($id){
        $post = $this->postDAO->findById($id);
        $post_recentes = $this->postDAO->paginate(1, 3);
        include './Views/posts/post-detail.php';
    }
        
}
?>