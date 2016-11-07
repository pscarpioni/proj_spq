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
                                    <th>Dados do Critério de Avaliação</th>
                                    </tr>";

        $busca = $_GET["busca"];
        $query = ("select * from criterio_avaliacao where id_criterio = '" . $busca . "'");
        $res = mysqli_query($db, $query);
        while ($consulta = mysqli_fetch_array($res)) {
            echo" <tr><td><br><b> Código do Critério: </b>" . $consulta['id_criterio'] . "<br>
                                <b> Categoria: </b>" . $busca . "<br>"
            . " <b> Criterio: </b>" . $consulta['criterio_avaliacao'] . "<br>"
            . "<b> Status: </b>" . $consulta['status_criterio'] . "<br>"
            . "<b> Peso: </b>" . $consulta['peso_criterio'] . "<br><br></td></tr><br>";
        }
        echo"</table></div>";
        echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>


