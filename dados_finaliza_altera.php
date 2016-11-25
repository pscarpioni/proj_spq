<?php include("cabecalho_funcionalidade.php"); ?>	
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_GET["busca"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th>Dados do Projeto</th>
                                    </tr>";

        $busca = $_GET["busca"];
        $query = ("select * from projeto where codigo_projeto='" . $busca . "' and status='Aprovado'");
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
        }
        echo"</td></tr><br></table></div>";
        echo "<form action='finalizaProjeto.php' method='POST'>";
        echo"<center><input type='submit' name='finalizar' class='btn btn-primary btn-lg' value='Finalizar Projeto'></center>";
        echo"<input type='hidden' name='codigo' value='$busca'/><br><br>";
        echo "<p align='center'><a href = 'consultaFinalizaProjeto.php'>Voltar</a><p/>";
        echo "</form>";
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>