<?php
require_once('config.php');
require_once('Tools.php');

class DB extends Tools{
    protected string $tabela = 'login-dados';

    function __construct (
        private string $email,
        private string $senha,
    ) {}

    public function insert() {
        $email = Tools::limpaPost($this->email);
        $senha = Tools::limpaPost($this->senha);
        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        global $mysqli;
        $result = $mysqli->query($sql);

        if(mysqli_num_rows($result) < 1){
            mysqli_query($mysqli, "INSERT INTO usuarios (email, senha) VALUES ('$this->email', '$this->senha')" );
            echo "<p>Salvo com sucesso</p>";
        } else {
            echo "<p>Usuário já existe</p>";
        }

    }

}