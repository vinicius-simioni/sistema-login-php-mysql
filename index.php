<?php
require('conexao.php');
if(isset($_POST['email']) & isset($_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha']) ){
    $usr = $_POST['email'];
    $snh = SHA1($_POST['senha']);
    $sql = "INSERT INTO usuarios (email, senha) VALUES ('$usr', '$snh')";
    $conn->exec($sql);
    echo "Salvo com sucesso";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form method="POST" action="">
        <label for="">E-mail</label>
        <input type="email" id="email" name="email" required>
        <br>
        <Label>Senha</Label>
        <input type="password" id="senha" name="senha" required>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>