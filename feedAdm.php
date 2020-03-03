<?php require_once 'reqHeader.php' ?>

<?php require_once 'reqMenu.php' ?>

<div class="container containerMargin">
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s4"><a href="#postagens">Postagens</a></li>
                <li class="tab col s4"><a href="#usuarios">Usuários</a></li>
                <li class="tab col s4"><a href="#jornalistas">Jornalistas</a></li>
            </ul>
        </div>
    </div>
    <div class="row">

        <div id="postagens" class="col s12">
        <?php
            $query = "SELECT idPostagem, tituloPostagem,fotoPostagem, subtituloPostagem, idUsuario FROM postagem ORDER BY idPostagem DESC";
            $listar = mysqli_query($conexao, $query);
            $row = mysqli_num_rows($listar);


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
                    <?php
                }; ?>
                <?php
            } else {
                echo "
     <div class='card-panel center'>
     <h3>O blog não possui nenhuma postagem</h3>
    </div>";
            }; ?>
        </div>

        <div id="usuarios" class="col s12">
            <table class="centered striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nick</th>
                        <th>Nível</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT idUsuario, nomeUsuario, loginUsuario, nivelUsuario FROM usuario WHERE NOT nivelUsuario = 1";
                    $resulta = mysqli_query($conexao, $query);
                    while ($listUser = mysqli_fetch_array($resulta)) {
                        echo "
                            <tr>
                            <td>$listUser[nomeUsuario]</td>
                            <td>$listUser[loginUsuario]</td>
                        ";
                        if ($listUser["nivelUsuario"] == 2) {
                            echo "
                                <td>Jornalista</td>
                            ";
                        } else {
                            echo "
                                <td>Comum</td>
                            ";
                        }
                        echo "
                            <td>
                                <form action='processaAtualizaEstados.php' method='post'>
                                    <button type='submit' name='atualizaEstado' value='bane' class='btn-flat btnDefaultDark'><i class='material-icons'>delete</i></button>
                                    <input type='hidden' name='idUsuario' value='$listUser[idUsuario]'/>
                                </form>
                            </td>
                            </tr>
                        ";
                    }

                    ?>
                </tbody>
            </table>
        </div>

        <div id="jornalistas" class="col s12">
            <table class="centered striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nick</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $query = "SELECT idUsuario, nomeUsuario, loginUsuario, statusUsuario FROM usuario WHERE nivelUsuario = 2";
                    $resulta = mysqli_query($conexao, $query);
                    while ($listUser = mysqli_fetch_array($resulta)) {
                        echo "
                            <tr>
                            <td>$listUser[nomeUsuario]</td>
                            <td>$listUser[loginUsuario]</td>
                        ";
                        if ($listUser["statusUsuario"] == 1) {
                            echo "
                                <td>Aprovado</td>
                            ";
                        } else {
                            echo "
                                <td>Não aprovado</td>
                            ";
                        }

                        if ($listUser["statusUsuario"] == 1) {
                            echo "
                                <td>
                                    <form action='processaAtualizaEstados.php' method='post'>
                                        <button type='submit' name='atualizaEstado' value='bane' class='btn-flat btnDefaultDark'><i class='material-icons'>delete</i></button>
                                        <input type='hidden' name='idUsuario' value='$listUser[idUsuario]'/>
                                    </form>
                                </td>
                                </tr>
                            ";
                        } else {
                            echo "
                                <td>
                                    <form action='processaAtualizaEstados.php' method='post'>
                                        <button type='submit' name='atualizaEstado' value='aprova' class='btn-flat btnDefaultDark'><i class='material-icons'>check</i></button>
                                        <button type='submit' name='atualizaEstado' value='bane' class='btn-flat btnDefaultDark'><i class='material-icons'>delete</i></button>
                                        <input type='hidden' name='idUsuario' value='$listUser[idUsuario]'/>
                                    </form>
                                </td>
                                </tr>
                            ";
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php require_once 'reqFAB.php' ?>

<?php require_once 'reqScript.php' ?>