<?php
//componente fora da pasta componente pois é relacionado a infraestrutura

$host = "localhost";
$db = "sistema_simples_m1";
$pass = "";
$user = "root";
$port = 3308;


$conn = new mysqli($host, $user, $pass, $db, $port);
// conexão com o banco de dados, definindo variáveis e tudo
// utilizar $port = 3308 se for fazer em casa

if ($conn->connect_error) {
    die("Erro na conexão!");
} else {
    echo "<script>console.log('Banco conectado com sucesso!')</script>";
}
;
// apenas visual para sabermos que o db está conectado com o sistema. Geralmente não é utilizado

?>