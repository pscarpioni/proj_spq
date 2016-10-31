<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <h3>Exibindo os projetos atualizados</h3>
    <?php
    $codigo = $_POST["codigo"];
    if (isset($_POST["Apagar"])) {
        $db = mysqli_connect("localhost", "root");
        mysqli_select_db($db, "spq");
        $sql = "DELETE FROM projeto WHERE codigo_projeto = '$codigo'";
        $result = mysqli_query($db, $sql);
        $sql = "SELECT nome_projeto,codigo_projeto,id_categoria,valor_projeto,duracao_projeto FROM projeto";
        echo"<h2>Exclusão feita com sucesso!</h2>";
        mysqli_close($db);
    }
    ?>
</div> 
</body>
</html>