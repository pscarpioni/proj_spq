<?php

if (isset($_POST["cadastrar"])) {
    $db = mysqli_connect("localhost", "root");

    if (!$db) {
        die('Não foi possível Conectar: ' . mysql_error());
    }
    mysqli_select_db($db, "spq");

//pegando os valores inseridos
   // $codigo_usuario = $_SESSION["codigo"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $valorMinimo = $_POST["valorMinimo"];
    $valorMaximo = $_POST["valorMaximo"];
    $limite = $_POST["limite"];
    $codigo_usuario = "1";

    $query = ("select financiamento.id_financ, financiamento.codigo_projeto, financiamento.id_categoria, projeto.nome_projeto from financiamento inner join projeto on financiamento.codigo_projeto = projeto.codigo_projeto and projeto.nome_projeto ='" . $nome . "'");
    $res = mysqli_query($db, $query);

    $consulta = mysqli_fetch_array($res);

    $strSQL = ("INSERT INTO recompensa (codigo_usuario,id_categoria, id_financ, codigo_projeto, descricao, valor_min, valor_max, limite) VALUES ('" . $codigo_usuario . "','" . $consulta['id_categoria'] . "','" . $consulta['id_financ'] . "','" . $consulta['codigo_projeto'] . "','" . $descricao . "', '" . $valorMinimo . "', '" . $valorMaximo . "', '" . $limite . "')");
    mysqli_query($db, $strSQL); /* executa a query */
    mysqli_close($db);

  include 'respCadastroCriterios.php';
}
