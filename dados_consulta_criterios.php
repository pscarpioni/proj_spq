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
                                    <th>Dados do Critério de Avaliação:</th>
                                    </tr>  </table></div>";

        $busca = $_GET["busca"];
        $query = ("select id_categoria from categoria where categoria_projeto = '" . $busca . "'");
        $res = mysqli_query($db, $query);
        $consulta = mysqli_fetch_array($res);
        $query = ("select * from criterio_avaliacao where id_categoria = '" . $consulta['id_categoria'] . "'");
        $res = mysqli_query($db, $query);
        while ($consulta = mysqli_fetch_array($res)) {
            echo"<b> Código do Critério: </b>" . $consulta['id_criterio'] . "<br>
                                <b> Categoria: </b>" . $busca . "<br>"
            . " <b> Criterio: </b>" . $consulta['criterio_avaliacao'] . "<br>"
            . "<b> Status: </b>" . $consulta['status_criterio'] . "<br>"
            . "<b> Peso: </b>" . $consulta['peso_criterio'] . "<br>";
        }
        echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>


