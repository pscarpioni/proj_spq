<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    $db = mysqli_connect("localhost", "root");

    if (!$db) {
        die('Não foi possível Conectar: ' . mysql_error());
    }
    mysqli_select_db($db, "spq");
    $pais = $_POST["pais"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $valor = $_POST["valor"];
    $tipo = $_POST["tip"];

    if ($tipo == "3") {
        $cat = $_POST["categoria"];
        $sql = "update usuario set login='" . $login . "',pais='" . $pais . "',cidade='" . $cidade . "',estado='" . $estado . "',"
                . "rua='" . $rua . "',numero_residencia='" . $numero . "',"
                . "bairro='" . $bairro . "',email='" . $email . "',senha='" . $senha . "',id_categoria='" . $cat . "' WHERE login='" . $valor . "'";
    } else {
        $sql = "update usuario set login='" . $login . "',pais='" . $pais . "',cidade='" . $cidade . "',estado='" . $estado . "',"
                . "rua='" . $rua . "',numero_residencia='" . $numero . "',"
                . "bairro='" . $bairro . "',email='" . $email . "',senha='" . $senha . "' WHERE login='" . $valor . "'";
    }

    $result = mysqli_query($db, $sql); /* executa a query */
    if ($result) {
        echo "<script>alert('Usuário $login alterado com sucesso!'); window.location.href='home_adm.php' </script>";
    } else {
        echo json_encode(array('msg' => 'Erro ao atualizar dados.'));
    }
    mysqli_close($db);
    ?>
</div> 
</body>
</html>