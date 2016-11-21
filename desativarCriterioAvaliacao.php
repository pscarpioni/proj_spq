<?php include("cabecalho_funcionalidade.php"); ?>

<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["desativar"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");
        $query = ("select * from criterio_avaliacao where criterio_avaliacao ='" . $_POST['criterio'] . "' and status_criterio ='Ativado'");
        $res = mysqli_query($db, $query);
        echo "<div class='panel panel-default'>
            
                                    <table class='table'> <tr>
                                    <th width='200' >Categoria do Projeto</th>
                                    <th width='200'>Critério de Avaliação</th>
                                    </tr> ";
        $cont = 0;
        while ($consulta = mysqli_fetch_array($res)) {
            $cont = 1;
            $query2 = ("select categoria_projeto from categoria where id_categoria ='" . $consulta['id_categoria'] . "'");
            $res2 = mysqli_query($db, $query2);
            $consulta2 = mysqli_fetch_array($res2);
            echo"<tr height='50'>
                                        <td>" . $consulta2['categoria_projeto'] . "</td> 
                                        <td><a href='desativaCriteriosAvaliacao.php?busca=" . $consulta['id_criterio'] . "'>" . $_POST['criterio'] . "</a></td>
                             
                                        </tr>";
        }
        echo" </table></div>";
        echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
        if ($cont == 0) {
            echo "<script>alert('Critério não encontrado!'); window.location.href='desativarCriterioConsultar.php' </script>";
        }
        mysqli_close($db);
    }
    ?>
</div> 
</body>
</html>

