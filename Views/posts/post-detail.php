<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=11', initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Meu blog</title>
    <style>
        .titulo {
            color: black;
        }

        .trecho {
            color: #555;
        }

        .new-trendy {
            border-top: 1px solid #ccc;
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <?php
    require_once dirname(__FILE__) . "/../_partials/_navbar.php";
    ?>
    <section class="banner-post" style="background-image: url('uploads/<?php echo $post['image'] ?>'); ">
        <div class="container-banner">
            <div style="backdrop-filter: blur(2px); background-color: rgba(14, 12, 56, 0.45);" class="container-post-banner">
                <div class="newsletter" style="z-index: 1000;">
                    <h1><?php echo $post['title'] ?></h1>
                    <p><?php echo $post['excerpt'] ?></p>
                </div>
            </div>

        </div>
    </section>
    <section class="body-post">
        <div class="container-body-post">
            <div style="padding: 20px;">
                <?php echo $post['content'] ?>

            </div>
        </div>
    </section>
    <section class="new-trendy">
        <h2>Post recentes</h2>
        <hr>
        <div class="border-botton"></div>
        <div class="now-trend-container" ">
            <?php foreach ($post_recentes as $post) : ?>
                <a href=" ?action=post-detail&id=<?= $post['id'] ?>">
            <div class="card-now-trend">
                <img src="uploads/<?php echo $post['image'] ?>" alt="Imagem do cartão">
                <div class="card-main">
                    <h3 class="titulo" title="<?php echo $post['title'] ?>"><?php echo $post['title'] ?></h3>
                    <p class="trecho"><?php echo $post['excerpt'] ?></p>
                </div>
            </div>
            </a>
        <?php endforeach; ?>
        </div>
    </section>


    <?php
    require_once dirname(__FILE__) . "/../_partials/_footer.php"; ?>
    <script>
        const titulo = document.querySelectorAll('.titulo');
        const descricao = document.querySelectorAll('.trecho');

        titulo.forEach((elemento) => {
            elemento.textContent = limitarTexto(elemento.textContent, 15);
        });

        descricao.forEach((elemento) => {
            elemento.textContent = limitarTexto(elemento.textContent, 50);
        });
    </script>
</body>

</html>