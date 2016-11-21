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
                                        <th>Dados do Projeto</th>
                                        </tr>  </table></div>";
        $query = ("select * from projeto where nome_projeto='" . $valor . "'");
        $res = mysqli_query($db, $query);
        $cont = 0;
        while ($consulta = mysqli_fetch_array($res)) {
            $cont = 1;
            echo "<form action='RespAlterarProj.php' method='POST' id='form' name='frm' enctype='multipart/form-data'>"
            . "<br><label for='nm'> Nome do Projeto: </label> <input type='text' name='nome' value=\"".$consulta['nome_projeto']."\" id='nm'/><br/><br>";
            echo " <input type='hidden' name='cod' value=" . $consulta["codigo_projeto"] . " id='cd'/> \n
                <b> Categoria de Projeto: </b> <select id = 'cat' name='categoria'>
                                 <option value=" . $consulta['id_categoria'] . " selected='selected'> </option>
                                 <option value='1'>Pesquisa</option>
                                 <option value='2'>Competição Tecnológica</option>
                                 <option value='3'>Inovação no Ensino</option>
                                 <option value='4'>Manutenção e Reforma</option>
                                 <option value='5'>Pequenas Obras</option>
                             </select><br><br><br>";
            echo "<label for='du'> Duração prevista (em meses): </label> <input type='number' name='duracao' value=" . $consulta['duracao_projeto'] . " id='du' min='1' value=" . $consulta['duracao_projeto'] . " /><br/><br/>
        <label for='vl'> Valor Previsto: </label> <input type='number' value=" . $consulta['valor_projeto'] . " name='valor' id='vl' min='1'/><br/>"
        ."<br><label>Link para um vídeo do projeto: </label> <input type='text' value=" . $consulta['link'] . " name='link'/><br/><br/>
        <label>Descrição do projeto: </label><br> <textarea rows='4' cols='50' maxlength='250' name='descricao'>" . $consulta['descricao'] . " </textarea><br/>"
        . "<br><label for='im'> Imagem relacionada ao projeto (selecione uma imagem apenas se desejar alterar a atual): </label><input type='file' name='imagem' id='im'><br/><br/>";
        }
        echo"<div class='row'>
                            <div class='col-sm-12'>
                                <div class='text-center'><input type='submit' name='alterar' class='btn btn-primary btn-lg' value='Salvar'></div></div></div></form><br><br>";
        echo "<p align='center'><a href = 'atualizaProjeto.php'>Voltar</a><p/>";
        if ($cont == 0) {
            echo "<script>alert('Projeto não encontrado!'); window.location.href='atualizaProjeto.php' </script>";
        }
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>

