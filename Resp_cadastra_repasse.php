<?php

if (isset($_POST["cadastrar"])) {
    $db = mysqli_connect("localhost", "root");

    if (!$db) {
        die('Não foi possível Conectar: ' . mysql_error());
    }
    mysqli_select_db($db, "spq");

	
//pegando os valores inseridos
    $codigo_usuario = $_POST["codigo"];
    $necessidade = $_POST["necessidade"];
    $valorParcela = $_POST["valorParcela"];
    $codigo_projeto = $_POST["codigo_projeto"];
    $id_categoria = $_POST["id_categoria"];
    $valor_restante = $_POST["v_rest"];
    
    
    $datai = date('Y-m-d');
    $data = date("Y-m-d", strtotime($datai));
    
    if ($valorParcela > $valor_restante)
    {
        include 'respNegRepasse.php'; 
    }   
    else{
    $query = "INSERT INTO valor_repasse_financeiro (codigo_projeto, id_categoria, codigo_usuario, necessidade, data, valor_parcela)"
                . "VALUES ('".$codigo_projeto."','".$id_categoria."', '".$codigo_usuario."','".$necessidade."',"
                . "'".$data."','".$valorParcela."' )";

        mysqli_query($db, $query);
        mysqli_close($db);
        include 'respCadastroCriterios.php';
    }
}

    ?>
</div> 
</body>
</html>
