<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home"> 
    <?php
    if (isset($_POST["aval"])) {
        $codigo = $_POST["codigo_projeto"];
        $codaval = $_POST["codigo_avaliador"];
        $categoria = $_POST["categoria"];
        $id_avaliacao = $_POST["id_avaliacao"];

        $db = mysqli_connect("localhost", "root");
        mysqli_select_db($db, "spq");

        echo "<div class='panel panel-default'>
         <tr><form method='POST' action='fichaAvaliacao.php'>";
        echo "<table class='table'> <tr>
                                    <th>Critérios</th>
                                    <th>Notas</th>
                                    </tr> ";
        $result = "SELECT criterio_avaliacao, peso_criterio FROM criterio_avaliacao where id_categoria='" . $categoria . "'";
        $res = mysqli_query($db, $result);
        $i = 0;
        while ($consulta = mysqli_fetch_array($res)) {
            echo"<tr>
             <td><b>" . $consulta["criterio_avaliacao"] . "</b></td>";
            ?>
            <td><input type="number" name="nota<?php echo"$i"; ?>"value="0" min="0" max="10"/></td>                                   
            <?php
            echo"</tr>";
            $i++;
        }
        echo" </table> <input type='hidden' name='cont' value='$i'/>
             <input type='hidden' name='categoria' value='$categoria'/>
                 <input type='hidden' name='id_avaliacao' value='$id_avaliacao'/>
                     <input type='hidden' name='codaval' value='$codaval'/>
                 <input type='hidden' name='cod_proj' value='$codigo'/>";
        echo "<br><br> &nbsp &nbsp <b>Sugestão:</b> <textarea name='sugestao' rows='5' cols='50' maxlength='400'/></textarea><br><br><br>";
        echo "<div class='text-center'><input type='submit' class='btn btn-primary btn-lg' name='nota' value='Salvar'/></div>";
        echo "</form> ";
        ?> 

        <?php
    }
    if (isset($_POST["nota"])) {
        $cont = $_POST["cont"];
        $categoria = $_POST["categoria"];
        $id_avaliacao = $_POST["id_avaliacao"];
        $codaval = $_POST["codaval"];
        $cod_proj = $_POST["cod_proj"];

        $i = 0;
        while ($i < $cont) {
            $value[$i] = $_POST["nota" . $i];
            $i++;
        }

        $db = mysqli_connect("localhost", "root");
        mysqli_select_db($db, "spq");

        $i = 0;
        $result = "SELECT criterio_avaliacao, peso_criterio FROM criterio_avaliacao where id_categoria='" . $categoria . "'";
        $sql = mysqli_query($db, $result);
        while ($exibe = mysqli_fetch_array($sql)) {
            $nota_final = $value[$i] * $exibe["peso_criterio"];
            $notas[$i] = $nota_final;
            $i++;
        }

        $sugestao = $_POST["sugestao"];
        $sql = "update avaliacao set sugestao='" . $sugestao . "' WHERE id_avaliacao='" . $id_avaliacao . "'";
        $res = mysqli_query($db, $sql)or die("Erro ao atualizar" . mysqli_error($db));

        $result = "SELECT * FROM criterio_avaliacao where id_categoria='" . $categoria . "'";
        $sql = mysqli_query($db, $result);
        $i = 0;
        $somatorio = 0;
        while ($exibe = mysqli_fetch_array($sql)) {
            $sql1 = "INSERT INTO avaliacao_possui_criterio(id_avaliacao, codigo_projeto, codigo_usuario, "
                    . "id_categoria, id_criterio, nota) VALUES('" . $id_avaliacao . "','" . $cod_proj . "','" . $codaval . "',"
                    . "'" . $categoria . "','" . $exibe["id_criterio"] . "','" . $notas[$i] . "')";
            mysqli_query($db, $sql1); /* executa a query */
            $somatorio = $notas[$i];
            $i++;
        }
        $somatorio = ($somatorio / $i);
        $result = "SELECT nome_projeto FROM projeto where codigo_projeto='" . $cod_proj . "'";
        $sql1 = mysqli_query($db, $result);
        if ($somatorio >= 6) { //aprova ou reprova projeto
            $sql = "update projeto set status='Aprovado' WHERE codigo_projeto='" . $cod_proj . "'";
            $res = mysqli_query($db, $sql)or die("Erro ao atualizar" . mysqli_error($db));
            //$texto = "O projeto '" . $sql1['nome_projeto'] . "' de código igual a '" . $cod_proj . "' foi aprovado! <br> "
             //       . "Sua nota foi: '" . $somatorio . "' pontos.";
        } else {
            $sql = "update projeto set status='Reprovado' WHERE codigo_projeto='" . $cod_proj . "'";
            $res = mysqli_query($db, $sql)or die("Erro ao atualizar" . mysqli_error($db));
            //$texto = "O projeto '" . $sql['nome_projeto'] . "' de código igual a '" . $cod_proj . "' foi reprovado! <br> "
             //       . "Sua nota foi: '" . $somatorio . "' pontos.";
        }
        
        mysqli_close($db);
        echo"<h3>Avaliação cadastrada com sucesso.</h3> \n";
    }
    ?>
</div> 
</body>
</html>