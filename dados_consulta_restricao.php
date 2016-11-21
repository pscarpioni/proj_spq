<?php include("cabecalho_funcionalidade.php"); ?>
</script>
</head>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_GET["busca"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        echo "<h3>Atribuir Restrição ao Financiamento do Projeto: </h3>";


        $busca = $_GET["busca"];
        $query = ("select codigo_projeto, id_categoria, status, valor_projeto from projeto where codigo_projeto = '" . $busca . "'");
        $res = mysqli_query($db, $query);
        while($consulta = mysqli_fetch_array($res)) {
            echo "<form action='RespRestricao.php' method='POST' id='form' name='frm' onsubmit='return validacao(this)'>"
            . "<b>Codigo do Projeto: <input type='text' name='codigo' size='20' value=" . $consulta['codigo_projeto'] . " readonly><br><br>"
            . "<b>Valor do Projeto: <input type='text' name='valor' size='20' value=" . $consulta['valor_projeto'] . " readonly><br><br>"
            . "<b>Categoria: </b> <input type='text' name='categoria' size='20' value=" . $consulta['id_categoria'] . " readonly><br><br>
                            
               <b> Prazo Máximo: </b> <input type='text' name='prazo_max'> <br><br>
               <b> Valor Mínimo: </b> <input type='text' name='valor_min'> <br><br>
               <b> Valor Máximo: </b> <input type='text' name='valor_max'> <br><br>";
            
        }
        echo"<div class='row'>
                            <div class='col-sm-12'>
                                <div class='text-center'><input type='submit' name='restricao' class='btn btn-primary btn-lg' value='Adicionar Restrições'></div></div></div></form><br><br>";
        echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>

