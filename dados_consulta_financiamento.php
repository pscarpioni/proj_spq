<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_GET["busca"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        echo "<div class='panel panel-default'><table class='table'><tr>
                                    <th>Informações sobre o financiamento do projeto: </th>
                                    </tr>";

        $busca = $_GET["busca"];
        $query = ("select * from financiamento where id_financ = '" . $busca . "' and codigo_usuario = '" . $_SESSION["codigo"] . "'");
        $res = mysqli_query($db, $query);
        while ($consulta = mysqli_fetch_array($res)) {
            echo" <tr><td><br><b> Código do Projeto: </b>" . $consulta['codigo_projeto'] . "<br>
                                <b> Tipo de Financiamento: </b>" . $consulta['tipo_financ'] . "<br>"
            . " <b> Quantidade de módulos: </b>" . $consulta['quant_modulos'] . "<br>"
            . "<b> Valor: </b>" . $consulta['valor'] . "<br>"
            . "<b> Forma de pagamento: </b>" . $consulta['forma_pagamento'] . "<br><br></td></tr><br>";
        }
        echo"</table></div>";
        echo "<p align='center'><a href = 'consultaFinanciamento.php'>Voltar</a><p/>";
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>


