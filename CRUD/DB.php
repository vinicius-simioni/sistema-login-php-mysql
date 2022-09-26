<?php
require_once('config.php');

class DB {
    protected string $tabela = 'login-dados';

    function __construct (
        private string $email,
        private string $senha,
    ) {}

    public function insert() {
        $sql = "SELECT * FROM usuarios WHERE email = '$this->email' and senha = '$this->senha'";
        global $mysqli;
        $result = $mysqli->query($sql);
        mysqli_query($mysqli, "INSERT INTO usuarios (email, senha) VALUES ('$this->email', '$this->senha')" );
        echo "<p>Salvo com sucesso</p>";

        // if(mysqli_num_rows($result) < 1){
        //     unset($_SESSION['email']);
        //     unset($_SESSION['senha']);
        //     header('Location: login.php');
        // } else {
        //     $_SESSION['email'] = $email;
        //     $_SESSION['senha'] = $senha;
        //     header('Location: sistema.php');
        // }
    }

}