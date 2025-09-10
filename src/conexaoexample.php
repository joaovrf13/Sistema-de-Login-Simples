<?php
$host = "localhost";
$dbname = "sistemalogin";
$username = "root";
$password = "SUA_SENHA_AQUI";

$connection = new mysqli($host, $username, $password, $dbname);

if ($connection->connect_error) {
    http_response_code(500);
    echo json_encode(["erro" => "Falha na conexão com o Servidor"], JSON_UNESCAPED_UNICODE);
    exit();
}
?>
