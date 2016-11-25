<?php include("cabecalho_funcionalidade.php"); ?>

<script type="text/javascript">

    function validacao(frm) {

        if (document.frm.necessidade.value == "" || document.frm.data.value == "" || document.frm.valorParcela.value == "" || document.frm.status.value == "") {
            alert("Preencha corretamente todos os campos!");
            frm.necessidade.focus();
            return false;
        }
      
        document.frm.submit();
    }
</script>
</head>
<div class="col-md-9 well admin-content" id="home">
    <?php
    $codigo = $_SESSION["codigo"];

    if (isset($_POST["consultar"])) {

        $nome = $_POST["valor"];

        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        if (!empty($nome)) {
            $query4 = ("select distinct p.nome_projeto from projeto p where nome_projeto = '" . $nome . "'");
            $res4 = mysqli_query($db, $query4);
            if ($consulta4 = mysqli_fetch_array($res4)) {
                $query3 = ("select distinct f.codigo_projeto, f.id_categoria from financiamento f inner join projeto p on f.codigo_projeto = p.codigo_projeto and nome_projeto = '" . $nome . "'");
                $res3 = mysqli_query($db, $query3);
                if ($consulta3 = mysqli_fetch_array($res3)) {
                    echo "<h3>Projeto:  " . $nome . "</h3>";
                    echo "<div class = 'panel panel-default'>
            <table class = 'table'> <tr>
            </tr> ";
                    $query = ("select sum(f.valor) as valor from financiamento f inner join projeto p on f.codigo_projeto = p.codigo_projeto and nome_projeto = '" . $nome . "'");
                    $res = mysqli_query($db, $query);
                    if ($consulta = mysqli_fetch_array($res)) {
                        $total_financiamento = $consulta['valor'];
                        echo "<th width = '200' >Total Financiamento</th>
            <th width = '250'>" . "R$" . $consulta['valor'] . "</th>";
                    }

                    $query2 = ("select sum(r.valor_parcela) as valor_parcela from valor_repasse_financeiro r inner join projeto p on r.codigo_projeto = p.codigo_projeto and nome_projeto = '" . $nome . "'");
                    $res2 = mysqli_query($db, $query2);
                    if ($consulta2 = mysqli_fetch_array($res2)) {
                        $total_repassado = $consulta2['valor_parcela'];
                        echo "<th width = '200' >Total Repasses</th>
            <th width = '250'>" . "R$" . $consulta2['valor_parcela'] . "</th>";
                    }

                    $valor_restante = $total_financiamento - $total_repassado;
                    echo "<th width = '200' >Total Restante</th>
            <th width = '250'>" . "R$" . $valor_restante . "</th>";
                    echo" </table></div>";

                    echo"<tr height='50'>
                    <form action = 'Resp_cadastra_repasse.php' method = 'POST' id = 'form' name = 'frm' onsubmit='return validacao(this);'>
                    <div class = 'text-center'>
                    <br><h2><ins>Cadastrar Repasse</ins></h2><br></div>
                        <b> * Necessidade: </b> <input type = 'text' name = 'necessidade' size = '100' required><br><br>
                        <b> * Valor da Parcela: </b> <input type = 'text' name = 'valorParcela' size = '20' required> <br><br>
                        <br><br>

                        <input type='hidden' name='codigo_projeto' size='20' value=" . $consulta3['codigo_projeto'] . "><br><br>
                        <input type='hidden' name='id_categoria' size='20' value=" . $consulta3['id_categoria'] . "><br><br>
                        <input type='hidden' name='codigo' size='20' value=" . $codigo . ">
                        <input type='hidden' name='v_rest' size='20' value=" . $valor_restante . ">   
                        (*) Campos de preenchimento obrigatório.
                        <br><br>
                        
                        <div class = 'row'>
                        <div class = 'col-sm-12'>
                            <div class = 'text-center'>
                            <input type = 'submit' name = 'cadastrar' class = 'btn btn-primary btn-lg' value = 'Cadastrar' onclick = ''>
                            <input type = 'reset' name = 'reset' class = 'btn btn-primary btn-lg' value = 'Limpar Campos'>
                            </div></div>
                            </div>
                            </div>
                            </form>";
                } else {
                    echo "<p> <h2> Repasse Inválido! Esse projeto não possui financiamento. </h2> </p>";
                }
                //echo "<p align = 'center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
                mysqli_close($db);
                return 0;
            } else {
                echo "<p> <h2> Projeto inexistente!!  </h2> </p>";
            }
            echo" </table></div>";
            echo "<p align = 'center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        }
    }
    ?>
</div> 
</body>
</html>

