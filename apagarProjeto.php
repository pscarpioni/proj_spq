<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    $nome = $_POST["valor"];
    if (isset($_POST["Apagar"])) {
        $db = mysqli_connect("localhost", "root");
        mysqli_select_db($db, "spq");
        $sql = "DELETE FROM projeto WHERE nome_projeto = '$nome'";
        $result = mysqli_query($db, $sql);
        echo "<script>alert('Projeto removido com sucesso!'); window.location.href='home_adm.php' </script>";
        mysqli_close($db);
    }
    ?>
</div> 
</body>
</html>