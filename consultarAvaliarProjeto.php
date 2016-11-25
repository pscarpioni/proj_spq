<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["consultar"])) {

        $nome = $_POST["nome"];

        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        $q1 = ("select id_categoria, codigo_projeto from projeto where nome_projeto = '" . $nome . "'");
        $res1 = mysqli_query($db, $q1) or die("Erro :" . mysqli_error($db));

        if (!($consulta = mysqli_fetch_array($res1))) {
            echo "<script>alert('Este projeto não está cadastrado no sistema.'); window.location.href='consultaAvaliaProjeto.php' </script>";
        }

        $res1 = mysqli_query($db, $q1) or die("Erro :" . mysqli_error($db));

        while ($consulta = mysqli_fetch_array($res1)) {
            $query = ("select criterio_avaliacao.criterio_avaliacao, avaliacao_possui_criterio.nota from criterio_avaliacao inner join"
                    . " avaliacao_possui_criterio on criterio_avaliacao.id_criterio = avaliacao_possui_criterio.id_criterio and "
                    . " avaliacao_possui_criterio.codigo_projeto = '" . $consulta['codigo_projeto'] . "'");
        }

        echo "<div class='text-center'><h4><ins> Consulta das notas da avaliação do projeto " . $nome . " </ins></h4></div><br>";

        echo "<div class = 'panel panel-default'>
            <table class = 'table'> <tr>
            <th width = '200' >Critério de Avaliação</th>
            <th width = '200'>Nota</th>
            </tr> ";

        $res = mysqli_query($db, $query) or die("Erro :" . mysqli_error($db));
        $cont = 0;
        while ($consulta = mysqli_fetch_array($res)) {
            $cont = 1;
            echo"<tr height = '50'>
                    <td>" . $consulta['criterio_avaliacao'] . "</a></td>
                    <td>" . $consulta['nota'] . "</td>
                </tr>";
        }
        if ($cont == 1) {
            while ($consulta = mysqli_fetch_array($res1)) {
                $query = ("select sum(avaliacao_possui_criterio.nota) as nota from avaliacao_possui_criterio inner join "
                        . "criterio_avaliacao on criterio_avaliacao.id_criterio = avaliacao_possui_criterio.id_criterio and "
                        . " avaliacao_possui_criterio.codigo_projeto = '" . $consulta['codigo_projeto'] . "'");
            }
            $res = mysqli_query($db, $query);

            $somatorio = 0;
            $i = 0;
            $soma_pesos = 0;
            while ($consulta = mysqli_fetch_array($res)) {
                  $somatorio = $somatorio + $consulta['nota'];               
                $i++;
            }
            
            $q1 = ("select id_categoria, codigo_projeto from projeto where nome_projeto = '" . $nome . "'");
            $res1 = mysqli_query($db, $q1) or die("Erro :" . mysqli_error($db));
            $consulta = mysqli_fetch_array($res1);
            
            $result = "SELECT peso_criterio FROM criterio_avaliacao where id_categoria='" .  $consulta['id_categoria'] . "'";
            $sql = mysqli_query($db, $result);
            while ($exibe = mysqli_fetch_array($sql)) {
                   $soma_pesos = $exibe['peso_criterio'] + $soma_pesos;
            }
            
            $somatorio = ($somatorio / $soma_pesos);
            echo "<th width = '200' >Média final</th>
                    <th width = '200'>" . $somatorio . "</th>";

            echo" </table></div>";
            echo "<p align = 'center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
            mysqli_close($db);
            return 0;
        } else {
            echo "<script>alert('Este projeto ainda não foi avaliado'); window.location.href='consultaAvaliaProjeto.php' </script>";
        }
        echo" </table></div>";
        echo "<p align = 'center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>

