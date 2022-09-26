<?php

class Tools{

    public function limpaPost($dados){
        $dados = trim($dados);
        $dados = stripslashes($dados);
        $dados = htmlspecialchars($dados);
        return $dados;
    }
    
}
