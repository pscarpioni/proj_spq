<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <h3>Exibindo os projetos cadastrados</h3>
    <?php
    $categoria = $_POST["categoria"];
    $db = mysqli_connect("localhost", "root");
    mysqli_select_db($db, "spq");

    $sql = "SELECT nome_projeto,id_categoria,valor_projeto,duracao_projeto,codigo_projeto FROM "
            . "projeto WHERE id_categoria = '" . $categoria . "'";

    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        echo "<h4> Nome: " . $row["nome_projeto"] . "</h4> \n";
        echo "<h4> Categoria: " . $row["id_categoria"] . "<br/>Código:" . $row["codigo_projeto"]
        . "<br/>Valor: R$" . $row["valor_projeto"] . "<br/> Duração: " .
        $row["duracao_projeto"] . " "
        . "meses</h4> \n";
    }
    mysqli_close($db);
    ?>
</div> 
</body>
</html>

