<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    $db = mysqli_connect("localhost", "root");

    if (!$db) {
        die('Não foi possível Conectar: ' . mysql_error());
    }
    mysqli_select_db($db, "spq");
    if (isset($_POST["alterar"])) {
        $nome = $_POST["nome"];
        $codigo_proj = $_POST["cod"];
        $categoria = $_POST["categoria"];
        $duracao = $_POST["duracao"];
        $valor = $_POST["valor"];
        $link = $_POST["link"];
        $descricao = $_POST["descricao"];
        $arq=$_FILES["imagem"];
        if (!empty($arq['name'])) {
            $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
            $novo_nome = md5(time()) . $extensao;
            $diretorio = "upload/";
            move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);
            $sql = "update projeto set nome_projeto='" . $nome . "',id_categoria='" . $categoria . "',duracao_projeto='" . $duracao . "',valor_projeto='" . $valor . "',"
                . "link='" . $link . "', descricao='" . $descricao . "',imagem='" . $novo_nome . "' WHERE codigo_projeto='" . $codigo_proj . "'";
        }
        else{
             $sql = "update projeto set nome_projeto='" . $nome . "',id_categoria='" . $categoria . "',duracao_projeto='" . $duracao . "',valor_projeto='" . $valor . "',"
                . "link='" . $link . "', descricao='" . $descricao . "' WHERE codigo_projeto='" . $codigo_proj . "'";
        }

        $result = mysqli_query($db, $sql); /* executa a query */
        if ($result) {
            echo "<script>alert('Projeto $nome alterado com sucesso!'); window.location.href='home_adm.php' </script>";
        } else {
            echo json_encode(array('msg' => 'Erro ao atualizar dados.'));
        }
        mysqli_close($db);
    }
    ?>
</div> 
</body>
</html>