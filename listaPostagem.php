<?php require_once 'reqHeader.php'; ?>

<?php require_once 'conexao.php'; ?>

<?php require_once 'reqMenu.php'; 

$crisFDP = $_SESSION['idUsuario']; ?>

<link rel="stylesheet" href="css/index.css">

<div class="container cardListPost containerMargin">
    <div class="row justify-content-center">
        <div class="col l12">
            <div class="card">
                <div class="card-image">
                    <img height="320px" src="assets/imagem20.jpg">
                    <span class="card-title">Todas as postagens</span>
                    <a class="btn-floating btn-large halfway-fab waves-effect waves-light grey darken-4"
                        href="criaPostagem.php"><i class="material-icons">add</i>
                    </a>
                </div>
            </div>
            <?php
                $query = "SELECT idPostagem, tituloPostagem,fotoPostagem, subtituloPostagem, idUsuario FROM postagem where idUsuario = $crisFDP";
                $listar = mysqli_query($conexao,$query);
                $row = mysqli_num_rows($listar);

                if($row > 0){
                     while($teste = mysqli_fetch_array($listar)){?>
                            <a href="verPostagem.php?detalhes=<?php echo $teste['idPostagem'];?>" class='grey-text text-darken-4'>
                            <div class='card horizontal hoverable cardPostagem'>
                            <div class='card-image'>
                                <img src="assets/<?php echo $teste['fotoPostagem'];?>" height='300px' width='500px'>
                            </div>
                            <div class='card-stacked'>
                                <div class='card-content'>
                                <h4><?php echo $teste['tituloPostagem'];?></h4>
                                <h5><?php echo $teste['subtituloPostagem'];?></h5>
                                </div>
                            </div>
                            </div>
                        <?php }; ?>
           <?php 
           } 
           else{
                        echo "
                        <div class='card-panel center'>
                        <h3>O blog não possui nenhuma postagem</h3>
                        </div>" ;
                }; ?>
                </div>
    </div>
</div>
<?php
 require_once 'reqFAB.php';

require_once 'reqFooter.php';

require_once 'reqScript.php';
?>
