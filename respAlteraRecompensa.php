<?php include("cabecalho_funcionalidade.php"); ?>

<div class="col-md-9 well admin-content" id="home">
    <?php
    $db = mysqli_connect("localhost", "root");

    if (!$db) {
        die('Não foi possível Conectar: ' . mysql_error());
    }
    mysqli_select_db($db, "spq");
    
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $valorMinimo = $_POST["valorMinimo"];
    $valorMaximo = $_POST["valorMaximo"];
    $limite = $_POST["limite"];
    $id = $_POST["id"];
    $codigo_usuario = "1";

    $sql = "update recompensa set descricao = '" . $descricao . "',valor_min='" . $valorMinimo . "',valor_max='" . $valorMaximo . "',limite='" . $limite . "' where id_recompensa = '" . $id . "'";


    $result = mysqli_query($db, $sql); /* executa a query */
    if ($result) {
        echo "<script>alert('Recompensa alterada com sucesso!'); window.location.href='home_adm.php' </script>";
    } else {
        echo json_encode(array('msg' => 'Erro ao atualizar dados.'));
    }
    mysqli_close($db);
    ?>
</div> 
</body>
</html>
