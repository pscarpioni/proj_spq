<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["consultar"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        $valor = $_POST["valor"];

        echo "<div class='panel panel-default'>
                                        <table class='table'> <tr>
                                        <th>Dados do Criterio de Avaliação</th>
                                        </tr>  </table></div>";
        $query = ("select * from criterio_avaliacao where criterio_avaliacao ='" . $valor . "'");
        $res = mysqli_query($db, $query);
        while ($consulta = mysqli_fetch_array($res)) {
            $query = ("select categoria_projeto from categoria where id_categoria ='" . $consulta['id_categoria'] . "'");
            $res = mysqli_query($db, $query);
            $consulta2 = mysqli_fetch_array($res);
            echo "<form action='RespAlterarCriterio.php' method='POST' id='form' name='frm'>"
            . "<b>Categoria do Projeto: </b><select name='categoria' id='categoria'>"
            . " <option value=" . $consulta2['categoria_projeto'] . " selected='selected'> " . $consulta2['categoria_projeto'] . "</option>
                            <option value='Pesquisa'>Pesquisa</option>
                            <option value='Competição Tecnológica'>Competição Tecnologica</option>
                            <option value='Inocação no Ensino'>Inovação no Ensino</option>
                            <option value='Manutenção e Reforma'>Manutenção e Reforma</option>
                            <option value='Pequenas Obras'>Pequenas Obras</option> 
                        </select><br><br>"
            . "<b> Critério de Avaliação: </b> <input type='text' name='criterio' size='50' value=" . $consulta['criterio_avaliacao'] . "><br><br>
                            <b> Status: </b> <select name='status'> 
                            <option value='ativado' selected='selected' value=" . $consulta['status_criterio'] . ">  " . $consulta['status_criterio'] . "</option>
                            <option value='ativado'>Ativado</option>                            
                            <option value='desativado'>Desativado</option>
                        </select><br><br>
                        <b> Peso: </b> <input type='text' name='peso' value=" . $consulta['peso_criterio'] . "> (Valor de 0 a 10)";
            echo"<INPUT TYPE='hidden' NAME='valor' VALUE=" . $valor . ">";
        }
        echo"<div class='row'>
                            <div class='col-sm-12'>
                                <div class='text-center'><input type='submit' name='alterar' class='btn btn-primary btn-lg' value='Salvar'></div></div></div></form><br><br>";
        echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>
