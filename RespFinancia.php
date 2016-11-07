<?php

if (isset($_POST["financiar"])) {
    $db = mysqli_connect("localhost", "root");

    if (!$db) {
        die('Não foi possível Conectar: ' . mysql_error());
    }
    mysqli_select_db($db, "spq");

//pegando os valores inseridos
    $codigo = $_POST["codigo"];
    $categoria = $_POST["categoria"];
    $tipo = $_POST["tipo"];
    $modulos = $_POST["modulos"];
    $valor = $_POST["valor"];
    $pag = $_POST["pag"];
    $codigo_usuario = "1";
    
    $min = ("select valor_min from restricao_financiamento where codigo_projeto ='" .$codigo . "'");
    $res_min = mysqli_query($db, $min); //manda executar pra pegar valor
    if ($consulta = mysqli_fetch_array($res_min)){
		$verif_min = $consulta['valor_min']; 
    }
    
    $max = ("select valor_max from restricao_financiamento where codigo_projeto ='" .$codigo . "'");
    $res_max = mysqli_query($db, $max); //manda executar pra pegar valor
    if ($consulta = mysqli_fetch_array($res_max)){
		$verif_max = $consulta['valor_max']; 
    }
    
    if(($valor > $verif_max) || ($valor < $verif_min)){
        
        include 'respNegativaFinanciamento.php';
        
    } else {
        
        $strSQL = ("INSERT INTO financiamento (codigo_projeto,id_categoria,codigo_usuario,tipo_financ,quant_modulos, valor, forma_pagamento) VALUES ('" . $codigo . "','" . $categoria . "','" . $codigo_usuario . "','" . $tipo . "','" . $modulos . "','" . $valor . "','" . $pag . "')");
        echo $strSQL;
        mysqli_query($db, $strSQL); /* executa a query */
        mysqli_close($db);
        include 'respCadastroCriterios.php';
    }
    
    
    
    
   
}
?>