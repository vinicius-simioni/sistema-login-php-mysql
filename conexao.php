<?php

//conexao banco de dados PHP->SQL

$hostname = "localhost";
$bancodedados = "login-dados";
$usuario = "root";
$senha = "";

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$bancodedados", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $sql = "INSERT INTO usuarios (email, senha) VALUES ('$usr', '$snh')";
    // $conn->exec($sql);
    // echo "Salvo com sucesso";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

// $conn = null;

// $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
// if ($mysqli -> connect_errno) {
//     echo "falha ao conectar: (" . $mysqli->connect_errno . ") " .$mysqli->connect_error;
// }