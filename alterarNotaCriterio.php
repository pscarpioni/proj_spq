<!DOCTYPE>
<head>
<meta charset="utf-8"/>

<script type="text/javascript">
    
    function validacao() {
        var a = document.forms["projForm"]["codigo"].value;
        var b = document.forms["projForm"]["nome"].value;
        var c = document.forms["projForm"]["categoria"].value;
        
        if ((a === null || a === "") || (b === null || b === "") ||
                (c === null || c === "")) {
            alert("Preencha os campos corretamente, sem deixar espaço em branco!");
            return false;
        }

    }
</script>
</head>
<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <form action="alteraNotaCriterio.php" method="POST" id="form" name="projForm" onsubmit="return validacao()">
        <div class="text-center">
            <h2><ins>Alteração de notas da avaliação de um projeto</ins></h2><br></div>
        
        <?php echo " <input type='hidden' name='codigo' value=" . $_SESSION["codigo"] . " id='cdu'/> \n"; ?>
        <input type="text" name="nome" class="form-control" placeholder="Digite aqui o nome do projeto" required><br><br>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">						
                    <input type="submit" name="consultar" class="btn btn-primary btn-lg" value="Consultar" onclick="">
                    <input type="reset" name="reset" class="btn btn-primary btn-lg" value="Limpar Campos">
                </div>	
            </div>
        </div>
    </form>
</div> 
</body>
</html>