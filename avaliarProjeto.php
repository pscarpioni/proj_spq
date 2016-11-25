<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home"> 
    <?php
    if (isset($_POST["avaliar"])) {
        $nome = $_POST["nome"];
        $codaval = $_POST["codaval"];
        $data = date("Y-m-d");

        $db = mysqli_connect("localhost", "root");
        mysqli_select_db($db, "spq");

        $query = ("select id_categoria, codigo_projeto from projeto where nome_projeto='" . $nome . "'");
        $res = mysqli_query($db, $query);
        $query1 = ("select id_categoria from usuario where codigo_usuario='" . $codaval . "'");
        $res1 = mysqli_query($db, $query1);
        if (!mysqli_fetch_array($res)) {
            echo "<script>alert('O projeto fornecido não está cadastrado! Verifique se os dados digitados estão corretos.'); window.location.href='avaliaProjeto.php' </script>";
        } else {
            if (!mysqli_fetch_array($res1)) {
                echo "<script>alert('O usuário fornecido não está cadastrado! Verifique se os dados digitados estão corretos.'); window.location.href='avaliaProjeto.php' </script>";
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
                    echo "<script>alert('Este avaliador não pode avaliar esta categoria de projeto!'); window.location.href='avaliaProjeto.php' </script>";
                else {
                    $query2 = ("select id_avaliacao from avaliacao where codigo_projeto = '" . $codigo . "'");
                    $res2 = mysqli_query($db, $query2);
                    if (mysqli_fetch_array($res2)) {
                        echo "<script>alert('Este projeto já foi avaliado!'); window.location.href='avaliaProjeto.php' </script>";
                    } else {

                        $sql = "INSERT INTO avaliacao(codigo_projeto, codigo_usuario, id_categoria,"
                                . "data_avaliacao) VALUES ('" . $codigo . "','" . $codaval . "' ,"
                                . "'" . $id1 . "','" . $data . "')";
                               
                        mysqli_query($db, $sql) or die("Erro ao cadastrar:" . mysqli_error($db)); /* executa a query */
                        $query = ("select id_avaliacao from avaliacao where codigo_projeto = '" . $codigo . "' and codigo_usuario= '" . $codaval . "' and data_avaliacao= '" . $data . "'");
                        $res = mysqli_query($db, $query);
                        $id_aval = mysqli_fetch_array($res);
                        $id_avaliacao = $id_aval['id_avaliacao'];
                        mysqli_close($db);

                        echo"<h3>Projeto encontrado.</h3>";

                        echo"<form method='POST' action='fichaAvaliacao.php'>";
                        echo"<input type='hidden' name='codigo_projeto' value='$codigo'/> <br><br>";
                        echo"<input type='hidden' name='codigo_avaliador' value='$codaval'/>";
                        echo"<input type='hidden' name='categoria' value='$id1'/>";
                        echo"<input type='hidden' name='id_avaliacao' value='$id_avaliacao'/>";
                        echo "<div class='row'><div class='col-sm-12'><div class='text-center'>";
                        echo "<input type='submit' class='btn btn-primary btn-lg' name='aval' value='Preencher Ficha de Avaliação'/>";
                        echo"</form>";
                    }
                }
            }
        }
    }
    ?>
</div> 
</body>
</html>