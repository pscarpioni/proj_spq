<?php
unset($_SESSION["nome"]); 
unset($_SESSION["tipo"]); 
unset($_SESSION["codigo"]);
    
session_destroy();

header("location: index.html");
?>

