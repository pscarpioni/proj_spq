<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["excluir"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        $nome_projeto = $_POST["nome"];
        $recompensa = $_POST["recompensa"];

        $query = ("select status, codigo_projeto from projeto where nome_projeto ='" . $nome_projeto . "'");
        $res = mysqli_query($db, $query);
        if ($consulta = mysqli_fetch_array($res)) {
            $status = $consulta['status'];
            $codigo = $consulta['codigo_projeto'];
        }
        if ($status == "Finalizado") {
            $query = ("delete from recompensa where codigo_projeto = '" . $codigo . "' and descricao = '" . $recompensa . "'");

            $res = mysqli_query($db, $query);
        } else {
            echo " <h2>As recompensas desse projeto não podem serem alteradas!</h2><br>";
        }
    }
    if ($res) {
        echo "<script>alert('Recompensa excluída com sucesso!'); window.location.href='home_adm.php' </script>";
    } else {
        echo json_encode(array('msg' => 'Erro ao atualizar dados.'));
    }
    mysqli_close($db);
    ?>
</div> 
</body>
</html>
