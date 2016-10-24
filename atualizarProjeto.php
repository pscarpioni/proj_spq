<!DOCTYPE>
<html>
    <head>
        <title>Atualização de Projetos Candidatos</title>
    </head>
    <body>
        <h3>Exibindo os projetos atualizados</h3>
        <?php
        //session_start();
        include_once("validar.php");
        $nome = NULL;
        $categoria = NULL;
        $duracao = NULL;
        $periodo = NULL;
        $codigo = $_POST["codigo"];
        if (isset($_POST["Atualizar"])) {
            $db = mysqli_connect("localhost", "root");
            mysqli_select_db($db, "projeto");
            if (isset($_POST["nome"])){
                 $nome = $_POST["nome"];
                 $sql = "UPDATE candidato SET nome = '$nome' WHERE codigo = '$codigo'";
            }
            if(isset($_POST["categoria"])){
                $categoria = $_POST["categoria"];
                $sql = "UPDATE candidato SET categoria = '$categoria' WHERE codigo = '$codigo'";
            }   
            if(isset($_POST["duracao"])){
                $duracao = $_POST["duracao"];
                $sql = "UPDATE candidato SET duracao = '$duracao' WHERE codigo = '$codigo'";
            }
            if(isset($_POST["periodo"])){
                $periodo = $_POST["periodo"];
                $sql = "UPDATE candidato SET periodo = '$periodo' WHERE codigo = '$codigo'";
            }
            
           //echo $sql;
                $sql = "SELECT nome,codigo,categoria,valor,duracao,periodo FROM candidato WHERE"
                        . " codigo = '".$codigo."'";
                $result = mysqli_query($db, $sql); /* executa a query */
                //*
                while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)) { //erro está aqui
                    echo "<h4> Nome: " . $row["nome"] . "</h4> \n";
                    echo "<h5> Categoria: " . $row["categoria"] . "<br/><br/>"
                    . " Valor: R$" . $row["valor"] . "<br/><br/> Duração: " . $row["duracao"] . " " .
                    $row["periodo"] .
                    "</h5> \n";
                }
                //*/
   
            mysqli_close($db);

            echo'<p><a href="cadastroProjeto.html">Inserir outro projeto</a></p>' . "\n";
            echo'<p><a href="consultaProjeto.html">Nova pesquisa</a></p>' . "\n";
          
        }
        ?>
    </body>
</html>