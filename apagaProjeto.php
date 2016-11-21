<?php include("cabecalho_funcionalidade.php"); ?>	
<div class="col-md-9 well admin-content" id="home">
    <div class="text-center">
        <h2><ins>Remover Projeto</ins></h2><br></div>
    <form method="post" action="apagarProjeto.php" name="projForm">
        <input type="text" name="valor" class="form-control" placeholder="Digite aqui o nome do projeto"><br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">						
                    <input type="submit" name="Apagar" class="btn btn-primary btn-lg" value="Remover Projeto">
                    <input type="reset" name="reset" class="btn btn-primary btn-lg" value="Limpar Campos">
                </div>	
            </div>
        </div>
    </form>
</div> 
</body>
</html>
