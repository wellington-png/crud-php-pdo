<nav class="navbar">
    <nav class="container navbar">
        <div class="navbar-logo">
            <img src="assets/img/Logo.png" alt="Logo">
            <input id="pesquisa" type="text" placeholder="Search">
            <button>Buscar</button>
        </div>
        <div class="navbar-buttons">
            <ul class="navbar-menu">
                <li><a href="?action=index">Home</a></li>
                <li><a href="?action=blog-list">Blog</a></li>
                <li><a href="sobre.html">Sobre</a></li>
                <li><a href="?action=login">Login</a></li>
                <li><a href="?action=create-user">Cadastrar</a></li>
            </ul>
        </div>
        <div class="mobile-menu-icon">
            <button onclick="menuShow()"><img class="icon" src="/assets/img/menu_white_36dp.svg" alt=""></button>
        </div>
    </nav>
    <div class="mobile-menu">
        <ul>
            <li class="nav-item"><a href="?action=index" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="list_post.html" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="sobre.html" class="nav-link">Sobre</a></li>
            <li class="nav-item"><a href="?action=login" class="nav-link">login</a></li>
            <li class="nav-item"><a href="?action=create-user" class="nav-link">Cadastrar</a></li>

        </ul>

    </div>
</nav>