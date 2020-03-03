<meta charset="utf-8"/>
<?php 
    require_once 'conexao.php';
    $idPostagem = $_POST['idPostagem'];

    $query = "DELETE FROM postagem WHERE idPostagem = $idPostagem";
    $insere = mysqli_query($conexao,$query);


    if($insere == 1){
        echo "<script>alert('Postagem excluida com sucesso');location.href ='listaPostagem.php'</script>";
    }else{
        echo "<script>alert('Erro na exclusão da postagem');location.href ='listaPostagem.php'</script>";
    }


?>