<!DOCTYPE>
<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <form action="consultarFinanciaProjeto.php" method="POST" id="form" name="projForm">
        <div class="text-center">
            <h2><ins>Consulta financiamento</ins></h2><br></div>
        <label for="nm">Nome do Projeto: </label><input type="text" name="nome" id="nm"/><br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">						
                    <input type="submit" name="consultar" class="btn btn-primary btn-lg" value="consultar" onclick="">
                    <input type="reset" name="reset" class="btn btn-primary btn-lg" value="Limpar Campos">
                </div>	
            </div>
        </div>
    </form>
</div> 
</body>
</html>
