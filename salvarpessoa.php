<?php
    /*Verifica se vetor(array) de pessoas 
     existe na sessão, senão o cria em branco*/
    session_start();
    if (!isset($_SESSION["pessoas"])) {
        $_SESSION["pessoas"] = [];
    }
    /*Verifica se informado cadastro novo e inclui no vetor*/
    if (isset($_POST["fnome"]) 
        && isset($_POST["fdtnascto"])
        && isset($_POST["fcidade"])
        && isset($_POST["fsexo"])) {
            //cadastrar pessoa no vetor
            $pessoa = ["nome" => $_POST["fnome"]
                      ,"dtnascto" => $_POST["fdtnascto"]
                      ,"cidade" => $_POST["fcidade"]
                      ,"sexo" => $_POST["fsexo"]];
            $_SESSION["pessoas"][] = $pessoa;
            $_SESSION["msg"] = "OK! Pessoa cadastrada com sucesso.";    
    } else {
        $_SESSION["msg"] = "ERRO! Todos os dados devem ser informados.";
    } 
    header("Location: index.php");
?>