<?php

if (isset($_POST["restricao"])) {
    $db = mysqli_connect("localhost", "root");

    if (!$db) {
        die('Não foi possível Conectar: ' . mysql_error());
    }
    mysqli_select_db($db, "spq");

//pegando os valores inseridos
    $codigo = $_POST["codigo"];
    $categoria = $_POST["categoria"];
    $valor = $_POST["valor"];  
    $prazo_max = $_POST["prazo_max"];
    $valor_min = $_POST["valor_min"];
    $valor_max = $_POST["valor_max"];
    $codigo_usuario = "1";

    $query = ("select valor_projeto from projeto where codigo_projeto ='" .$codigo . "'");
    $res = mysqli_query($db, $query); //manda executar pra pegar valor
    if ($consulta = mysqli_fetch_array($res)){
		$teste = $consulta['valor_projeto'];
    }	
    
    //verifica se tem uma restrição deste projeto
    $query2 = ("select codigo_projeto from restricao_financiamento where codigo_projeto ='" .$codigo . "'");
    $res2 = mysqli_query($db, $query2); //manda executar pra pegar valor
    if ($consulta = mysqli_fetch_array($res2)){
		mysqli_close($db);
                include 'respNegativaRestricao.php';
    }	
    else{
        if (empty($prazo_max) && empty($valor_min) && empty($valor_max)){
            
             $query = "INSERT INTO restricao_financiamento (codigo_usuario, id_categoria, codigo_projeto, prazo_max, valor_min, valor_max)"
                    . "VALUES ('".$codigo_usuario."','".$categoria."', '".$codigo."', '12',"
                    . "'10','".$teste."')";
        }
        
        else if ((!empty($prazo_max)) && empty($valor_min) && empty($valor_max)){
            
             $query = "INSERT INTO restricao_financiamento (codigo_usuario, id_categoria, codigo_projeto, prazo_max, valor_min, valor_max)"
                    . "VALUES ('".$codigo_usuario."','".$categoria."', '".$codigo."', '".$prazo_max."' ,"
                    . "'10','".$teste."')";
        }
        
        else if (empty($prazo_max) && (!empty($valor_min)) && empty($valor_max)){
            
             $query = "INSERT INTO restricao_financiamento (codigo_usuario, id_categoria, codigo_projeto, prazo_max, valor_min, valor_max)"
                    . "VALUES ('".$codigo_usuario."','".$categoria."', '".$codigo."', '12',"
                    . "'".$valor_min."' ,'".$teste."')";
        }
        
        else if (empty($prazo_max) && empty($valor_min) && (!empty($valor_max))){
            
             $query = "INSERT INTO restricao_financiamento (codigo_usuario, id_categoria, codigo_projeto, prazo_max, valor_min, valor_max)"
                    . "VALUES ('".$codigo_usuario."','".$categoria."','".$codigo."', '12',"
                    . "'10' ,'".$valor_max."')";
        }
        
        else if ((!empty($prazo_max)) && (!empty($valor_min)) && (empty($valor_max))){
            
             $query = "INSERT INTO restricao_financiamento (codigo_usuario, id_categoria, codigo_projeto, prazo_max, valor_min, valor_max)"
                    . "VALUES ('".$codigo_usuario."','".$categoria."', '".$codigo."', '".$prazo_max."',"
                    . "'".$valor_min."' ,'".$teste."')";
        }
        
        else if ((!empty($prazo_max)) && (empty($valor_min)) && (!empty($valor_max))){
            
             $query = "INSERT INTO restricao_financiamento (codigo_usuario, id_categoria, codigo_projeto, prazo_max, valor_min, valor_max)"
                    . "VALUES ('".$codigo_usuario."','".$categoria."', '".$codigo."', '".$prazo_max."',"
                    . "'10' ,'".$valor_max."')";
        }
        
        else if ((empty($prazo_max)) && (!empty($valor_min)) && (!empty($valor_max))){
            
             $query = "INSERT INTO restricao_financiamento (codigo_usuario, id_categoria, codigo_projeto, prazo_max, valor_min, valor_max)"
                    . "VALUES ('".$codigo_usuario."','".$categoria."' ,'".$codigo."', '12',"
                    . "'".$valor_min."','".$valor_max."')";
        }

        else{
        $query = "INSERT INTO restricao_financiamento (codigo_usuario, id_categoria,codigo_projeto, prazo_max, valor_min, valor_max)"
                . "VALUES ('".$codigo_usuario."','".$categoria."', '".$codigo."','".$prazo_max."',"
                . "'".$valor_min."','".$valor_max."')";
        }
        
        mysqli_query($db, $query); /* executa a query */
        mysqli_close($db);
        include 'respCadastroCriterios.php';
        }
   }
    ?>
</div> 
</body>
</html>
    
    
    
    
