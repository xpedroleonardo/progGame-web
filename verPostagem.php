<?php require_once 'reqHeader.php' ?>

<?php

if (isset($_SESSION['logado'])) {
  require_once 'reqMenu.php';
} else {
  echo "
    <div class='navbar-fixed'>
      <nav class='grey darken-4'>
        <div class='container'>
          <div class='nav-wrapper'>
            <a href='index.php' class='brand-logo center'><i class='fas fa-gamepad'></i> progGame</a>
            <a href='#' data-target='mobile-nav' class='sidenav-trigger'>
              <i class='material-icons'>clear_all</i>
            </a>
            <ul class='right'>
              <li>
                <a class='btn-flat btnDefault modal-trigger' href='login.php'>Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  ";
}

require_once 'conexao.php';
$idPostagem = $_GET['detalhes'];
?>


<div class="container containerMargin">
  <div class="row">
    <div class="col s12">
      <?php
      $query = "SELECT 
          p.idPostagem AS idPostagemP, 
          p.tituloPostagem AS tituloPostagemP, 
          p.subtituloPostagem AS subtituloPostagemP, 
          p.fotoPostagem AS fotoPostagemP, 
          p.textoPostagem AS textoPostagemP, 
          p.dataPostagem AS dataPostagemP, 
          p.idCategoria AS idCategoriaP, 
          p.idUsuario AS idUsuarioP, 
          c.nomeCategoria AS nomeCategoriaC,
          u.nomeUsuario as nomeUsuarioU
          FROM postagem AS p 
          INNER JOIN categoria AS c ON 
          p.idCategoria = c.idCategoria 
          INNER JOIN usuario AS u ON u.idUsuario = p.idUsuario
          WHERE 
          p.idPostagem = $idPostagem
          ";

      $listar = mysqli_query($conexao, $query);
      $mostra = mysqli_fetch_array($listar);

      echo "<img src='assets/$mostra[fotoPostagemP]' width='100%'/>
        <p class='flow-text'>Postado em $mostra[dataPostagemP] • $mostra[nomeCategoriaC] • $mostra[nomeUsuarioU]"; 
        if(empty($_SESSION['nivel'])){


        }elseif($_SESSION['nivel']==1 || $_SESSION['nivel']==2){
        echo "
        <form action='excluirPostagem.php' method ='post' class='right-align'>
          <div class='input-field'>
          <input type='hidden' name='idPostagem' value='$idPostagem'/>
            <button type='submit' class='btn-flat btnDefaultDark'>
              Excluir Postagem
            </button>
          </div>
        </form>";
        }
        echo "</p>
        <h3>$mostra[tituloPostagemP]</h3>
        <h4>$mostra[subtituloPostagemP]</h4>
        <p class='flow-text'>
         $mostra[textoPostagemP]
        </p> "
      ?>
      <h4>Comentários</h4>
      <?php
      $queryComent = "SELECT statusComentario, c.comentario AS  comentarioC, c.dataComentario AS dataC, c.idPostagem AS idPostagemC, c.idUsuario AS idUsuarioC, u.nomeUsuario AS nomeUsuarioU, u.fotoUsuario AS fotoUsuarioU FROM comentario AS c INNER JOIN usuario AS u ON c.idUsuario = u.idUsuario INNER JOIN postagem AS p ON p.IdPostagem = c.idPostagem WHERE c.idPostagem = $idPostagem AND statusComentario = 1 ";
      $listaComent =mysqli_query($conexao,$queryComent);

      while($comet = mysqli_fetch_array($listaComent)){
        echo "<ul class='collection'>
        <li class='collection-item avatar'>
          <img src='upload/$comet[fotoUsuarioU]' alt='' class='circle'>
          <span class='title'><b>$comet[nomeUsuarioU]</b> • $comet[dataC]</span>
          <span class='title'></span>
          <div class='divider'></div>
          <h6>
            $comet[comentarioC]
          </h6>
        </li>
      </ul>";
    }

      if (isset($_SESSION['logado'])) {
        echo "
            <form action='comentariosProcessa.php' method ='post' class='containerMargin'>
              <div class='input-field col s10'>
                <textarea placeholder='Comentário'  name='comentario' class='materialize-textarea'></textarea>";?>
                <input type='hidden' name='dataPostagem' value="<?php echo date("d/m/Y"); ?>"/>
                <input type='hidden' name='idPostagem' value="<?php echo $idPostagem ?>"/>
              </div>
              <div class='input-field col s2'>
                <button type='submit' class='btn-flat btnDefaultDark btnBlock'>
                  Enviar
                </button>
              </div>
            </form>
      <?php }?>
    </div>
  </div>
</div>

<?php 
?>
<?php
if (isset($_SESSION['logado'])) {
  if ($_SESSION['nivelUsuario'] == 2) {
    require_once 'reqFAB.php';
  }
}

?>

<?php require_once 'reqFooter.php' ?>

<?php require_once 'reqScript.php' ?>