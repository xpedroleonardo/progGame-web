<?php
    require_once 'conexao.php';

    $url_atual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $urlDividiva = explode('?', $url_atual);

    if (!isset($_SESSION['logado']) && $urlDividiva[0] != '') :
        header("Location: 404.php");
    endif;

    $idUsuario = $_SESSION['idUsuario'];
    $query = "SELECT nomeUsuario, fotoUsuario, nivelUsuario FROM usuario WHERE idUsuario = $idUsuario";
    $resultado = mysqli_query($conexao, $query);   
    $info = mysqli_fetch_array($resultado);
    $_SESSION['nivelUsuario']= $info['nivelUsuario'];
?>
<div class="navbar-fixed"> 
    <nav class="grey darken-4">
        <div class="container">
            <div class="nav-wrapper">
                <?php
                    if ($info['nivelUsuario'] == 1) {
                        echo "
                            <a href='feedAdm.php' class='brand-logo'><i class='fas fa-gamepad'></i> progGame</a>
                            <a href='feedAdm.php' data-target='mobile-nav' class='sidenav-trigger'>
                                <i class='material-icons'>clear_all</i>
                            </a>
                        ";
                    } elseif ($info['nivelUsuario'] == 2) {
                        echo "
                            <a href='feedJornalista.php' class='brand-logo'><i class='fas fa-gamepad'></i> progGame</a>
                            <a href='feedJornalista.php' data-target='mobile-nav' class='sidenav-trigger'>
                                <i class='material-icons'>clear_all</i>
                            </a>
                        ";
                    }else{
                        echo "
                            <a href='feed.php' class='brand-logo'><i class='fas fa-gamepad'></i> progGame</a>
                            <a href='feed.php' data-target='mobile-nav' class='sidenav-trigger'>
                                <i class='material-icons'>clear_all</i>
                            </a>
                        ";
                    }
                ?>
                
                <ul class="right">
                    <li>
                        <a class="transparent" disable>Olá <?php echo $info['nomeUsuario'] ?></a>
                    </li>
                    <li>
                        <a href="perfil.php" class="transparent"><img class="circle icon-user" src="upload/<?php echo $info['fotoUsuario'] ?>"></a>
                    </li>
                    <li>
                        <div class="dividerVert"></div>
                    </li>
                    <li>
                        <a class="btn-flat btnDefault modal-trigger" href="processaLogout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>