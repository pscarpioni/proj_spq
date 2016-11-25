<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["consultar"])) {

        $codigo = $_POST["codigo"];
        $nome = $_POST["nome"];

        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        $query = ("select id_categoria, codigo_projeto from projeto where nome_projeto='" . $nome . "'");
        $res = mysqli_query($db, $query);
        $query1 = ("select id_categoria from usuario where codigo_usuario='" . $codigo . "'");
        $res1 = mysqli_query($db, $query1);
        if (!mysqli_fetch_array($res)) {
            echo "<script>alert('O projeto fornecido não está cadastrado! Verifique se os dados digitados estão corretos.'); window.location.href='alterarNotaCriterio.php' </script>";
        } else {
            if (!mysqli_fetch_array($res1)) {
                echo "<script>alert('O usuário fornecido não está cadastrado! Verifique se os dados digitados estão corretos.'); window.location.href='alterarNotaCriterio.php' </script>";
                mysqli_close($db);
                return 0;
            } else {
                $res = mysqli_query($db, $query);
                $res1 = mysqli_query($db, $query1);
                while ($consulta = mysqli_fetch_array($res)) {
                    $id1 = $consulta["id_categoria"];
                    $codigo = $consulta["codigo_projeto"];
                }
                while ($consulta = mysqli_fetch_array($res1)) {
                    $id2 = $consulta["id_categoria"];
                }
                if ($id1 != $id2)
                    echo "<script>alert('Este avaliador não pode avaliar esta categoria de projeto!'); window.location.href='alterarNotaCriterio.php' </script>";
                else {
                    echo "<form action='alteraNotaCriterio.php' method='POST' id='form' name='frm'>";
                    echo "<h3><ins>Projeto:  " . $nome . "</ins></h3>";

                    echo "<div class = 'panel panel-default'>
                        <table class = 'table'> <tr>
                        <th width = '200' >Critérios de Avaliação</th>
                        <th width = '200'>Nota com peso</th>
                        <th width = '200'>Nota dada</th>
                        </tr> ";
                    $query = ("select criterio_avaliacao.criterio_avaliacao, criterio_avaliacao.peso_criterio, avaliacao_possui_criterio.nota from criterio_avaliacao inner join"
                            . " avaliacao_possui_criterio on criterio_avaliacao.id_criterio = avaliacao_possui_criterio.id_criterio and "
                            . " avaliacao_possui_criterio.codigo_projeto = '" . $codigo . "'");

                    $res = mysqli_query($db, $query);
                    $i = 0;
                    while ($consulta = mysqli_fetch_array($res)) {
                        echo"<tr height = '50'>
                        <td>" . $consulta['criterio_avaliacao'] . "</td>"
                        . "<td>" . $consulta['nota'] . "</td>";
                        $total=$consulta['nota']/$consulta['peso_criterio']; 
                        ?>
                        <td><input type="number" name="nota<?php echo $i; ?>" value="<?php echo $total; ?>" min="0" max="10"/></td> 

                        <?php
                        echo"</tr>";
                        $i++;
                    }
                    echo"<input type='hidden' name='cont' value='$i'/>
             <input type='hidden' name='categoria' value='$id1'/>
                 <input type='hidden' name='cod_proj' value='$codigo'/></table></div>";
                    echo"<div class='row'>
                            <div class='col-sm-12'>
                                <div class='text-center'><input type='submit' name='alterar' class='btn btn-primary btn-lg' value='Salvar'></div></div></div></form><br><br>";
                    echo "<p align = 'center'><a href = 'alterarNotaCriterio.php'>Voltar</a><p/>";
                }
            }
        }
    }
    if (isset($_POST["alterar"])) {
        $cont = $_POST["cont"];
        $categoria = $_POST["categoria"];
        $cod_proj = $_POST["cod_proj"];

        $i = 0;
        while ($i < $cont) {
            $value[$i] = $_POST["nota" . $i];
            $i++;
        }

        $db = mysqli_connect("localhost", "root");
        mysqli_select_db($db, "spq");

        $i = 0;
        $soma_pesos = 0;
        $result = "SELECT criterio_avaliacao, peso_criterio, id_criterio FROM criterio_avaliacao where id_categoria='" . $categoria . "'";
        $sql = mysqli_query($db, $result);
        while ($exibe = mysqli_fetch_array($sql)) {
            $nota_final = $value[$i] * $exibe["peso_criterio"];
            $soma_pesos=$exibe["peso_criterio"]+$soma_pesos;
            $notas[$i] = $nota_final;
            $sql1 = "update avaliacao_possui_criterio set nota='" . $notas[$i] . "' WHERE id_criterio='" . $exibe["id_criterio"] . "'";
             mysqli_query($db, $sql1); /* executa a query */
            $i++;
        }

        $result = "SELECT * FROM criterio_avaliacao where id_categoria='" . $categoria . "'";
        $sql = mysqli_query($db, $result);
        $i = 0;
        $somatorio = 0;
        while ($exibe = mysqli_fetch_array($sql)) {
            $somatorio = $notas[$i];
            $i++;
        }
        $somatorio = ($somatorio / $soma_pesos);
        $result = "SELECT nome_projeto FROM projeto where codigo_projeto='" . $cod_proj . "'";
        $sql1 = mysqli_query($db, $result);
        if ($somatorio >= 6) { //aprova ou reprova projeto
            $sql = "update projeto set status='Aprovado' WHERE codigo_projeto='" . $cod_proj . "'";
            $res = mysqli_query($db, $sql)or die("Erro ao atualizar" . mysqli_error($db));
        } else {
            $sql = "update projeto set status='Reprovado' WHERE codigo_projeto='" . $cod_proj . "'";
            $res = mysqli_query($db, $sql)or die("Erro ao atualizar" . mysqli_error($db));
        }

        mysqli_close($db);
        echo"<h3>Avaliação alterada com sucesso.</h3> \n";
    }
    ?>
</div> 
</body>
</html>

