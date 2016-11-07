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
    $status = $_POST["status"];
    $peso = $_POST["peso"];
    $codigo_usuario = "1";
    $valor = $_POST["valor"];

    $query = ("select id_categoria from categoria where categoria_projeto ='" . $categoria . "'");
    $res = mysqli_query($db, $query);

    $consulta = mysqli_fetch_array($res);

    $sql = "update criterio_avaliacao set id_categoria='" . $consulta['id_categoria'] . "',codigo_usuario='" . $codigo_usuario . "',criterio_avaliacao='" . $criterio . "',status_criterio='" . $status . "',"
            . "peso_criterio='" . $peso . "' WHERE criterio_avaliacao='" . $valor . "'";


    $result = mysqli_query($db, $sql); /* executa a query */
    if ($result) {
        echo "<script>alert('Criterio de avaliação alterado com sucesso!'); window.location.href='home_adm.php' </script>";
    } else {
        echo json_encode(array('msg' => 'Erro ao atualizar dados.'));
    }
    mysqli_close($db);
    ?>
</div> 
</body>
</html>
