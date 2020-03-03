<?php require_once 'reqHeader.php' ?>
<?php require_once 'conexao.php'; ?>



<div class="navbar-fixed">
  <nav class="grey darken-4">
    <div class="container">
      <div class="nav-wrapper">
        <a href="#home" class="brand-logo center"><i class="fas fa-gamepad"></i> progGame</a>
        <a href="#" data-target="mobile-nav" class="sidenav-trigger">
          <i class="material-icons">clear_all</i>
        </a>
        <ul class="right">
          <li>
            <a class="btn-flat btnDefault modal-trigger" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

<div class="slider">
  <ul class="slides">
    <li>
      <img src="assets/imagem37.jpg" class="lax" data-lax-opacity="100 1, 450 .1" />
      <div class="caption center">
        <div class="row lax" data-lax-translate-y="0 0, 400 -50">
          <div class="col s12">
            <h1 class="white-text"><i class="fas fa-gamepad"></i> progGame</h1>
            <p class="flow-text white-text">progGame é um blog especializado em games, onde você pode ler, comentar e
              postar as últimas notícias do mundo dos games</p>
            <a href="cadastro.php" class="btn-flat btn-large btnDefault col s6 offset-s3">
              Cadastre - se
            </a>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>

<div class="container">
  <div class="row">
    <h3 class="center darkDefault">Últimas postagens</h3>
  </div>
</div>
<div class="container">
  <?php
  $query = "SELECT idPostagem, tituloPostagem,fotoPostagem, subtituloPostagem, idUsuario FROM postagem ORDER BY idPostagem DESC";
  $listar = mysqli_query($conexao, $query);
  $row = mysqli_num_rows($listar);
  $contador = 0;

  if ($row > 0) {
    while ($teste = mysqli_fetch_array($listar)) {
      if ($contador <= 4) { ?>
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
      <?php $contador++;
          }
        }; ?>
    <?php
    } else {
      echo "
     <div class='card-panel center'>
     <h3>O blog não possui nenhuma postagem</h3>
    </div>";
    }; ?>

</div>


<?php require_once 'reqFooter.php' ?>

<?php require_once 'reqScript.php' ?>