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
                                        <th>Dados do Critério de Avaliação</th>
                                        </tr>  </table></div>";
        $query = ("select * from criterio_avaliacao where criterio_avaliacao ='" . $valor . "'");
        $cont = 0;
        $res = mysqli_query($db, $query);
        while ($consulta = mysqli_fetch_array($res)) {
            $cont = 1;
            echo "<form action='RespAlterarCriterio.php' method='POST' id='form' name='frm'>"
            . "<b>Categoria do Projeto: </b><select name='categoria' id='categoria'>"
            . " <option value=\"".$consulta['id_categoria']."\" selected='selected'></option>
                            <option value='1'>Pesquisa</option>
                            <option value='2'>Competição Tecnológica</option>
                            <option value='3'>Inovação no Ensino</option>
                            <option value='4'>Manutenção e Reforma</option>
                            <option value='5'>Pequenas Obras</option> 
                        </select><br><br>"
            . "<b> Status: </b> <select name='status'> 
                            <option selected='selected' value=" . $consulta['status_criterio'] . ">  " . $consulta['status_criterio'] . "</option>
                            <option value='Ativado'>Ativado</option>                            
                        </select><br><br>"
            . "<b> Critério de Avaliação: </b> <input type='text' name='criterio' size='50' value=\"".$consulta['criterio_avaliacao']."\"><br><br>
               <b> Peso (Valor de 0 a 10): </b> <input type='number' name='peso' min='1' max='10' value=" . $consulta['peso_criterio'] . ">";
            echo"<INPUT TYPE='hidden' NAME='valor' VALUE=" . $valor . "> <br><br><br><br>";
        }
        echo"<div class='row'>
                            <div class='col-sm-12'>
                                <div class='text-center'><input type='submit' name='alterar' class='btn btn-primary btn-lg' value='Salvar'></div></div></div></form><br><br>";
        echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
        if ($cont == 0) {
            echo "<script>alert('Critério não encontrado!'); window.location.href='alterarCriterioAvaliacaoConsulta.php' </script>";
        }
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>
