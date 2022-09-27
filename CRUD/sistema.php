<?php
require_once('DB.php');
require_once('Tools.php');
require_once('config.php');
session_start();
$sessionValue = $_SESSION['key'];

$sql = "SELECT * FROM usuarios WHERE senha = '$sessionValue'";
$result = $mysqli->query($sql);

if(empty($_SESSION)){
    header('Location: login.php');
}else if (mysqli_num_rows($result) < 1){
    header('Location: login.php');
}else {

}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body class="bg-dark text-light">

    <div class="container">
        <div class="jumbotron bg-danger">
            <h1>Você logou. Bem Vindo!</h1>
        </div>

    <a href="delete.php" class="btn btn-light">Deletar Conta</a>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>