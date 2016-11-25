<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <form action="alterarCriterio.php" method="POST" onsubmit="return validacao(this)">
        <div class="text-center">
            <h2><ins>Alterar Critério de Avaliação</ins></h2><br></div>

        <input type="text" name="valor" class="form-control" placeholder="Digite aqui o nome do Critério de Avaliação" required><br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">						
                    <input type="submit" name="consultar" class="btn btn-primary btn-lg" value="Alterar">
                    <input type="reset" name="reset" class="btn btn-primary btn-lg" value="Limpar Campos">
                </div>	
            </div>
        </div>
    </form>
</div> 
</body>
</html>
