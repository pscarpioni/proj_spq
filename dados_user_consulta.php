<?php include("cabecalho_funcionalidade.php"); ?>	
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_GET["busca"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th>Dados do Usuário</th>
                                    </tr>";

        $busca = $_GET["busca"];
        $query = ("select * from usuario where login='" . $busca . "'");
        $res = mysqli_query($db, $query);
        while ($consulta = mysqli_fetch_array($res)) {
            echo"<tr><td><br><b> Código: </b>" . $consulta['codigo_usuario'] . "<br>
                                <b> Nome Completo: </b>" . $consulta['nome'] . "<br>"
            . " <b> Login: </b>" . $consulta['login'] . "<br>"
            . "<b> País: </b>" . $consulta['pais'] . "<br>"
            . "<b> Estado: </b>" . $consulta['estado'] . "<br>"
            . "<b> Cidade: </b>" . $consulta['cidade'] . "<br>"
            . "<b> Data de nascimento: </b>" . $consulta['data_nascimento'] . "<br>"
            . "<b> Email: </b>" . $consulta['email'] . "<br>"
            . "<b> Status: </b>" . $consulta['status'] . "<br>"
            . "<b> Tipo de usuário: </b>" . $consulta['tipo'] . "<br><br>";
            if ($consulta['tipo'] == "3")
                echo "<b> Categoria de projeto: </b>" . $consulta['id_categoria'] . "<br><br>";
        }
        echo"</td></tr><br></table></div>";
        echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
        mysqli_close($db);
        return 0;
    }
    ?>
</div> 
</body>
</html>