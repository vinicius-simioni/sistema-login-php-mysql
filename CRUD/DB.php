<?php
require_once('config.php');
require_once('Tools.php');

class DB extends Tools
{
    protected string $tabela = 'login-dados';

    function __construct(
        private string $email,
        private string $senha,
    ) {
    }

    public function insert()
    {
        $email = Tools::limpaPost($this->email);
        $senha = Tools::limpaPost($this->senha);

        if (strlen($senha) < 6) {
            echo "<p>A senha deve possuír 6 dígitos ou mais</p>";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Insira um e-mail válido</p>";
        } else {
            $senha = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM usuarios WHERE email = '$email'";
            global $mysqli;
            $result = $mysqli->query($sql);

            if (mysqli_num_rows($result) < 1) {
                mysqli_query($mysqli, "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')");
                echo "<p>Salvo com sucesso</p>";
            } else {
                echo "<p>Usuário já existe</p>";
            }
        }
    }

    public function login()
    {
        $email = Tools::limpaPost($this->email);
        $senha = Tools::limpaPost($this->senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
        global $mysqli;
        $result = $mysqli->query($sql);

        $usuario = $result->fetch_assoc();
        if (mysqli_num_rows($result) > 0 &&password_verify($senha, $usuario['senha'])) {
            session_start();
            $_SESSION['key'] = $usuario['senha'];
            header('Location: sistema.php');
        } else {
            echo "<p>Usuário incorreto. Cadastre-se ou digite novamente</p>";
        }
    }

    public function delete()
    {
        $email = Tools::limpaPost($this->email);
        $senha = Tools::limpaPost($this->senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
        global $mysqli;
        $result = $mysqli->query($sql);
        $usuario = $result->fetch_assoc();
        $usuarioId = $usuario['id'];
        $usuarioEmail = $usuario['email'];
        $usuarioSenha =  $usuario['senha'];


        if ($usuarioEmail == $email && password_verify($senha, $usuarioSenha)) {
            $sql = "DELETE FROM usuarios WHERE id='$usuarioId' ";
            $result = $mysqli->query($sql);
            echo '<p>Usuário deletado com sucesso</p>';
        } else {
            echo '<p>Usuário inválido, digite novamente</p>';
        }
    }
}
