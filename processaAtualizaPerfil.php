<meta charset="utf-8"/>
<?php
    include_once "conexao.php";

    session_start();

    $id = $_SESSION['idUsuario'];

    if(isset($_POST['atualizar'])){
        
        $foto = $_FILES['fotoPerfil'];
        $nome = $_POST['nomePerfil'];
        $login = $_POST['loginPerfil'];
        $senha = $_POST['senhaPerfil'];
        $fotoAtual = $_POST['fotoAtual'];

        if (empty($nome) || empty($login) || empty($senha)) {?>
            <script>
                alert('Algum dos campos está vazio. Preenchá - o');
                location.href='perfil.php';
            </script>
            <?php
        }else {
                
            if ($foto['error'] == 4) {  
                $query = "UPDATE usuario SET nomeUsuario = '$nome', loginUsuario = '$login', senhaUsuario ='$senha' WHERE idUsuario = $id";
                $atualiza = mysqli_query($conexao,$query);
                if($atualiza == 1){    
                    ?>
                    <script>
                        alert('Usuário atualizado com sucesso');
                        <?php                       
                        if($_SESSION['nivel'] == 1){ ?>
                            location.href='feedAdm.php';
                        <?php }
                        elseif($_SESSION['nivel'] == 2){ ?>
                            location.href='feedJornalista.php';
                        <?php }
                        else{ ?>
                            location.href='feed.php';
                        <?php } ?>                                            
                    </script>
                <?php
                }else{?>
                    <script>
                        alert('Erro na atualização');
                        location.href='perfil.php';
                    </script>
                <?php
                }
            }else {

                if(!preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $foto["name"], $ext)){?>
                <script>
                    alert('Ops! O arquivo selecionado não é uma imagem');
                    location.href='perfil.php';
                </script>
                <?php
                }else {
                
                    preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $foto["name"], $ext); 
                    
                    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                    unlink("upload/" . $fotoAtual);
                    
                    $caminho = "upload/" . $nome_imagem;    
                    $query = "UPDATE usuario SET fotoUsuario = '$nome_imagem', nomeUsuario = '$nome', loginUsuario ='$login', senhaUsuario = '$senha' WHERE idUsuario = $id";
                    $atualiza = mysqli_query($conexao,$query);
                    if($atualiza == 1){ 
                        move_uploaded_file($foto["tmp_name"], $caminho);    
                        ?>
                        <script>
                            alert('Usuário atualizado com sucesso');                                                      
                            location.href='perfil.php';                            
                        </script>
                    <?php
                    }else{?>
                        <script>
                            alert('Erro na atualização');
                            location.href='perfil.php';
                        </script>
                    <?php
                    }   
                }
            }
        }
    }else if(isset($_POST['excluir'])){
  
        $query = "DELETE FROM usuario WHERE idUsuario = $id";
        $exclui = mysqli_query($conexao,$query);
        if($exclui == 1){ 
            move_uploaded_file($foto["tmp_name"], $caminho);    
            ?>
            <script>
                alert('Usuário excluído com sucesso');
                location.href='processaLogout.php';
            </script>
        <?php
        }else{?>
            <script>
                alert('Erro na exclusão');
                location.href='processaLogout.php';
            </script>
        <?php
        }   

    }
    
?>