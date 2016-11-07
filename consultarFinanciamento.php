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
            $query = ("select * from financiamento where codigo_usuario = '1' ");
			
            $res = mysqli_query($db, $query);
            while ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>                                    
                                        <td><a href='dados_consulta_restricao.php?busca=" . $consulta['codigo_projeto'] . "'>" . $consulta['id_categoria'] . "</a></td>
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
            $query = ("select projeto.codigo_projeto, projeto.nome_projeto, projeto.id_categoria, projeto.status, financiamento.id_financ from projeto inner join
			financiamento on financiamento.codigo_projeto = projeto.codigo_projeto and projeto.codigo_projeto = '" . $_POST["codigo"] . "' and projeto.nome_projeto = '" . $_POST["nome"] . "' and projeto.status = 'Aprovado'");
            $res = mysqli_query($db, $query);
            if ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>                                    
                                        <td><a href='dados_consulta_restricao.php?busca=" . $consulta['codigo_projeto'] . "'>" . $consulta['id_categoria'] . "</a></td>
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
            $query = ("select projeto.codigo_projeto, projeto.nome_projeto, projeto.id_categoria, projeto.status, financiamento.id_financ from projeto inner join
			financiamento on financiamento.codigo_projeto = projeto.codigo_projeto and projeto.codigo_projeto = '" . $_POST["codigo"] . "' and projeto.status = 'Aprovado'");
			
            $res = mysqli_query($db, $query);
            if ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>                                    
                                        <td><a href='dados_consulta_restricao.php?busca=" . $consulta['codigo_projeto'] . "'>" . $consulta['id_categoria'] . "</a></td>
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
            $query = ("select projeto.codigo_projeto, projeto.nome_projeto, projeto.id_categoria, projeto.status, financiamento.id_financ from projeto inner join
			financiamento on financiamento.codigo_projeto = projeto.codigo_projeto and projeto.nome_projeto = '" . $_POST["nome"] . "' and projeto.status = 'Aprovado'");
           
			$res = mysqli_query($db, $query);
            if ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>                                    
                                        <td><a href='dados_consulta_restricao.php?busca=" . $consulta['codigo_projeto'] . "'>" . $consulta['id_categoria'] . "</a></td>
                                        <td>" . $consulta['nome_projeto'] . "</td>
                                        
                                        </tr>";
            }
            echo" </table></div>";
            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            echo "<p align='center'><a href = 'dados_consulta_restricao'>Cadastrar</a><p/>";
            mysqli_close($db);
            return 0;
        }
    }
    ?>
</div> 
</body>
</html>