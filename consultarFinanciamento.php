<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["consultar"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        echo "<h3>Projetos Financiados: </h3><br>"; 
        if ((!empty($_POST["nome"]))) {
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200' ><p align='center'>Código do Projeto</p></th>
                                    <th width='200'><p align='center'>Nome</p></th>
                                    <th width='200'><p align='center'>Valor Financiado</p></th>
                                    </tr> ";
            $query = ("select projeto.codigo_projeto, projeto.nome_projeto, projeto.id_categoria, projeto.status, financiamento.valor,financiamento.id_financ from projeto inner join
			financiamento on financiamento.codigo_projeto = projeto.codigo_projeto and projeto.nome_projeto = '" . $_POST["nome"] . "' and "
                    . "projeto.status = 'Aprovado' and financiamento.codigo_usuario = '" . $_SESSION["codigo"] . "'");
            $res = mysqli_query($db, $query);
            while ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>                                    
                        <td><p align='center'>" . $consulta['codigo_projeto'] . "</p></td>                                        
                       <td><p align='center'><a href='dados_consulta_financiamento.php?busca=" . $consulta['id_financ'] . "'>" . $consulta['nome_projeto'] . "</p></a></td>
                                                  
                             <td><p align='center'>" . $consulta['valor'] . "</p></td>            
                                        </tr>";
            }
            echo" </table></div>";
            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        }
        if ((empty($_POST["nome"]))) {
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200' ><p align='center'>Código do Projeto</p></th>
                                    <th width='200'><p align='center'>Nome</p></th>
                                     <th width='200'><p align='center'>Valor Financiado</p></th>
                                    </tr> ";
            $query = ("select projeto.codigo_projeto, projeto.nome_projeto, projeto.id_categoria, projeto.status, financiamento.valor,financiamento.id_financ from projeto inner join
			financiamento on financiamento.codigo_projeto = projeto.codigo_projeto and projeto.status = 'Aprovado' and financiamento.codigo_usuario = '" . $_SESSION["codigo"] . "'");
			
            $res = mysqli_query($db, $query);
            while ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>                                    
                        <td><p align='center'>" . $consulta['codigo_projeto'] . "</p></td>                                         
                       <td><p align='center'><a href='dados_consulta_financiamento.php?busca=" . $consulta['id_financ'] . "'>" . $consulta['nome_projeto'] . "</a></p></td>         
                                        <td><p align='center'>" . $consulta['valor'] . "</p></td>  
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