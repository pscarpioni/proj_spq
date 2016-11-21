<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    $db = mysqli_connect("localhost", "root");

    if (!$db) {
        die('Não foi possível Conectar: ' . mysql_error());
    }
    mysqli_select_db($db, "spq");
    $categoria = $_POST["categoria"];
    $criterio = $_POST["criterio"];
    $peso = $_POST["peso"];
    $valor = $_POST["valor"];
    $status = $_POST["status"];

    $sql = "update criterio_avaliacao set status_criterio='" . $status . "', id_categoria='" . $categoria . "',criterio_avaliacao='" . $criterio . "',"
            . "peso_criterio='" . $peso . "' WHERE criterio_avaliacao='" . $valor . "'";


    $result = mysqli_query($db, $sql); /* executa a query */
    if ($result) {
        echo "<script>alert('Critério de avaliação alterado com sucesso!'); window.location.href='home_adm.php' </script>";
    } else {
        echo json_encode(array('msg' => 'Erro ao atualizar dados.'));
    }
    mysqli_close($db);
    ?>
</div> 
</body>
</html>
