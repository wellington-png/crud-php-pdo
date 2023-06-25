<?php 
    require_once dirname(__FILE__)."/controllers/PostController.php";
    require_once dirname(__FILE__)."/controllers/UserController.php";
    $postController = new PostController();
    $userController = new UserController();

    $action = isset($_GET["action"]) ? $_GET["action"] : "index";
    switch ($action) {
        case 'index':
            $postController->index();
            break;
        case 'create':
            $postController->create();
            break;
        case 'store':
            $postController->store($_POST);
            break;
        case 'edit':
            $postController->edit($_GET["id"]);
            break;
        case 'update':
            $postController->update($_POST);
            break;
        case 'delete':
            $postController->delete($_GET["id"]);
            break;
        
        case 'post-detail':
            $postController->post_detail($_GET["id"]);
            break;
        case 'blog-list':
            $postController->blog_list(1, 50);
            // ---------------------------- Users ----------------------------
            break;
        case 'login':
            $userController->login();
            break;
        case 'logout':
            $userController->logout();
            break;
        case 'create-user':
            $userController->create();
            break;
        case 'store-user':
            $userController->store($_POST);
            break;
        
        default:
            $postController->index();
            break;
    }
?>