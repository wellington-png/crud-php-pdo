<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=11', initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Meu blog</title>
</head>

<body>

    <?php
        require_once dirname(__FILE__)."/../_partials/_navbar.php";
    ?>
    
    <section class="banner">
        <div class="container container-banner">
            <div class="container-newsletter">
                <div class="newsletter">
                    <h1>Welcome to Gates</h1>
                    <p>Get the latest news on your favourite mangas, anime and manhwa around the world!</p>
                    <form action="" method="post">
                        <div class="container-input-newsletter">
                            <label for="SUBSCRIBE">SUBSCRIBE</label>
                            <input type="text" placeholder="Email">
                            <div class="btn-1"><button><i class="fa fa-arrow-right"></i></button></div>
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
        <h2>New & Trendy</h2>
        <div class="border-botton"></div>
        <div class="container-new-trendy">
            <div class="new-trendy-item"><img src="/assets/img/tecnologia-na-gestao-das-empresas.jpg" alt=""></div>
            <div class="new-trendy-item" id="foto">
                <div class="card-header">
                    <span class="Fantasy">Fantasy</span>
                </div>
                <div class="card-body">
                    <h3 class="titulo">Card title</h3>
                    <p class="pagrafo">Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                </div>
                <div class="card-footer">
                    <span>12 min Read</span>
                    <span>Read more</span>
                </div>
            </div>
            <div class="new-trendy-item"><img src="/assets/img/shutterstock_1932042689.jpg"></div>
            <div class="new-trendy-item" id="foto2">
                <div class="card-header">
                    <span class="Fantasy">Fantasy</span>
                </div>
                <div class="card-body">
                    <h3 class="titulo">Card title</h3>
                    <p class="pagrafo">Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                </div>
                <div class="card-footer">
                    <span>12 min Read</span>
                    <span>Read more</span>
                </div>
            </div>
        </div>
    </section>
    <section class="new-trendy">
        <h2>Now Trending</h2>
        <div class="border-botton"></div>
        <div class="now-trend-container">
            <div class="card">
                <img src="/assets/img/mercado-de-tecnologia.jpg" alt="Imagem do cartão">
                <h3>Título do Cartão</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et mauris vel lorem fringilla efficitur.
                </p>
            </div>
            <div class="card">
                <img src="/assets/img/interface-de-usuario-de-grafico-de-mercado-digital-de-financas-futuristas-com-conceito-grafico-de-hud-de-tecnologia-de-diagrama.jpg" alt="Imagem do cartão">
                <h3>Título do Cartão</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et mauris vel lorem fringilla efficitur.
                </p>
            </div>
            <div class="card">
                <img src="/assets/img/tecnologia-na-gestao-das-empresas.jpg" alt="Imagem do cartão">
                <h3>Título do Cartão</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et mauris vel lorem fringilla efficitur.
                </p>
            </div>
        </div>
    </section>
    <section class="new-trendy">
        <h2>Now Trending</h2>
        <div class="border-botton"></div>
        <div class="now-trend-container">
            <div class="card-now-trend">
                <img src="/assets/img/vista-traseira-do-programador-trabalhando-a-noite-toda.jpg" alt="Imagem do cartão">
                <div class="card-main">
                    <h3>Título do Cartão</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur
                    </p>
                </div>
            </div>
            <div class="card-now-trend">
                <img src="/assets/img/tecnologia-na-educação.png" alt="Imagem do cartão">
                <div class="card-main">
                    <h3>Título do Cartão</h3>adipiscing elit. Sed et mauris vel lorem fringilla efficitur.
                    </p>
                </div>
            </div>
            <div class="card-now-trend">
                <img src="/assets/img/shutterstock_1932042689.jpg" alt="Imagem do cartão">
                <div class="card-main">
                    <h3>Título do Cartão</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur a
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="new-trendy">
        <h2>Blog</h2>
        <div class="border-botton"></div>
        <div class="container-cat">
            <div class="cat">Comedy</div>
            <div class="cat">Fantasy</div>
            <div class="cat">Drama</div>
            <div class="cat">Action</div>
            <div class="cat">History</div>
            <div class="cat">Military</div>
        </div>
        <div class="blog-container">
            <div class="post-item post-item-4row"><img src="/assets/img/shutterstock_1932042689.jpg" alt="img-1">
            </div>
            <?php
            foreach ($posts as $post) {
                echo '<div class="post-item ">' . $post["title"] . '</div>';
            }

            ?>

        </div>


    </section>
    <?php
    require_once dirname(__FILE__)."/../_partials/_footer.php";
    ?>
</body>

</html>