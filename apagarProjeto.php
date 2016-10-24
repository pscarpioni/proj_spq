<!DOCTYPE>
<html>
    <head>
        <title>Exclusão de Projetos Candidatos</title>
    </head>
    <body>
        <h3>Exibindo os projetos atualizados</h3>
        <?php
        //session_start();
        include_once("validar.php");
        $codigo = $_POST["codigo"];
        if (isset($_POST["Apagar"])) {
            $db = mysqli_connect("localhost", "root");
            mysqli_select_db($db, "projeto");
            $sql = "DELETE FROM candidato WHERE codigo = $codigo";
            
           echo $sql;
                $sql = "SELECT nome,codigo,categoria,valor,duracao,periodo FROM candidato";
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
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

