<?php header ('Content-type: text/html; charset=UTF-8'); ?>
<?php

session_start();//iniciando a sessão
require 'config.php';//chamando a conexão com banco

if(!empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = md5($_POST['senha']);

	$sql = "SELECT id FROM usuarios WHERE email = '$email' AND senha = '$senha'";
	$sql = $pdo->query($sql);

	if($sql->rowCount() > 0) {
		$info = $sql->fetch();

		$_SESSION['logado'] = $info['id'];
		header("Location: index.php");
		exit;
	}
}

?>

<H1>Insira seu E-mail e Senha</H1> <br><br>

<form method="post">
    E-mail: <br>
    <input type="email" name="email"> <br><br>
    Senha: <br>
    <input type="password" name="senha"> <br><br>
    
    <input type="submit" value="Entrar"> <a href="cadastrar.php">Cadastrar</a>
</form>