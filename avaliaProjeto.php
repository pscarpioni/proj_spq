<!DOCTYPE>
<head>
<meta charset="utf-8"/>
</head>
<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <form action="avaliarProjeto.php" method="POST" id="form" name="projForm">
        <div class="text-center">
            <h2><ins>Avaliação de Projetos Candidatos</ins></h2><br></div>
        
        <?php echo " <input type='hidden' name='codaval' value=" . $_SESSION["codigo"] . " id='cdu'/> \n"; ?>
        <input type="text" name="nome" class="form-control" placeholder="Digite aqui o nome do projeto" required><br><br>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">						
                    <input type="submit" name="avaliar" class="btn btn-primary btn-lg" value="Avaliar" onclick="">
                    <input type="reset" name="reset" class="btn btn-primary btn-lg" value="Limpar Campo">
                </div>	
            </div>
        </div>
    </form>
</div> 
</body>
</html>
