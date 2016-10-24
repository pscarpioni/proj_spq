<!DOCTYPE>
<html>
    <head>
        <title>Listagem de Projetos Candidatos</title>
    </head>
    <body>
        <h3>Exibindo os projetos cadastrados</h3>
        <?php
        //session_start();
        include_once("validar.php");
        $nome = NULL;
        $codigo = NULL;
        if (isset($_POST["Consultar"])) {
            if (isset($_POST["codigo"]))
                $codigo = $_POST["codigo"];
            if (isset($_POST["nome"]))
                $nome = $_POST["nome"];
            $categoria = $_POST["categoria"];
            $db = mysqli_connect("localhost", "root");
            mysqli_select_db($db, "projeto");
            if ($codigo || $nome) {
                if ($codigo && !$nome)
                    $sql = "SELECT nome,categoria,valor,duracao,periodo FROM candidato WHERE codigo = '"
                            . $codigo . "' AND categoria = '" . $categoria . "'";
                else
                if (!$codigo && $nome)
                    $sql = "SELECT nome,categoria,valor,duracao,periodo FROM candidato WHERE nome = '"
                            . $nome . "' AND categoria = '" . $categoria . "'";
                else
                    $sql = "SELECT nome,categoria,valor,duracao,periodo FROM candidato WHERE codigo = '"
                            . $codigo . "' AND categoria = '" . $categoria . "' AND nome = '" . $nome . "'";

                echo $sql;
                $result = mysqli_query($db, $sql); /* executa a query */
                while ($row = mysqli_fetch_array($result)) { //erro está aqui
                    echo "<h4> Nome: " . $row["nome"] . "</h4> \n";
                    echo "<h5> Categoria: " . $row["categoria"] . "<br/><br/>"
                    . " Valor: R$" . $row["valor"] . "<br/><br/> Duração: " . $row["duracao"] . " " .
                    $row["periodo"] .
                    "</h5> \n";
                }
            } else
                echo"<a href='categorias.html' >Nomes dos projetos candidatos</a>";


            mysqli_close($db);

            echo'<p><a href="cadastroProjeto.html">Inserir outro projeto</a></p>' . "\n";
            echo'<p><a href="consultaProjeto.html">Nova pesquisa</a></p>' . "\n";
            echo'<p><a href="atualizaProjeto.html">Modificar projeto</a></p>' . "\n";
            echo'<p><a href="apagaProjeto.html">Excluir projeto</a></p>' . "\n";
        }
        ?>
    </body>
</html>