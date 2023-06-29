<?php
require_once dirname(dirname(__FILE__))."/DAO/PostDAO.php";
require_once dirname(dirname(__FILE__))."/DAO/CategoriesDAO.php";
require_once dirname(dirname(__FILE__))."/controllers/IController.php";


class PostController {
    private $postDAO;
    private $categoriesDAO;

    public function __construct(){
        $this->postDAO = new PostDAO();
        $this->categoriesDAO = new CategoriesDAO();
    }

    private function update_image($file){
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file_type = $file['type'];
        $file_ext = explode('.', $file_name);
        $file_actual_ext = strtolower(end($file_ext));
        $allowed = array('jpg', 'jpeg', 'png', 'pdf');
        if(in_array($file_actual_ext, $allowed)){
            if($file_error === 0){
                if($file_size < 1000000){
                    $file_name_new = uniqid('', true).".".$file_actual_ext;
                    $file_destination = dirname(dirname(__FILE__))."/uploads/".$file_name_new;
                    move_uploaded_file($file_tmp, $file_destination);
                    return $file_name_new;
                }else{
                    echo "Seu arquivo é muito grande!";
                }
            }else{
                echo "Houve um erro ao fazer o upload do arquivo!";
            }
        }else{
            echo "Você não pode fazer upload de arquivos desse tipo!";
        }
    }
    public function index(){
        $posts = $this->postDAO->findAll();
        $new_tre = $this->postDAO->paginate(1, 2);
        include './Views/posts/index.php';
    }

    public function blog_list($page=1, $limit=10){
        $posts = $this->postDAO->paginate($page, $limit);
        // var_dump($posts);
        include './Views/posts/blog-list.php';
    }

    public function create(){
        $categories = $this->categoriesDAO->findAll();
        include "./Views/admin/create.php";
    }

    public function store($post, $files){
        $image = $this->update_image($files['image']);
        if($image){
            $post['image'] = $image;
            $this->postDAO->insert(1, $post['categoria'], $post['title'], $post['content'], $post['excerpt'], $post['image']);
        } else {
            echo "Houve um erro ao fazer o upload da imagem!";
        }
        

        // header("Location: index.php");
    }

    public function edit($id){
        $categories = $this->categoriesDAO->findAll();
        $post = $this->postDAO->findById($id);
        include './Views/admin/edit-post.php';
    }

    public function update($post, $files){
        echo "<pre>";
        var_dump($post);
        echo "</pre>";
        
            // $post['image'] = $post['image_path'];
            // $image = $this->update_image($files['image']);
        echo $files['image']['name'] != "";
        if ($files['image']['name'] != "") {
            $image = $this->update_image($files['image']);
            if($image){
                $post['image'] = $image;
            } else {
                echo "Houve um erro ao fazer o upload da imagem!";
            }
        } else {
            $post['image'] = $post['image_path'];
        }

        $this->postDAO->update($post);
    }

    public function delete($id){
        $this->postDAO->delete($id);
        header("Location: index.php?action=list-posts-admin");
    }

    public function post_detail($id){
        $post = $this->postDAO->findById($id);
        $post_recentes = $this->postDAO->paginate(1, 3);
        include './Views/posts/post-detail.php';
    }

    public function list_posts_admin(){
        $posts = $this->postDAO->findAll();
        include './Views/admin/list-posts.php';
    }
    
    public function admin(){
        include './Views/admin/index.php';
    }
        
}
?>