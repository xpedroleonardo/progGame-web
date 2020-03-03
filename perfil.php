<?php require_once 'reqHeader.php' ?>

<?php require_once 'reqMenu.php' ?>

<?php

  $query = "SELECT nomeUsuario, senhaUsuario, loginUsuario, fotoUsuario FROM usuario WHERE idUsuario = $idUsuario";
  $resultado = mysqli_query($conexao, $query);   
  $info = mysqli_fetch_array($resultado);

?>

    <div class="container containerMargin">
        <div class="row">
            <div class="col s6 offset-s3 z-depth-5 perfilInfo grey darken-4">
                <form action="processaAtualizaPerfil.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="input-field center-align">
                        <img class="materialboxed imagePreview" width="454px" height="454px" src="upload/<?php echo $info['fotoUsuario'] ?>" />
                    </div>
                    <div class="file-field input-field">
                        <div class="btn-flat btn-large btnDefault btnBlock">
                            <span>Selecionar foto</span>
                            <input type="file" onchange="imagePreview()" class="inputFoto" name="fotoPerfil">
                        </div>
                        <div class="descFoto">
                            <input class="file-path" type="text">
                        </div>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Nome completo" class="inputCadastro" value="<?php echo $info['nomeUsuario'] ?>" name="nomePerfil" />
                        <input type="hidden" value="<?php echo $idUsuario ?>" name="id" />
                        <input type="hidden" value="<?php echo $info['fotoUsuario'] ?>" name="fotoAtual" />
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Login" class="inputCadastro" value="<?php echo $info['loginUsuario'] ?>" name="loginPerfil" />
                    </div>
                    <div class="input-field">
                        <input name="senhaPerfil" type="password" placeholder="Senha" class="inputCadastro inputSenha" onkeyup="contagemCarac()" value="<?php echo $info['senhaUsuario'] ?>" name="senhaPerfil">
                        <span onclick="verSenha()" class="fa fa-fw fa-eye iconVerSenha btnVerSenha white-text right"></span>
                        <span class="helper-text red-text" id="spanSenha"></span>
                    </div>
                    <div class="input-field">
                        <button class="btn-flat btn-large btnDefault col s5 modal-trigger" data-target="excluir">Excluir perfil</button>
                        <button class="btn-flat btn-large btnDefault col s5 offset-s2" type="submit" name="atualizar" value="atualizar">Salvar alterações</button>
                    </div>
                </div>
                <div id="excluir" class="modal">
                    <div class="modal-content center">
                        <h4>Deseja realmente excluir seu perfil ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button class="btn-flat right btnDefaultDark col s2" type="submit" name="excluir" value="excluir">Sim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php 
    if($_SESSION['nivel'] != 3){ 
        require_once 'reqFAB.php';
    }
    ?>

    <?php require_once 'reqFooter.php' ?>

    <?php require_once 'reqScript.php' ?>