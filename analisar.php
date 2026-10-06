<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analise de Pessoas</title>
    <style>
        table,th, tr, td {
            border: 1px solid;
            text-align: center;
            padding: 5px;
        }
    </style>
</head>

<body>
    <main>
        <h1>Analise de Pessoas</h1>
        <?php
        if (!isset($_SESSION["pessoas"])) {
            $_SESSION["msg"] = "Atenção! Não há pessoas cadastradas";
            header("Location: index.php");
        } else {
            require_once("funcoes.php");
            $nromaiores = 0;
            $nrom = 0;
            $nrof = 0;
            echo "<table>";
            echo "<tr>
                  <th>Nome</th>
                  <th>Idade</th>
                  <th>Cidade</th>
                  <th>Sexo</th>
                  </tr>";
            foreach ($_SESSION["pessoas"] as $pessoa) {
                $idade = idade($pessoa["dtnascto"]);
                if ($idade >= 18) {
                    $nromaiores++;
                }
                switch ($pessoa["sexo"]) {
                    case "m": //Homem
                        $nrom++;
                        break;
                    case "f": //Mulher
                        $nrof++;
                        break;
                }
                $sexo = $pessoa["sexo"] == "m"?"Masculino":"Feminino";

                echo "<tr><td>".$pessoa["nome"]."</td><td>".$idade."</td><td>".$pessoa["cidade"]."</td><td>".$sexo."</td></tr>";
            }
            echo "<tr>
                    <td colspan='4'>Número pessoas maior idade: $nromaiores</td>
                  </tr>";
            echo "<tr>
                    <td colspan='4'>Número Mulheres: $nrof</td>
                  </tr>";
            echo "<tr>
                    <td colspan='4'>Número Homens: $nrom</td>
                  </tr>";
            echo "</table>";
        }
        ?>
        <br>
        <a href="index.php">Voltar</a>
    </main>

</body>

</html>