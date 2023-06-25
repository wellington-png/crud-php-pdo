<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=11', initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Meu blog</title>
</head>

<body>
    <?php
    require_once dirname(__FILE__) . "/../_partials/_navbar.php";
    ?>

    <section class="banner">
        <div class="container container-banner">
            <div class="container-newsletter">
                <div class="newsletter">
                    <h1>Welcome to Gates</h1>
                    <p>Get the latest news on your favourite mangas, anime and manhwa around the world!</p>
                    <form action="">
                        <div class="container-input-newsletter">
                            <label for="SUBSCRIBE">SUBSCRIBE</label>
                            <input type="text" placeholder="Email">
                            <button><i class="fa fa-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-category">
                <div class="category"><span>teste</span></div>
                <div class="category"><span>teste</span></div>
                <div class="category"><span>teste</span></div>
                <div class="category"><span>teste</span></div>
            </div>

        </div>
    </section>
    <section class="new-trendy">
        <h2>Now Trending</h2>
        <div class="border-botton"></div>
        <div class="now-trend-container">

        <!-- <a href="post.html">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" alt="Imagem do cartão">
                    <h3>Título do Cartão</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et mauris vel lorem fringilla
                        efficitur.
                    </p>
                </div>
            </a> -->
            <?php foreach ($posts as $post) : ?>
                <a href="?action=post-detail&id=<?= $post['id'] ?>">
                    <div class="card">
                    <img src="https://via.placeholder.com/300x200" alt="Imagem do cartão">
                        <h3><?= $post['title'] ?></h3>
                        <p><?= $post['content'] ?></p>
                    </div>
                </a>
            <?php endforeach; ?>

        </div>
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div>
    </section>
    <?php
    require_once dirname(__FILE__) . "/../_partials/_navbar.php";
    ?>

</body>

</html>