<!DOCTYPE>
<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <h3>Consulte o projeto o qual deseja financiar: </h3><br><br>
    
    <form action="cadastrarFinanciaProjeto.php" method="POST" id="form" name="frm">
        <label for="cd">Código do projeto (preenchimento opcional): </label> <input type="text" class="form-control" name="codigo" size="30"><br/><br/>
        <label for="nm">Nome do projeto (preenchimento opcional): </label> <input type="text" class="form-control" name="nome" size="50"><br/><br/><br>
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