<!DOCTYPE>
<html>
    <head>
        <title>Cadastro de Projetos Candidatos</title>
    </head>
    <body>
        <h3>Salvando o projeto cadastrado</h3>
        <?php
        if (isset($_POST["Cadastrar"])) {
            $nome =  $_POST["nome"];
            $categoria =  $_POST["categoria"];
            $duracao = $_POST["duracao"];
            $periodo =$_POST["periodo"];
            $valor = $_POST["valor"];
            $status =$_POST["status"];
            $db = mysqli_connect("localhost", "root"); //erro está aqui!!!
            mysqli_select_db($db,"projeto");
            $sql = "INSERT INTO candidato(nome,categoria,duracao,periodo,valor,status) VALUES('".
                    $nome."','".$categoria."','".$duracao."','".$periodo."','".$valor."','".$status."'"
                    . ")";
            echo $sql;
            mysqli_query($db,$sql); /* executa a query */
            mysqli_close($db);
            echo"<h3>Obrigado. Seus dados foram inseridos</h3> \n";
            echo'<p><a href="cadastroProjeto.html">Inserir outro aluno</a></p>' . "\n";
            echo'<p><a href="consulta.html">Veja a lista de alunos</a></p>' . "\n";
        }
        ?>
    </body>
</html>