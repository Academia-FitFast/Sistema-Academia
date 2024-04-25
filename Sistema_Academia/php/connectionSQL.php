<?php

// nome do server
$servername = "localhost";
// nome do usuário
$username = "root";
// senha do server
$password = "";
// nome do banco de dados
$database = "banco_teste";

// Faz a conexão com o MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Verifica se a conexão foi feita
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
};