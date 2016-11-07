<!DOCTYPE>
<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <h3>Consulte seu projeto: </h3>
    
    <form action="consultarFinanciamento.php" method="POST" id="form" name="frm">
        
        <label for="nm">Nome do projeto: </label><input type="text" name="nome" size="50"><br/><br/>
        
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