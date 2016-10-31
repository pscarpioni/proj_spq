<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["desativar"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");
        $query = ("select * from criterio_avaliacao where criterio_avaliacao ='" . $_POST['criterio'] . "'");
        $res = mysqli_query($db, $query);
        echo "
                                    <table> <tr height='50'>
                                    <th width='200' >Categoria do Projeto</th>
                                    <th width='200'>Criterio de Avaliação</th>
                                    </tr> ";
        while ($consulta = mysqli_fetch_array($res)) {
            $query2 = ("select categoria_projeto from categoria where id_categoria ='" . $consulta['id_categoria'] . "'");
            $res2 = mysqli_query($db, $query2);
            $consulta2 = mysqli_fetch_array($res2);
            echo"<tr height='50'>
                                        <td><a href='desativaCriteriosAvaliacao.php?busca=" . $consulta2['categoria_projeto'] . "'>" . $consulta2['categoria_projeto'] . "</a></td>
                                        <td>" . $consulta['criterio_avaliacao'] . "</td>                                    
                                        </tr>";
        }
        echo" </table></div>";
        echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
        mysqli_close($db);
    }
    ?>
</div> 
</body>
</html>

