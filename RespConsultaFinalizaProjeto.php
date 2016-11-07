<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["consultar"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        if (empty($_POST["valor"])) {
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    </tr> ";
            $query = ("select * from projeto where status='Aprovado' ORDER BY projeto.codigo_projeto ASC");
            $res = mysqli_query($db, $query);
            if (mysqli_fetch_array($res)) {
                $res = mysqli_query($db, $query);
                while ($consulta = mysqli_fetch_array($res)) {
                    echo"<tr>
                                        <td><a href='dados_finaliza_altera.php?busca=" . $consulta['codigo_projeto'] . "'>" . $consulta['codigo_projeto'] . "</a></td>
                                        <td>" . $consulta['nome_projeto'] . "</td>                                    
                                        </tr>";
                }
                echo"</td></tr><br></table></div>";
                echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
                mysqli_close($db);
            } else
                echo "<script>alert('Não há projetos aprovados.'); window.location.href='consultaAprovado.php' </script>";
            return 0;
        }

        $valor = $_POST["valor"];

        if ($_POST["radio"] == "nome") {
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th>Dados do Projeto</th>
                                    </tr>";
            $query = ("select * from projeto where nome_projeto='" . $valor . "' and status='Aprovado'");
            $res = mysqli_query($db, $query);
            if (mysqli_fetch_array($res)) {
                $res = mysqli_query($db, $query);
                while ($consulta = mysqli_fetch_array($res)) {
                    echo"<tr><td><br><b> Código: </b>" . $consulta['codigo_projeto'] . "<br>
                                <b> Nome: </b>" . $consulta['nome_projeto'] . "<br>"
                    . " <b> Duração do projeto(em meses): </b>" . $consulta['duracao_projeto'] . "<br>"
                    . "<b> Valor do projeto: </b>R$" . $consulta['valor_projeto'] . "<br>"
                    . "<b> Status: </b>" . $consulta['status'] . "<br>"
                    . "<b> Categoria: </b>" . $consulta['id_categoria'] . "<br>"
                    . "<b> Descrição: </b>" . $consulta['descricao'] . "<br>"
                    . "<b> Link: </b>" . $consulta['link'] . "<br><br>"
                    . "<b> Imagem: </b><br><br><center><img src='upload/" . $consulta["imagem"] . "' width='800' height='500'></center>";
                    $cod = $consulta['codigo_projeto'];
                }
                echo"</td></tr><br></table></div>";
                echo "<form action='finalizaProjeto.php' method='POST'>";
                echo"<center><input type='submit' name='finalizar' class='btn btn-primary btn-lg' value='Finalizar Projeto'></center>";
                echo"<input type='hidden' name='codigo' value='$cod'/><br><br>";
                echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
                echo "</form>";
                mysqli_close($db);
            } else
                echo "<script>alert('Esse projeto não está cadastrado ou não foi aprovado.'); window.location.href='consultaAprovado.php' </script>";
            return 0;
        }
        if ($_POST["radio"] == "codigo") {
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th>Dados do Projeto</th>
                                    </tr>";
            $query = ("select * from projeto where codigo_projeto='" . $valor . "' and status='Aprovado'");
            $res = mysqli_query($db, $query);
            if (mysqli_fetch_array($res)) {
                $res = mysqli_query($db, $query);
                while ($consulta = mysqli_fetch_array($res)) {
                    echo"<tr><td><br><b> Código: </b>" . $consulta['codigo_projeto'] . "<br>
                                <b> Nome: </b>" . $consulta['nome_projeto'] . "<br>"
                    . " <b> Duração do projeto(em meses): </b>" . $consulta['duracao_projeto'] . "<br>"
                    . "<b> Valor do projeto: </b>R$" . $consulta['valor_projeto'] . "<br>"
                    . "<b> Status: </b>" . $consulta['status'] . "<br>"
                    . "<b> Categoria: </b>" . $consulta['id_categoria'] . "<br>"
                    . "<b> Descrição: </b>" . $consulta['descricao'] . "<br>"
                    . "<b> Link: </b>" . $consulta['link'] . "<br><br>"
                    . "<b> Imagem: </b><br><br><center><img src='upload/" . $consulta["imagem"] . "' width='800' height='500'></center>";

                    $cod = $consulta['codigo_projeto'];
                }
                echo"</td></tr><br></table></div>";
                echo "<form action='finalizaProjeto.php' method='POST'>";
                echo"<center><input type='submit' name='finalizar' class='btn btn-primary btn-lg' value='Finalizar Projeto'></center>";
                echo"<input type='hidden' name='codigo' value='$cod'/><br><br>";
                echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
                echo "</form>";
                mysqli_close($db);
            } else
                echo "<script>alert('Esse projeto não está cadastrado ou não foi aprovado.'); window.location.href='consultaAprovado.php' </script>";
            return 0;
        }
    }
    ?>
</div> 
</body>
</html>