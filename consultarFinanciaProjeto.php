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

        if ((empty($nome))) {
            echo "<h2> Consulta dos financiamentos </h2>";
            echo "<div class = 'panel panel-default'>
            <table class = 'table'> <tr>
            <th width = '200' >Codigo do Projeto </th>
            <th width = '200' >Nome do Projeto </th>
            <th width = '200'>Valor </th>
            </tr> ";
            $query = ("select codigo_projeto, nome_projeto, valor_projeto from projeto ORDER BY nome_projeto ASC");
            $res = mysqli_query($db, $query);

            while ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height = '50'>
                <td> <a href='dados_consulta_financiamento.php?busca=" . $consulta['codigo_projeto'] . "'>" . $consulta['codigo_projeto'] . "</a></td>
                <td>" . $consulta['nome_projeto'] . "</td>                
                <td>" . $consulta['valor_projeto'] . "</td>
                </tr>";
            }
            echo" </table></div>";
            echo "<p align = 'center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        } 
        
        if ((!empty($nome))) {
            echo "<h2> Consulta dos financiamentos </h2>";
            echo "<div class = 'panel panel-default'>
            <table class = 'table'> <tr>
            <th width = '200' >Codigo do Projeto </th>
            <th width = '200' >Nome do Projeto </th>
            <th width = '200'>Valor </th>
            </tr> ";
            $query = ("select codigo_projeto, nome_projeto, valor_projeto from projeto where nome_projeto = '$nome' ORDER BY nome_projeto ASC");
            $res = mysqli_query($db, $query);

            if ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height = '50'>
                <td> <a href='dados_consulta_financiamento.php?busca=" . $consulta['codigo_projeto'] . "'>" . $consulta['codigo_projeto'] . "</a></td>
                <td>" . $consulta['nome_projeto'] . "</td>                
                <td>" . $consulta['valor_projeto'] . "</td>
                </tr>";
            }
            echo" </table></div>";
            echo "<p align = 'center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        } 
        echo" </table></div>";
        echo "<p align = 'center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>

