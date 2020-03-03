<?php require_once 'reqHeader.php'; ?>

<?php require_once 'reqMenu.php';
echo "<meta charset='utf-8'/>"; ?>

<div class="center">
  <div class="container containerMargin">
    <div class="row">
      <form action="processaPostagem.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <h3 class="center darkDefault">Cadastro de postagens</h3>

        <div class="col s12 m6">
          <img class="materialboxed imagePreview imagePost" width="100%" />
          <div class="file-field input-field">
            <div class="btn btnDefaultDark col s12">
              <span>Imagem</span>
              <input type="file" required name="fotoPostagem" onchange="imagePreview(this)">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
        </div>


        <div class="col s12 m6">
          <div class="input-field">
            <input type="text" name="tituloPostagem" required placeholder="Título da postagem" />
          </div>
          <div class="input-field">
            <input type="text" name="subtituloPostagem" required placeholder="Subtítulo da postagem" />
          </div>
          <div class="input-field">
            <?php

            echo "<select name='categoriaPostagem'>";

            $query = "SELECT idCategoria,nomeCategoria FROM categoria";
            $categoria = mysqli_query($conexao, $query);
            echo "<option value='' disabled selected>Selecione a Categoria</option>";
            while ($lista = mysqli_fetch_array($categoria)) {
              echo "<option value='$lista[idCategoria]'>$lista[nomeCategoria]</option>";
            }
            echo "</select>";
            ?>
          </div>

        </div>
        <div class="col s12">
          <div class="input-field">
            <textarea name="textoPostagem"  class="conteudoPostagem"></textarea>
            <input type="hidden" name='dataPostagem' required value="<?php echo date("d/m/Y"); ?>"/>
          </div>
          <div>
            <button class="btn btn-large btnDefaultDark col s12" type="submit">Enviar postagem</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once 'reqFAB.php' ?>

<?php require_once 'reqFooter.php' ?>

<?php require_once 'reqScript.php' ?>

