<?php header ('Content-type: text/html; charset=UTF-8'); ?>
<?php
//conexãocom banco de dados
try {
    $pdo = new PDO("mysql:dbname=projeto_registroporconvite;host=localhost", "root", "");
}catch(PDOException $e) {
    echo "Erro: ".$e->getMessage();
    exit;
}

?>