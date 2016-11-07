<?php

$login = $_POST["txtLogin"];
$senha = $_POST["txtSenha"];
// Montar o SQL para pesquisar
$db = mysqli_connect("localhost", "root", "", "spq");
$sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";
$res = mysqli_query($db, $sql) or die("ERRO ao pesquisar login. " .
                mysqlerror());
if ($registro = mysqli_fetch_assoc($res)) {
// Criar a sessao. Login e senha conferem
    $nome = $registro["nome"];
    session_start();
    $_SESSION["login"] = $login;
    $_SESSION["nome"] = $nome;
    header("Location:home_adm.php");
} else {
// Login e senha NAO conferem
    header("Location:login.php?erro=Login invalido.");
}
?>
