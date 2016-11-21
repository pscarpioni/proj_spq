<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["consultar"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");
        if ((empty($_POST["nome"]))) {
            echo "<div class='text-center'> <h2><ins> Recompensas </ins></h2><br></div>";
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200' >Nome do Projeto</th>
                                    <th width='200'>Recompensa</th>
                                    <th width='200'>Valor Mínimo</th>
                                    <th width='200'>Valor Máximo</th>
                                    <th width='200'>Limite</th>
                                    </tr> ";
            $query = ("select projeto.nome_projeto, recompensa.descricao, recompensa.valor_min, recompensa.valor_max, recompensa.limite from recompensa inner join projeto on recompensa.codigo_projeto = projeto.codigo_projeto");

            $res = mysqli_query($db, $query);

            while ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>
                                        <td width='200'>" . $consulta['nome_projeto'] . "</td> 
                                        <td width='200'>" . $consulta['descricao'] . "</td>
                                        <td width='200'>" . $consulta['valor_min'] . "</td> 
                                        <td width='200'>" . $consulta['valor_max'] . "</td>
                                        <td width='200'>" . $consulta['limite'] . "</td>
                              
                                         </tr>";
            }
            echo" </table></div>";
            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        }
        if ((!empty($_POST["nome"]))) {
            echo "<div class='text-center'> <h2><ins> Recompensas </ins></h2><br></div>";
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200' >Nome do Projeto</th>
                                    <th width='200'>Recompensa</th>
                                    <th width='200'>Valor Mínimo</th>
                                    <th width='200'>Valor Máximo</th>
                                    <th width='200'>Limite</th>
                                    </tr> ";
            $query = ("select projeto.nome_projeto, recompensa.descricao, recompensa.valor_min, recompensa.valor_max, recompensa.limite from recompensa inner join projeto on recompensa.codigo_projeto = projeto.codigo_projeto and projeto.nome_projeto = '" . $_POST["nome"] . "'");

            $res = mysqli_query($db, $query);

            while ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>
                                        <td width='200'>" . $consulta['nome_projeto'] . "</td> 
                                        <td width='200'>" . $consulta['descricao'] . "</td>
                                        <td width='200'>" . $consulta['valor_min'] . "</td> 
                                        <td width='200'>" . $consulta['valor_max'] . "</td>
                                        <td width='200'>" . $consulta['limite'] . "</td>
                              
                                         </tr>";
            }
            echo" </table></div>";
            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        }
    }
    ?>
</div> 
</body>
</html>
