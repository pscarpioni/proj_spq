<?php include("cabecalho_funcionalidade.php"); ?>		
<div class="col-md-9 well admin-content" id="home">
    <h3>Exibindo os projetos atualizados</h3>
    <?php
    $nome = NULL;
    $categoria = NULL;
    $duracao = NULL;
    $periodo = NULL;
    $codigo = $_POST["codigo"];
    if (isset($_POST["Atualizar"])) {
        $db = mysqli_connect("localhost", "root");
        mysqli_select_db($db, "spq");
        $nome = $_POST["nome"];
        $categoria = $_POST["categoria"];
        $duracao = $_POST["duracao"];
        $valor = $_POST["valor"];

        $sql = "UPDATE projeto SET nome_projeto = '$nome', id_categoria = '$categoria', "
                . "duracao_projeto = '$duracao', valor_projeto = '$valor' WHERE codigo_projeto = '$codigo'";
        $result = mysqli_query($db, $sql);

        $sql = "SELECT nome_projeto,codigo_projeto,id_categoria,valor_projeto,duracao_projeto FROM projeto WHERE"
                . " codigo_projeto = '$codigo'";
        echo"<h4>Atualização feita com sucesso!</h4>";
        mysqli_close($db);
    }
    ?>
</div> 
</body>
</html>