<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["consultar"])) {
        $nome = $_POST["nome"];
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");
		
        if (!empty($nome)) {
            $query3 = ("select distinct p.nome_projeto from projeto p where nome_projeto = '" . $nome . "'");
            $res3 = mysqli_query($db, $query3);
            if ($consulta3 = mysqli_fetch_array($res3)) {
                echo "<div class='text-center'> <h2><ins> Repasses Financeiros </ins></h2><br></div>";
                $query2 = ("select sum(r.valor_parcela) as valor_parcela from valor_repasse_financeiro r inner join projeto p on r.codigo_projeto = p.codigo_projeto and nome_projeto = '" . $_POST["nome"] . "'");
                $res2 = mysqli_query($db, $query2);
                if ($consulta2 = mysqli_fetch_array($res2)) {
                    $total_repassado = $consulta2['valor_parcela'];
                }
                echo "
            <b>Nome do Projeto: " . $_POST["nome"] . "</b><br><br>
            <b>Valor total dos repasses: " . $total_repassado . "</b><br><br>";


                echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200'>Necessidade</th>
                                    <th width='200'>Valor atribuído à necessidade</th>
                                    <th width='200'>Data</th>
                                    </tr> ";
                $query = ("select projeto.nome_projeto, valor_repasse_financeiro.necessidade, valor_repasse_financeiro.data, valor_repasse_financeiro.valor_parcela from valor_repasse_financeiro inner join projeto on valor_repasse_financeiro.codigo_projeto = projeto.codigo_projeto and projeto.nome_projeto = '" . $_POST["nome"] . "'");

                $res = mysqli_query($db, $query);

                while ($consulta = mysqli_fetch_array($res)) {
                    echo"<tr height='50'>
                                        <td width='200'>" . $consulta['necessidade'] . "</td> 
                                        <td width='200'>" . $consulta['valor_parcela'] . "</td>
                                        <td width='200'>" . $consulta['data'] . "</td>
                              
                                         </tr>";
                }
            } else {
                echo "<p> <h2> Projeto inexistente!!  </h2> </p>";
            }
            echo" </table></div>";
            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
          
        } else {

            echo "<div class='text-center'> <h2><ins> Repasses Financeiros </ins></h2><br></div>";
            $query4 = ("select distinct f.codigo_projeto,  p.nome_projeto from valor_repasse_financeiro f inner join projeto p on p.codigo_projeto = f.codigo_projeto");
            $res4 = mysqli_query($db, $query4);

            echo "
            <b>Nome do Projeto: " . $_POST["nome"] . "</b><br><br>";
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200'>Código do Projeto</th>
                                    <th width='200'>Nome do Projeto</th>
                                   
                                    </tr> ";
            while ($consulta4 = mysqli_fetch_array($res4)) {
                echo"<form action = 'RespConsultaRepasseFinanceiro.php' method='POST'>
                                        <td width='200'> " . $consulta4['codigo_projeto'] . "</td> 
                                        <td width='200'> <input type='radio' name='nome' value='nome'> " . $consulta4['nome_projeto'] . " </a>  </td>     
                                <div class='text-center'>
                                    <input type='submit' name='consultar' class='btn btn-primary btn-lg' value='Consultar'>
                                </div>
                         </form> ";
            }
        }
    }
  ?>
</div> 
</body>
</html>
