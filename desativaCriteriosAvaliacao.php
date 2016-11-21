<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_GET["busca"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        $busca = $_GET["busca"];

        $sql = "update criterio_avaliacao set status_criterio='Desativado' WHERE id_criterio = '" . $busca . "'";

        $result = mysqli_query($db, $sql); /* executa a query */
        $row = mysqli_affected_rows($db);
        if ($row) {
            echo "<script>alert('Critério de avaliação desativado com sucesso!'); window.location.href='home_adm.php' </script>";
        } else {
            echo "<script>alert('Critério de avaliação não encontrado!'); window.location.href='home_adm.php' </script>";
        }
        mysqli_close($db);
    }
    ?>
</div> 
</body>
</html>
