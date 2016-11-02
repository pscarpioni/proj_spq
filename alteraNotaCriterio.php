<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["consultar"])) {

        $codigo = $_POST["codigo"];
        $nome = $_POST["nome"];
        $categoria = $_POST["categoria"];

        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        if ((!empty($codigo)) && (!empty($nome)) && (!empty($categoria))) {
            echo "<form action='RespAlterarCriterio.php' method='POST' id='form' name='frm'>";
            echo "<h2> Alterar notas da avaliação do projeto </h2>";
            echo "<h3>Projeto:  " . $nome . "</h3>";

            echo "<div class = 'panel panel-default'>
            <table class = 'table'> <tr>
            <th width = '200' >Critérios de Avaliação</th>
            <th width = '200'>Nota</th>
            </tr> ";
            $query = ("select criterio_avaliacao.criterio_avaliacao, avaliacao_possui_criterio.nota from criterio_avaliacao inner join avaliacao_possui_criterio on criterio_avaliacao.id_criterio = avaliacao_possui_criterio.id_criterio and avaliacao_possui_criterio.id_categoria = '$categoria'");
            $res = mysqli_query($db, $query);

            while ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height = '50'>
                <td>" . $consulta['criterio_avaliacao'] . "</td>
                <td> <input type='text' name='nota' value=" . $consulta['nota'] . "></td>
                </tr>";
            }

            echo" </table></div>";
            echo"<div class='row'>
                            <div class='col-sm-12'>
                                <div class='text-center'><input type='submit' name='alterar' class='btn btn-primary btn-lg' value='Salvar'></div></div></div></form><br><br>";
            echo "<p align = 'center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        } else {
            echo "<p> Este critério de avaliação não exite!!</p>";
        }
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>

