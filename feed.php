<?php require_once 'reqHeader.php' ?>

<?php require_once 'reqMenu.php' ?>

<div class="container containerMargin">
  <div class="row">
    <form action="" method="post">
      <div class="input-field col s10">
        <input type="text" class="autocomplete" placeholder="Categoria de postagem que deseja ver" name="categoria">
      </div>
      <div class="input-field col s2">
        <button class="btn-flat btnDefaultDark btnBlock" type="submit" name="pesquisaCategoria" value="pesquisaCategoria">Pesquisar</button>
      </div>
    </form>
  </div>
  <?php

  $row = 0;
  $categoria = "";

  if (isset($_POST['pesquisaCategoria'])) {
    $categoria = $_POST['categoria'];
    $query = "SELECT p.idPostagem, p.tituloPostagem,p.fotoPostagem, p.subtituloPostagem, p.idUsuario FROM postagem AS p INNER JOIN categoria AS c ON c.nomeCategoria = '$categoria' AND p.idCategoria = c.idCategoria ORDER BY p.idPostagem DESC";
    $listar = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($listar);
  }
  // } else {
  //   $query = "SELECT idPostagem, tituloPostagem,fotoPostagem, subtituloPostagem, idUsuario FROM postagem ORDER BY idPostagem DESC";
  //   $listar = mysqli_query($conexao, $query);
  //   $row = mysqli_num_rows($listar);
  // }


  if ($row > 0) {
    while ($teste = mysqli_fetch_array($listar)) {
      ?>
      <a href="verPostagem.php?detalhes=<?php echo $teste['idPostagem']; ?>" class='grey-text text-darken-4'>
        <div class="card horizontal hoverable cardPostagem">
          <div class="card-image">
            <img src="assets/<?php echo $teste['fotoPostagem']; ?>" height='400px' width='300px'>
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <h4><?php echo $teste['tituloPostagem']; ?></h4>
              <h5><?php echo $teste['subtituloPostagem']; ?></h5>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php
    } else {
      echo "
        <div class='card-panel center'>
        <h3>O blog não possui nenhuma postagem</h3>
        </div>";
    }; ?>
</div>

<?php require_once 'reqScript.php' ?>