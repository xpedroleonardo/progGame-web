<meta charset="utf-8"/>
<?php
session_start();
require_once 'conexao.php';

if(empty($_POST['login']) || empty($_POST['senha'])) {?>
            <script>
                alert('Algum dos campos está vazio. Preenchá - o');
                location.href='login.php';
            </script>
<?php }

$usuario = mysqli_real_escape_string($conexao, $_POST['login']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);


$query = "select idUsuario,loginUsuario,nivelUsuario,statusUsuario from usuario where loginUsuario = '{$usuario}' and senhaUsuario = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);
$teste=mysqli_fetch_array($result);
$_SESSION['idUsuario']= $teste['idUsuario'];

// caso 1, usuario autenticado
if($row == 1) {
       if($teste['nivelUsuario']==3){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nivel'] = 3;
        $_SESSION['logado'] = true;
        header('Location: feed.php');
        exit();
       }
       if($teste['nivelUsuario']==2 && $teste['statusUsuario']==1){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nivel'] = 2;
        $_SESSION['logado'] = true;
        header('Location: feedJornalista.php');
        exit();
       }else{ ?>
            <script>
                alert('Aguardando Aprovação do Administrador');
                location.href='login.php';
            </script>;
       
      <?php }
       
        if($teste['nivelUsuario']==1){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nivel'] = 1;
        $_SESSION['logado'] = true;
        header('Location: feedAdm.php');
        exit();
       }
} else {?>
        <script>
            alert('Usuário ou senha inválidos');
            location.href='login.php';
        </script>;
    <?php
	$_SESSION['nao_autenticado'] = true;
	
	exit();
}
?>