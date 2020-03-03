<?php require_once 'reqHeader.php' ?>

<div class="cadastro">
    <div class="row">
        <div class="col s12 m5 offset-m7 divForms">
            <form class="formCadastro" action="processaCadastro.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="center-align">
                    <i class="fas fa-user-plus iconUsersLogin"></i>
                </div>
                <div class="containerMargin">
                    <div class="input-field">
                        <img class="imagePreview" width="100%" />
                    </div>
                    <div class="file-field input-field">
                        <div class="btn-flat center btnDefault btnBlock">
                            <span>Selecionar foto</span>
                            <input type="file" onchange="imagePreview()" class="inputFoto" name="fotoCadastro" required>
                        </div>
                        <div class="descFoto hide">
                            <input class="file-path" type="text">
                        </div>
                    </div>
                </div>
                <div class="input-field">
                    <input name="nomeCadastro" type="text" placeholder="Nome completo" class="inputCadastro" required>
                </div>
                <div class="input-field">
                    <input name="loginCadastro" type="text" placeholder="Nickname" class="inputCadastro" required>
                </div>
                <div class="input-field">
                    <input name="senhaCadastro" required type="password" placeholder="Senha" class="inputCadastro inputSenha" onkeyup="contagemCarac()">
                    <span onclick="verSenha()" class="fa fa-fw fa-eye iconVerSenha btnVerSenha white-text right"></span>
                    <span class="helper-text red-text" id="spanSenha"></span>
                </div>
                <div class="input-field">
                    <p>
                        <span class="white-text">Selecione o tipo de usuário que deseja ser:</span>
                        <label>
                            <input name="usuarioCadastro" value="c" type="radio" checked />
                            <span>Comum</span>
                        </label>
                        <label>
                            <input name="usuarioCadastro" value="j" type="radio" />
                            <span>Jornalista</span>
                        </label>
                    </p>
                </div>
                <div class="input-field">
                    <button type="submit" class="btn-flat btn-large btnDefault btnBlock" name="cadastrar" value="cadastrar">
                        Cadastrar <i class="fas fa-user-plus"></i>
                    </button>
                </div>
                <div class="input-field right-align">
                    <span class="white-text">Já possui uma conta ? <a href="login.php" class="sectionRollForm">Logar</a></span>
                </div>
                <div style="height: 100px;"></div>
            </form>
        </div>
    </div>
</div>


<?php require_once 'reqScript.php' ?>

<div class="fixed-action-btn botao-cadastro">
    <a href="index.php" class="btn-floating btn-large grey darken-4" data-tooltip="Página Incial" >
        <i class="large material-icons">home</i>
    </a>
</div>