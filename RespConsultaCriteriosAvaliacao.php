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
            echo "
                                    <table> <tr height='50'>
                                    <th width='200' >Categoria do Projeto</th>
                                    <th width='200'>Criterio de Avaliação</th>
                                    </tr> ";
            $query = ("select categoria.categoria_projeto, criterio_avaliacao.criterio_avaliacao from criterio_avaliacao inner join  categoria on criterio_avaliacao.id_categoria = categoria.id_categoria");

            $res = mysqli_query($db, $query);

            while ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>
                                        <td><a href='dados_consulta_criterios.php?busca=" . $consulta['categoria_projeto'] . "'>" . $consulta['categoria_projeto'] . "</a></td>
                                        <td>" . $consulta['criterio_avaliacao'] . "</td>                                    
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
            $query = ("select criterio_avaliacao from criterio_avaliacao where id_categoria = '" . $consulta['id_categoria'] . "' and criterio_avaliacao = '" . $_POST["criterio"] . "'");
            $res = mysqli_query($db, $query);

            if ($consulta = mysqli_fetch_array($res)) {
                echo "
                                    <table> <tr height='50'>
                                    <th width='200' >Categoria do Projeto</th>
                                    <th width='200'>Criterio de Avaliação</th>
                                    </tr> ";
                echo"<tr height='50'>
                                        <td><a href='dados_consulta_criterios.php?busca=" . $_POST["categoria"] . "'>" . $_POST["categoria"] . "</a></td>
                                        <td>" . $consulta['criterio_avaliacao'] . "</td>                                    
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
            $query = ("select categoria_projeto from categoria where id_categoria = '" . $consulta1['id_categoria'] . "'");
            $res = mysqli_query($db, $query);

            if ($consulta = mysqli_fetch_array($res)) {
                echo "
                                    <table> <tr height='50'>
                                    <th width='200' >Categoria do Projeto</th>
                                    <th width='200'>Criterio de Avaliação</th>
                                    </tr> ";
                echo"<tr height='50'>
                                        <td><a href='dados_consulta_criterios.php?busca=" . $consulta["categoria_projeto"] . "'>" . $consulta["categoria_projeto"] . "</a></td>
                                        <td>" . $_POST["criterio"] . "</td>                                    
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
            $query = ("select criterio_avaliacao from criterio_avaliacao where id_categoria = '" . $consulta1['id_categoria'] . "'");
            $res = mysqli_query($db, $query);

            if ($consulta = mysqli_fetch_array($res)) {
                echo "
                                    <table> <tr height='50'>  " . $_POST["categoria"] . "
                                  <th width='200'>Criterio de Avaliação</th>
                                    </tr> ";
                echo"<tr height='50'>
                                        <td><a href='dados_consulta_criterios.php?busca=" . $consulta["criterio_avaliacao"] . "'>" . $consulta["criterio_avaliacao"] . "</a></td>
                                                                     
                                        </tr>";
            } else {
                echo "<p> Este critério de avaliação não exite!!</p>";
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

