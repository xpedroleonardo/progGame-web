<?php

require_once 'conexao.php';
session_start();
echo "<meta charset='utf-8'/>";

$tituloPostagem = $_POST['tituloPostagem'];
$subtituloPostagem = $_POST['subtituloPostagem'];
$textoPostagem = $_POST['textoPostagem'];
$categoriaPostagem = $_POST['categoriaPostagem'];
$dataPostagem = $_POST['dataPostagem'];
$fotoPostagem = $_FILES['fotoPostagem'];

$data = explode(">", $dataPostagem);


if (empty($tituloPostagem) || empty($subtituloPostagem) || empty($textoPostagem) || empty($categoriaPostagem) || empty($fotoPostagem)) { ?>
    <script>
        alert('Algum dos campos está vazio. Preenchá - o');
        location.href = 'criaPostagem.php';
    </script>
<?php
} else {
    if (!preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $fotoPostagem["name"], $ext)) { ?>
        <script>
            alert('Ops! O arquivo selecionado não é uma imagem');
            location.href = 'criaPostagem.php';
        </script>
    <?php
} else {
    preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $fotoPostagem["name"], $ext);

    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

    $caminho = "upload/" . $nome_imagem;

    $query = "INSERT INTO postagem (tituloPostagem,subtituloPostagem,textoPostagem,fotoPostagem,dataPostagem,idCategoria,idUsuario) VALUES
        ('$tituloPostagem','$subtituloPostagem','$textoPostagem','$fotoPostagem[name]','$data[8]',$categoriaPostagem,$_SESSION[idUsuario]);";
    $insere = mysqli_query($conexao, $query);

    if ($insere == 1) {
        echo "<script> alert('Postagem criada com sucesso!!!');location.href ='listaPostagem.php'</script>";
    } else {
        echo "<script> alert('ERRO!!!');location.href ='criaPostagem.php'</script>";
    }
}
}



?>