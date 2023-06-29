<!DOCTYPE html>
<html>

<head>
    <title>Blog - Listar Posts</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=11', initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/style-admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

    </style>

</head>

<body>
    <div class="container-1">
        <?php
        require_once dirname(__FILE__) . "/../_partials/_sidebar.php";
        ?>
        <div class="main">
            <h2>Listar Posts</h2>

            <?php foreach ($posts as $post) : ?>
                <div class="post">
                    <h2><?php echo $post['title']; ?></h2>
                    <p><?php echo $post['excerpt']; ?></p>
                    <a class="btn-details" href="?action=post-detail&id=<?php echo $post['id']; ?>">Leia Mais</a>
                    <a class="btn-edit" href="?action=edit&id=<?php echo $post['id']; ?>">Editar</a>
                    <button  class="btn btn-delete" data-modal-target="<?php echo $post['id']; ?>">Apagar</button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    
    
    
    <?php
    require_once dirname(__FILE__) . "/../_partials/_modal_delete_post.php";
    require_once dirname(__FILE__) . "/../_partials/_footer.php";
    ?>
    <script src="./assets/js/main.js"></script>
</body>

</html>