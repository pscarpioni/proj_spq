<?php include("cabecalho_funcionalidade.php"); ?>
<script type="text/javascript">

    function liberar() {
        if (document.getElementById("tip").value == "Módulo")
            document.getElementById("modulos").style.visibility = 'visible';
        else
            document.getElementById("modulos").style.visibility = 'hidden';
    }
    
    function validacao(frm) {
        if (document.frm.valor.value == "") {
            alert("O campo Valor não foi informado.");
            frm.cpf.focus();
            return false;
        }
    }

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

        echo "<h3>Financiar projeto: </h3>";


        $busca = $_GET["busca"];
        $query = ("select codigo_projeto,id_categoria from projeto where codigo_projeto = '" . $busca . "'");
        $res = mysqli_query($db, $query);
        while ($consulta = mysqli_fetch_array($res)) {
            echo "<form action='RespFinancia.php' method='POST' id='form' name='frm' onsubmit='return validacao(this)'>"
            . "<b>Codigo do Projeto: <input type='text' name='codigo' size='20' value=" . $consulta['codigo_projeto'] . " readonly><br><br>"
            . "<b>Categoria: </b> <input type='text' name='categoria' size='20' value=" . $consulta['id_categoria'] . " readonly><br><br>
             <b> Tipo de Financiamento: </b> <select id = 'tip' name='tipo' onblur='liberar();'> 
                    <option value='Integral'>Integral</option>
                    <option value='Módulo'>Módulo</option>
                   </select><br><br>
            <b> Quantidade de módulos: </b> <input type='text' id='modulos' name='modulos' style='visibility: hidden;'> <br><br>  
             <b> Valor a ser pago: </b> <input type='text' name='valor'> <br><br>
             <b> Forma de pagamento: </b> <select id = 'pag' name='pag'> 
                    <option value='Boleto Bancario'>Boleto Bancário</option>
                    <option value='Cartão de Credito'>Cartão de Crédito</option>
                    <option value='Cartão de Debito'>Cartão de Débito</option>
                    <option value='Cheque'>Cheque</option>
                    <option value='Transferencia Bancaria'>Transferência Bancária</option>
                   </select><br><br> <br><br>";
        }
        echo"<div class='row'>
                            <div class='col-sm-12'>
                                <div class='text-center'><input type='submit' name='financiar' class='btn btn-primary btn-lg' value='Financiar'></div></div></div></form><br><br>";
        echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>



