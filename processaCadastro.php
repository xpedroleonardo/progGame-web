<meta charset="utf-8" />
<?php
include_once "conexao.php";

if (isset($_POST['cadastrar'])) {

    $foto = $_FILES['fotoCadastro'];
    $nome = $_POST['nomeCadastro'];
    $login = $_POST['loginCadastro'];
    $senha = $_POST['senhaCadastro'];
    $usuario = $_POST['usuarioCadastro'];

    if (is_numeric($nome)) {
     echo "<script>
        alert('Coloque apenas Letras no Seu Nome');
      location.href = 'cadastro.php';
      </script>";
}

if (empty($foto) || empty($nome) || empty($login) || empty($senha) || empty($usuario)) { ?>
    <script>
        alert('Algum dos campos está vazio. Preenchá - o');
        location.href = 'cadastro.php';
    </script>
<?php
} else {

    $query = "SELECT loginUsuario FROM usuario WHERE loginUsuario = '$login'";
    $resulta = mysqli_query($conexao, $query);
    if (mysqli_num_rows($resulta) >= 1) { ?>
        <script>
            alert('Já possui um usuário cadastrado com esse nick, favor escolher outro');
            location.href = 'cadastro.php';
        </script>
    <?php
} else {
    if (!preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $foto["name"], $ext)) { ?>
            <script>
                alert('Ops! O arquivo selecionado não é uma imagem');
                location.href = 'cadastro.php';
            </script>
        <?php
    } else {
        preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $foto["name"], $ext);

        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        $caminho = "upload/" . $nome_imagem;

        if ($usuario == "c") {
            $query = "INSERT INTO usuario 
                        (nomeUsuario, nivelUsuario, statusUsuario, loginUsuario, senhaUsuario, fotoUsuario) VALUES 
                        ('$nome', '3','1', '$login', '$senha', '$nome_imagem')";
            $insere = mysqli_query($conexao, $query);
            if ($insere == 1) {
                move_uploaded_file($foto["tmp_name"], $caminho);
                ?>
                    <script>
                        alert('Usuário cadastrado com sucesso');
                        location.href = 'index.php';
                    </script>
                <?php
            } else { ?>
                    <script>
                        alert('Erro no cadastro');
                        location.href = 'cadastro.php';
                    </script>
                <?php
            }
        } else {
            $query = "INSERT INTO usuario 
                        (nomeUsuario, nivelUsuario, statusUsuario, loginUsuario, senhaUsuario, fotoUsuario) VALUES 
                        ('$nome', '2','0', '$login', '$senha', '$nome_imagem')";
            $insere = mysqli_query($conexao, $query);
            if ($insere == 1) {
                move_uploaded_file($foto["tmp_name"], $caminho);
                ?>
                    <script>
                        alert('Usuário cadastrado com sucesso');
                        location.href = 'index.php';
                    </script>
                <?php
            } else { ?>
                    <script>
                        alert('Erro no cadastro');
                        location.href = 'cadastro.php';
                    </script>
                <?php
            }
        }
    }
}
}
} else  if (isset($_POST['atualizar'])) {

    $foto = $_FILES['fotoPerfil'];
    $nome = $_POST['nomePerfil'];
    $login = $_POST['loginPerfil'];
    $senha = $_POST['senhaPerfil'];
    $id = $_POST['id'];
    $fotoAtual = $_POST['foto'];

    if (empty($foto) || empty($nome) || empty($login) || empty($senha)) { ?>
        <script>
            alert('Algum dos campos está vazio. Preenchá - o');
            location.href = 'perfil.php';
        </script>
    <?php
} else {
    if (!preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $foto["name"], $ext)) { ?>
            <script>
                alert('Ops! O arquivo selecionado não é uma imagem');
                location.href = 'perfil.php';
            </script>
        <?php
    } else {
        preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $foto["name"], $ext);

        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        unlink("upload/" . $fotoAtual);

        $caminho = "upload/" . $nome_imagem;

        $query = "UPDATE usuario SET fotoUsuario = '$nome_imagem', nomeUsuario = '$nome', loginUsuario = '$login', senhaUsuario = '$senha' WHERE idUsuario = $id";

        $atualiza = mysqli_query($conexao, $query);
        if ($atualiza == 1) {
            move_uploaded_file($foto["tmp_name"], $caminho);
            ?>
                <script>
                    alert('Usuário cadastrado com sucesso');
                    location.href = 'perfil.php';
                </script>
            <?php
        } else { ?>
                <script>
                    alert('Erro no cadastro');
                    location.href = 'perfil.php';
                </script>
            <?php
        }
    }
}
}






?>