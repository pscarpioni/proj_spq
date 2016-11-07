<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["consultar"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        if (($_POST["categoria"] == " ") && (empty($_POST["criterio"]))) {
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200' >Categoria do Projeto</th>
                                    <th width='200'>Criterio de Avaliação</th>
                                    </tr> ";
            $query = ("select categoria.categoria_projeto, criterio_avaliacao.criterio_avaliacao, criterio_avaliacao.id_criterio from criterio_avaliacao inner join  categoria on criterio_avaliacao.id_categoria = categoria.id_categoria");

            $res = mysqli_query($db, $query);

            while ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>
                                        <td>" . $consulta['categoria_projeto'] . "</td> 
                                        <td><a href='dados_consulta_criterios.php?busca=" . $consulta['id_criterio'] . "'>" . $consulta['criterio_avaliacao'] . "</a></td>
                                         </tr>";
            }
            echo" </table></div>";
            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        }
        if (($_POST["categoria"] != " ") && (!empty($_POST["criterio"]))) {


            $query = ("select id_categoria from categoria where categoria_projeto = '" . $_POST["categoria"] . "'");
            $res = mysqli_query($db, $query);
            $consulta = mysqli_fetch_array($res);
            $query = ("select criterio_avaliacao,id_criterio from criterio_avaliacao where id_categoria = '" . $consulta['id_categoria'] . "' and criterio_avaliacao = '" . $_POST["criterio"] . "'");
            $res = mysqli_query($db, $query);

            if ($consulta = mysqli_fetch_array($res)) {
                echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200' >Categoria do Projeto</th>
                                    <th width='200'>Criterio de Avaliação</th>
                                    </tr> ";
                echo"<tr height='50'>
                                       <td>" . $_POST['categoria'] . "</td> 
                                       <td><a href='dados_consulta_criterios.php?busca=" . $consulta['id_criterio'] . "'>" . $consulta['criterio_avaliacao'] . "</a></td>
                                       </tr>";
            } else {
                echo "<p> Este critério de avaliação não pertence a essa categoria!!</p>";
            }
            echo" </table></div>";
            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        }
        if (($_POST["categoria"] == " ") && (!empty($_POST["criterio"]))) {
            $query = ("select id_categoria from criterio_avaliacao where criterio_avaliacao = '" . $_POST["criterio"] . "'");
            $res = mysqli_query($db, $query);
            $consulta1 = mysqli_fetch_array($res);
             $query = ("select categoria.categoria_projeto, criterio_avaliacao.criterio_avaliacao, criterio_avaliacao.id_criterio from criterio_avaliacao "
                     . "inner join  categoria on criterio_avaliacao.id_categoria = categoria.id_categoria and "
                     . "categoria.id_categoria = '" . $consulta1['id_categoria'] . "' and criterio_avaliacao.criterio_avaliacao='" . $_POST['criterio'] . "' ");
            $res = mysqli_query($db, $query);

            if ($consulta = mysqli_fetch_array($res)) {
                echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th width='200' >Categoria do Projeto</th>
                                    <th width='200'>Criterio de Avaliação</th>
                                    </tr> ";
                echo"<tr height='50'>
                                       <td>" . $consulta['categoria_projeto'] . "</td> 
                                        <td><a href='dados_consulta_criterios.php?busca=" . $consulta['id_criterio'] . "'>" . $_POST['criterio'] . "</a></td>
                                         </tr>";
            } else {
                echo "<p> Este critério de avaliação não exite!!</p>";
            }
            echo" </table></div>";
            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        }
        if (($_POST["categoria"] != " ") && (empty($_POST["criterio"]))) {
            $query = ("select id_categoria from categoria where categoria_projeto = '" . $_POST["categoria"] . "'");
            $res = mysqli_query($db, $query);
            $consulta1 = mysqli_fetch_array($res);
            $query = ("select categoria.categoria_projeto,criterio_avaliacao.id_criterio,criterio_avaliacao.criterio_avaliacao from criterio_avaliacao inner join  categoria on criterio_avaliacao.id_categoria = categoria.id_categoria and categoria.id_categoria = '" . $consulta1['id_categoria'] . "'");
            $res = mysqli_query($db, $query);
            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                  <th width='200'>Criterios de Avaliação de " . $_POST["categoria"] . "</th>
                                    </tr> ";

            while ($consulta = mysqli_fetch_array($res)) {

                echo"<tr height='50'>
                                        <td><a href='dados_consulta_criterios.php?busca=" . $consulta['id_criterio'] . "'>" . $consulta['criterio_avaliacao'] . "</a></td>
                                                                     
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

