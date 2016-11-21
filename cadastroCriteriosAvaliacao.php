<?php

if (isset($_POST["cadastrar"])) {
    $db = mysqli_connect("localhost", "root");

    if (!$db) {
        die('Não foi possível Conectar: ' . mysql_error());
    }
    mysqli_select_db($db, "spq");

//pegando os valores inseridos
    $categoria = $_POST["categoria"];
    $criterio = $_POST["criterio"];
    $status = $_POST["status"];
    $peso = $_POST["peso"];
    $codigo_usuario = "1";

    $strSQL = ("INSERT INTO criterio_avaliacao (id_categoria,codigo_usuario,criterio_avaliacao,status_criterio,peso_criterio) VALUES ('" .  $categoria . "','" . $codigo_usuario . "','" . $criterio . "','" . $status . "','" . $peso . "')");
    mysqli_query($db, $strSQL); /* executa a query */
    mysqli_close($db);

  include 'respCadastroCriterios.php';
}
?>