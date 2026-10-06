<?php
    session_start();
    
    echo "<pre>";
    //var_dump($_SESSION);
    echo "</pre>";
    
    if (!isset($_SESSION["msg"])) {
        $_SESSION["msg"] = "";
    }
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas (Vetor)</title>
</head>

<body>
    <main>
        <h1>Cadastro de Pessoas (Vetor)</h1>
        <br>
        <form action="salvarpessoa.php" method="post">
            <label for="fnome">Nome: </label>
            <input type="text" name="fnome" required><br>
            <label for="fdtnascto">Data de Nascimento: </label>
            <input type="date" name="fdtnascto" required><br>
            <label for="fcidade">Cidade: </label>
            <input type="text" name="fcidade" required><br> 
            <label for="fnome">Sexo: </label>
            <select name="fsexo">
                <option value="f" selected>Feminino</option>
                <option value="m">Masculino</option>
            </select>
            <br>
            <br>
            <button type="submit">Cadastrar</button>
            <br>
            <?php
                if(isset($_SESSION["pessoas"])) {
                    echo "Cadastradas: ".count($_SESSION["pessoas"]). " pessoa(s)";
                } 
            ?> 
        </form>
        <br>
        <a href="analisar.php">Analisar Cadastro</a>&nbsp;
        <a href="limpar.php">Reniciar Cadastro</a>
        <br>
        <p><?= $_SESSION["msg"] ?></p>
    </main>
</body>

</html>