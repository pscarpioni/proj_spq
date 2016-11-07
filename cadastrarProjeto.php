<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["Cadastrar"])) {
        $nome = $_POST["nome"];
        $coduser = $_POST["coduser"];
        $categoria = $_POST["categoria"];
        $duracao = $_POST["duracao"];
        $valor = $_POST["valor"];
        $status = $_POST["status"];
        $link = $_POST["link"];
        $descricao = $_POST["descricao"];
        if(isset($_FILES["imagem"])){
            $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
            $novo_nome = md5(time()).$extensao;
            $diretorio = "upload/";
            move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);
        }
       
        $db = mysqli_connect("localhost", "root");
        mysqli_select_db($db, "spq");
        $sql = "INSERT INTO projeto(nome_projeto,id_categoria,codigo_usuario, duracao_projeto,"
                . "valor_projeto,status,imagem, descricao, link)VALUES('" .
                $nome . "','" . $categoria . "','" . $coduser . "','" . $duracao . "','" . $valor . "','" . $status . "'"
                . ",'".$novo_nome."','".$descricao."','".$link."')";
        mysqli_query($db, $sql); /* executa a query */
        mysqli_close($db);
        echo"<h3>Obrigado. Seus dados foram inseridos.</h3> \n";
    }
    ?>
</div> 
</body>
</html>