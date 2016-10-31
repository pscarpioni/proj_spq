<?php

if (!isset($_SESSION["login"])) {
    header("Location:login.php?erro=Usuario nao logado");
}
?>