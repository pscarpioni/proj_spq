<?php

if (isset($_POST["cadastrar"])) {
    $db = mysqli_connect("localhost", "root");

    if (!$db) {
        die('Não foi possível Conectar: ' . mysql_error());
    }
    mysqli_select_db($db, "spq");

//pegando os valores inseridos
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $data_nasc = $_POST["data_nasc"];
    $pais = $_POST["pais"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $tipo = $_POST["tipo"];
    
    if ($date = \DateTime::createFromFormat('d-m-Y', $data_nasc)) {
        $data_nasc = $date->format('Y-m-d');
    } else if ($date = \DateTime::createFromFormat('d/m/Y', $data_nasc)) {
        $data_nasc = $date->format('Y-m-d');
    }

    if ($tipo == "3") {
        $categoria = $_POST["categoria"];
        $strSQL = "INSERT INTO usuario (id_categoria,nome,cpf,login,data_nascimento,pais,cidade,estado,rua,numero_residencia,"
                . "bairro,email,tipo,senha,status) VALUES ('".$categoria."','".$nome."','".$cpf."','".$login."','".$data_nasc."','".$pais."',"
                . "'".$cidade."','".$estado."','".$rua."','".$numero."','".$bairro."', '".$email."',"
                . "'".$tipo."','".$senha."','Ativo')";
    } else {
        $strSQL = "INSERT INTO usuario (nome,cpf,login,data_nascimento,pais,cidade,estado,rua,numero_residencia,"
                . "bairro,email,tipo,senha,status) VALUES ('".$nome."','".$cpf."','".$login."','".$data_nasc."','".$pais."',"
                . "'".$cidade."','".$estado."','".$rua."','".$numero."','".$bairro."', '".$email."',"
                . "'".$tipo."','".$senha."','Ativo')";
    }

    mysqli_query($db, $strSQL); /* executa a query */
    mysqli_close($db);

    include 'respCadastroAdm.php';
}
?>