<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["consultar"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        echo "<h3>Financiar projeto: </h3>"; 
        if ((empty($_POST["codigo"])) && (empty($_POST["nome"]))) {
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200' >Codigo do Projeto</th>
                                    <th width='200'>Nome</th>
                                    </tr> ";
            $query = ("select codigo_projeto, nome_projeto, id_categoria, status, valor_projeto from projeto where status = 'Aprovado'");
            $res = mysqli_query($db, $query);
            while ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>                                    
                                        <td><a href='dados_consulta_restricao.php?busca=" . $consulta['codigo_projeto'] . "'>" . $consulta['codigo_projeto'] .  "</a></td>
                                        <td>" . $consulta['nome_projeto'] . "</td>                                          
                                        </tr>";
            }
            echo" </table></div>";
            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        }
        if ((!empty($_POST["codigo"])) && (!empty($_POST["nome"]))) {
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200' >Codigo do Projeto</th>
                                    <th width='200'>Nome</th>
                                    </tr> ";
            $query = ("select codigo_projeto, nome_projeto, id_categoria, status, valor_projeto from projeto where codigo_projeto = '" . $_POST["codigo"] . "' and nome_projeto = '" . $_POST["nome"] . "' and status = 'Aprovado'");
            $res = mysqli_query($db, $query);
            if ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>                                    
                                        <td><a href='dados_consulta_restricao.php?busca=" . $consulta['codigo_projeto'] . "'>" . $consulta['codigo_projeto'] .  " </a></td>
                                        <td>" . $consulta['nome_projeto'] . "</td>                                          
                                        </tr>";
            }
            echo" </table></div>";
            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        }
        if ((!empty($_POST["codigo"])) && (empty($_POST["nome"]))) {
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200' >Codigo do Projeto</th>
                                    <th width='200'>Nome</th>
                                    </tr> ";
            $query = ("select codigo_projeto, nome_projeto, id_categoria, status, valor_projeto from projeto where codigo_projeto = '" . $_POST["codigo"] . "'  and status = 'Aprovado'");
            $res = mysqli_query($db, $query);
            if ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>                                    
                                        <td><a href='dados_consulta_restricao.php?busca=" . $consulta['codigo_projeto'] . "'>" . $consulta['codigo_projeto'] . "</a></td>
                                        <td>" . $consulta['nome_projeto'] . "</td>                                          
                                        </tr>";
            }
            echo" </table></div>";
            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        }
        if ((empty($_POST["codigo"])) && (!empty($_POST["nome"]))) {
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200' >Codigo do Projeto</th>
                                    <th width='200'>Nome</th>
                                    </tr> ";
            $query = ("select codigo_projeto, nome_projeto, id_categoria, status, valor_projeto from projeto where nome_projeto = '" . $_POST["nome"] . "'  and status = 'Aprovado'");
            $res = mysqli_query($db, $query);
            if ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>                                    
                                        <td><a href='dados_consulta_restricao.php?busca=" . $consulta['codigo_projeto'] . "'>" . $consulta['codigo_projeto'] . " </a></td>
                                        <td>" . $consulta['nome_projeto'] . "</td>                                          
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


