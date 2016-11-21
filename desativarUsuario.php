<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    $db = mysqli_connect("localhost", "root");

    if (!$db) {
        die('Não foi possível Conectar: ' . mysql_error());
    }
    mysqli_select_db($db, "spq");
    $login = $_POST["login"];

    $sql = "update usuario set status='Desativado' WHERE login='" . $login . "'";

    $result = mysqli_query($db, $sql); /* executa a query */
    $row = mysqli_affected_rows($db);
    if ($row) {
        echo "<script>alert('Usuário $login desativado com sucesso!'); window.location.href='home_adm.php' </script>";
    } else {
        echo "<script>alert('Usuário $login não encontrado!'); window.location.href='home_adm.php' </script>";
    }
    mysqli_close($db);
    ?>
</div> 
</body>
</html>