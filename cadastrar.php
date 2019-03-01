<?php header ('Content-type: text/html; charset=UTF-8'); ?>
<?php

session_start();
require 'config.php';

if(!empty($_GET['codigo'])) {
    $codigo = addslashes($_GET['codigo']);

    $sql = "SELECT * FROM usuarios WHERE codigo ='$codigo'";
    $sql = $pdo->query($sql);

    if($sql-> rowCount() == 0) {
        header("location: login.php");
        exit;
    }
}else{
    header("location: login.php");
    exit;
}

if(!empty($_POST['email'])) {//recebe email e senha
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";//verifica se ja tem um usuario com esse endereço de email
    $sql = $pdo->query($sql);

    if($sql->rowCount() <= 0) {
        $codiggo = md5(rand(0,99999).rand(0,99999));//gera um numero"codigo" aleatorio
        $sql = "INSERT INTO usuarios (nome, email, senha, codigo) VALUES ('$nome', '$email', '$senha', '$codigo')";
        $sql = $pdo->query($sql);

        unset($_SESSION['logado']);

        header("location: index.php");
        exit;
    }
}

?>
<h3>Cadastrar</h3>

<form method="post">
Nome: <br>
<input type="text" name= "nome"> <br><br>
E-mail: <br>
<input type="email" name="email"> <br><br>
Senha: <br>
<input type="password" name="senha"> <br><br>

<input type="submit" value="Cadastrar">
</form>