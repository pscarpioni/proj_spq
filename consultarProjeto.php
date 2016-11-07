<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <h3>Exibindo os projetos cadastrados</h3>
    <?php
    $nome = NULL;
    $codigo = NULL;
    if (isset($_POST["Consultar"])) {
        if (isset($_POST["codigo"]))
            $codigo = $_POST["codigo"];
        if (isset($_POST["nome"]))
            $nome = $_POST["nome"];
        $categoria = $_POST["categoria"];
        $db = mysqli_connect("localhost", "root");
        mysqli_select_db($db, "spq");
        if ($codigo || $nome) {
            if ($codigo && !$nome)
                $sql = "SELECT nome_projeto,id_categoria,valor_projeto,duracao_projeto, imagem, descricao FROM "
                        . "projeto WHERE codigo_projeto = '"
                        . $codigo . "' AND id_categoria = '" . $categoria . "'";
            else
            if (!$codigo && $nome)
                $sql = "SELECT nome_projeto,id_categoria,valor_projeto,duracao_projeto,imagem,descricao FROM "
                        . "projeto WHERE nome_projeto = '"
                        . $nome . "' AND id_categoria = '" . $categoria . "'";
            else
                $sql = "SELECT nome_projeto,id_categoria,valor_projeto,duracao_projeto, imagem, descricao FROM "
                        . "projeto WHERE codigo_projeto = '"
                        . $codigo . "' AND id_categoria = '" . $categoria . "' AND nome_projeto = '" .
                        $nome . "'" . "";

            $result = mysqli_query($db, $sql); /* executa a query */
            while ($row = mysqli_fetch_array($result)) { //erro está aqui
                echo "<h5> Nome: " . $row["nome_projeto"] . "</h5> \n";
                echo "<h5> Categoria: " . $row["id_categoria"] . "<br/><br/>"
                . " Valor: R$" . $row["valor_projeto"] . "<br/><br/> Duração: " . $row["duracao_projeto"] .
                " meses<br><br><h5>Imagem:</h5><br><img src='upload/".$row["imagem"]."'>"
                        . "<br><br><br>Descrição: ".$row["descricao"]."<br><br></h5>";
            }
        } else {
            echo"<form action='categorias.php' name='form1' method='post'>";
            echo"<input type='text' name='categoria' value='$categoria' readonly/>";
            echo"<input type='submit' value='Nome do Projeto Candidato'/>";
            echo"</form>";
        }

        mysqli_close($db);
    }
    ?>
</div> 
</body>
</html>



