<?php
require_once('DB.php');
require_once('Tools.php');

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
            <h1>Deletar conta</h1>
        </div>
    </div>

    <div class="container">
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input name="senha" type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <!-- Deletar -->
            <?php
            if (isset($_POST['email']) && isset($_POST['senha'])) {

                if(!empty($_POST['email']) && !empty($_POST['senha'])){
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];
    
                    $db = new DB($email, $senha);
                    $db->delete();
                } else {
                    echo "<p>Preencha todos os campos!</p>";
                }
           
            }
            ?>


            <button type="submit" class="btn btn-light">Deletar</button>
            <a href="sistema.php" class="btn btn-light">Voltar</a>
        </form>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>