<nav id="nav-menu">
    <table>
        <tr>
            <th>Sobre nós</th>
            <th>Sobre mim</th>
            <th>Inscrições</th>
        </tr>
        <tr>
            <td>Nosso pastor</td>
            <td>Meu devocional</td>
            <td>Curso de noivos</td>
        </tr>
        <tr>
            <td>Ministérios</td>
            <td>Dizimar ou ofertar</td>
            <td>Classe de doutrina</td>
        </tr>
        <tr>
            <td>Galeria de fotos</td>
            <td>Pedidos de oração</td>
            <td>Acampamentos</td>
        </tr>
    </table>
</nav>
<header>
    <div id="logo"><h1>Igreja Batista no Jardim Mª do Carmo</h1><img src="imgs/logo.png"></img></div>
    <div id="div-menu-toggle" onClick="toggleMenu()">
        <div id="btn-menu-toggle">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <span>Menu</span>
    </div>

    <nav id="nav-bar">
        <ul id="nav-bar-menu">
            <li><a href="index.php" id="menu-item-home" class='nav-bar-items'>Home</a></li>
            <li><a href="live.php" id="menu-item-live" class='nav-bar-items'>Ao vivo</a></li>
            <li><a href="fale-conosco.php" id="menu-item-contato" class='nav-bar-items'>Fale conosco</a></li>
            <li><a href="sobre.php" id="menu-item-sobre" class='nav-bar-items'>Sobre nós</a></li>
            <?php
                if(isset($_SESSION['usuario'])) { ?>
                    <li id="item-conta" onClick="toggleMenuConta()">
                        <ul id="menu-conta">
                            <li><a href="perfil.php">Meu perfil</a></li>
                            <li><a href="logout.php">Sair</a></li>
                        </ul>
                        <p id="menu-item-conta" class='nav-bar-items'>Minha conta</p>
                    </li>
            <?php
                } else { ?>
                    <li><a href="login.php" id="menu-item-login" class='nav-bar-items'>Login</a></li>
            <?php
                }
            ?>
        </ul>
    </nav>
</header>