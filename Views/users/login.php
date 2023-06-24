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
    require_once dirname(__FILE__) . "/../_partials/_navbar.php";
    ?>
    <section class="banner-login">
        <div class="container container-banner">
            <div class="container-newsletter">
                <div class="newsletter-login">
                    <h1>Sejam bem-vindo de volta !</h1>
                    <p>Receba as últimas notícias na área de TI!</p>
                    <form action="?action=login"  method="POST">
                        <div class="container-input-newsletter-login">
                            <label class="label-login" for="SUBSCRIBE">Email</label>
                            <input class="input-login" name="email" type="text" placeholder="Email">
                        </div>
                        <br>
                        <div class="container-input-newsletter-login">
                            <label class="label-login" for="SUBSCRIBE">Senha</label>
                            <input class="input-login" name="password" type="password" placeholder="Senha">
                        </div>
                        <br>
                        <div class="btn-login"><button>
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <?php
        require_once dirname(__FILE__)."/../_partials/_footer.php";
    ?>
</body>

</html>