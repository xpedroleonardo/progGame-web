<meta charset="utf-8"/>
<?php
    require_once 'conexao.php';
    session_start();

    $comentario = $_POST['comentario'];
    $dataPostagem = $_POST['dataPostagem'];
    $idPostagem = $_POST['idPostagem']; 

    if (empty($comentario)):
        echo "<script>alert('Campo vazio, preenchá - o');location.href ='verPostagem.php?detalhes=$idPostagem'</script>";
        exit;
    endif;


    $data = explode(">", $dataPostagem);

    $query = "INSERT INTO comentario (comentario, dataComentario,statusComentario,idPostagem,idUsuario) VALUES
    ('$comentario','$data[8]','0','$idPostagem','$_SESSION[idUsuario]')";
    $insere= mysqli_query($conexao, $query);

    if($insere == 1){
        echo "<script>alert('Comentário enviado. Aguarde a aprovação');location.href ='verPostagem.php?detalhes=$idPostagem'</script>";
    }
?>