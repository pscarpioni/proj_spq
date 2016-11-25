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

        echo "<h3>Atribuir Restrição ao Financiamento do Projeto: </h3><br>";


        $busca = $_GET["busca"];
        $query = ("select codigo_projeto, id_categoria, status, valor_projeto from projeto where codigo_projeto = '" . $busca . "'");
        $res = mysqli_query($db, $query);
        while($consulta = mysqli_fetch_array($res)) {
            echo "<form action='RespRestricao.php' method='POST' id='form' name='frm'>"
            . "<input type='hidden' name='codigo' size='20' value=" . $consulta['codigo_projeto'] . " readonly>"
            . "<input type='hidden' name='valor' size='20' value=" . $consulta['valor_projeto'] . " readonly>"
            . "<input type='hidden' name='categoria' size='20' value=" . $consulta['id_categoria'] . " readonly><br><br>
                            
               <b> Prazo Máximo (em meses): </b> <input type='number' name='prazo_max' value='1'> <br><br>
               <b> Valor Mínimo para receber de financiamentos: </b> <input type='number' name='valor_min' value='10'> <br><br>
               <b> Valor Máximo para receber de financiamentos: </b> <input type='number' name='valor_max' value='" . $consulta['valor_projeto'] . "'> <br><br><br>";
            
        }
        echo"<div class='row'>
                            <div class='col-sm-12'>
                                <div class='text-center'><input type='submit' name='restricao' class='btn btn-primary btn-lg' value='Adicionar Restrições'></div></div></div></form><br><br>";
        echo "<p align='center'><a href = 'cadastraRestricaoFinanciamento.php'>Voltar</a><p/>";
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>

