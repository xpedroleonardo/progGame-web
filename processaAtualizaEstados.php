<meta charset="utf-8"/>
<?php

require_once 'conexao.php';

$estado = $_POST['atualizaEstado'];
$id = $_POST['idUsuario'];

if ($estado == 'aprova') {
    $query = "UPDATE usuario SET statusUsuario = 1 WHERE idUsuario = $id";
    $r = mysqli_query($conexao, $query);
    if ($r == 1) {
        ?>
        <script>
            alert('Jornalista aprovado com sucesso');
            location.href = 'feedAdm.php';
        </script>
    <?php
    } else { ?>
        <script>
            alert('Erro na aprovação');
            location.href = 'feedAdm.php';
        </script>
    <?php
    }
} elseif($estado == 'bane') {
    $query = "DELETE FROM usuario WHERE idUsuario = $id";
    $r = mysqli_query($conexao, $query);
    if ($r == 1) {
        ?>
    <script>
        alert('Usuário banido com sucesso');
        location.href = 'feedAdm.php';
    </script>
    <?php
        } else { ?>
        <script>
            alert('Erro na banimento');
            location.href = 'feedAdm.php';
        </script>
    <?php
    }
} elseif($estado == 'atualizaComent'){
    $query = "UPDATE comentario SET statusComentario = 1 WHERE idComentario = $id";
    $r = mysqli_query($conexao, $query);
    if ($r == 1) {
        ?>
        <script>
            alert('Comentário aprovado com sucesso');
            location.href = 'feedJornalista.php';
        </script>
    <?php
    } else { ?>
        <script>
            alert('Erro na aprovação');
            location.href = 'feedJornalista.php';
        </script>
    <?php
    }
}elseif ($estado == 'baneComent') {
    $query = "DELETE FROM comentario WHERE idComentario = $id";
    $r = mysqli_query($conexao, $query);
    if ($r == 1) {
        ?>
    <script>
        alert('Comentário banido com sucesso');
        location.href = 'feedJornalista.php';
    </script>
    <?php
        } else { ?>
        <script>
            alert('Erro na banimento');
            location.href = 'feedJornalista.php';
        </script>
    <?php
    }
}

?>