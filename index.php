<?php header ('Content-type: text/html; charset=UTF-8'); ?>
<?php

session_start();//iniciando a sessão
require 'config.php';//chamando a conexão com banco

if(empty($_SESSION['logado'])) {//verifica se usuario esta logado
    header("location: login.php");//se nao estiver ele manda pro login
    exit;
}

$nome = '';
$codigo = '';
$email = '';

$sql = "SELECT nome, email, codigo FROM usuarios WHERE id = '".addslashes($_SESSION['logado'])."'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
    $info = $sql->fetch();
    $nome = $info['nome'];//função pra mostrar quem esta logado
    $codigo = $info['codigo'];
    $email = $info['email'];
}
?>
<h1>Area interna do sistema</h1>
<p>Usuário: <?php echo $nome." - E-mail: ".$email; ?> - <a href="logout.php">Sair</a></p>
<p>Link: http://projetoy.pc/modulophpintermediario/registro_convite/cadastrar.php?codigo=<?php echo $codigo; ?></p>