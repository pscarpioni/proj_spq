<!DOCTYPE>
<html>
    <head>
        <title>Listagem de Projetos Candidatos</title>
    </head>
    <body>
        <h3>Exibindo os projetos cadastrados</h3>
        <?php
            include_once("validar.php");
            $categoria = $_POST["categoria"];
            $db = mysqli_connect("localhost", "root");
            mysqli_select_db($db, "projeto");
            
            $sql = "SELECT nome,codigo,categoria,valor,duracao,periodo FROM candidato WHERE categoria = '".$categoria."'";
            
            $result = mysqli_query($db, $sql); 
            while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
                echo "<h4> Nome: " . $row["nome"] . "</h4> \n";
                echo "<h4> Categoria: " . $row["categoria"] . "<br/>Código:".$row["codigo"]
                        . "<br/>Valor: R$" . $row["valor"] . "<br/> Duração: " . $row["duracao"]." ".
                        $row["periodo"]."</h4> \n";
            }
            mysqli_close($db);
            
            echo'<p><a href="cadastroProjeto.html">Inserir outro projeto</a></p>' . "\n";
            echo'<p><a href="consultaProjeto.html">Veja a lista de projeto</a></p>' . "\n";
            echo'<p><a href="atualizaProjeto.html">Modificar projeto</a></p>' . "\n";
            echo'<p><a href="apagaProjeto.html">Excluir projeto</a></p>' . "\n";
        ?>
    </body>
</html>