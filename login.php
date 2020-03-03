<?php require_once 'reqHeader.php' ?>

<div class="sectionLogin">
  <div class="container">
    <div class="row">
      <div class="col s12 m6 offset-m3 grey darken-4 formLogin">
        <form action="processaLogin.php" method="post" autocomplete="off">
          <h2 class="white-text">Login</h2>
          <div class="input-field">
            <input type="text" class="inputCadastro" name="login" placeholder="Nickname" />
          </div>
          <div class="input-field">
            <input name="senha" type="password" placeholder="Senha" class="inputCadastro inputSenha">
            <span onclick="verSenha()" class="fa fa-fw fa-eye iconVerSenha btnVerSenha white-text right"></span>
          </div>
          <div class="input-field">
            <button type="submit" class="btn-flat btn-large btnDefault btnBlock">
              Logar <i class="fas fa-user-check"></i>
            </button>
          </div>
          <div class="input-field  right-align">
            <span class="white-text">Não possui conta ? <a href="cadastro.php" class="sectionRollForm">Cadastre - se</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once 'reqScript.php' ?>

<div class="fixed-action-btn">
  <a href="index.php" class="btn-floating btn-large grey darken-4" data-tooltip="Página Incial">
    <i class="large material-icons">home</i>
  </a>
</div>