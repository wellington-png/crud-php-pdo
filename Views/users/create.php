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
    <section class="banner">
        <div class="container container-banner">
            <div class="container-newsletter">
                <div class="newsletter-login">
                    <h1>Seja bem-vindo</h1>
                    <p>Venha fazer parte do nosso time!</p>
                    <form action="?action=store-user" method="post">
                        <div class="container-input-newsletter-login">
                            <label class="label-login" for="SUBSCRIBE">Nome</label>
                            <input class="input-login" name="name" type="text" placeholder="Nome">
                        </div>
                        <br>
                        <div class="container-input-newsletter-login">
                            <label class="label-login" for="SUBSCRIBE">Email</label>
                            <input  class="input-login" name="email" type="text" placeholder="Email">
                        </div>
                        <br>
                        <div class="container-input-newsletter-login">
                            <label class="label-login" for="SUBSCRIBE">Senha</label>
                            <input  class="input-login" name="password" type="text" placeholder="Senha">
                        </div>
                        <br>
                        <div class="container-input-newsletter-login">
                            <label class="label-login" for="SUBSCRIBE">Confirmar</label>
                            <input  class="input-login" name="password_confirmation" type="text" placeholder="Confirmar senha">
                        </div>
                        <div class="btn-login"><button>
                            Cadastrar
                        </button></div>
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