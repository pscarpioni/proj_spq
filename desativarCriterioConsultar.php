<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <form action="desativarCriterioAvaliacao.php" method="POST" onsubmit="return validacao(this)">
        <div class="text-center">
            <h2><ins>Desativar Criterio de Avaliação</ins></h2><br></div>

        <input type="text" name="criterio" class="form-control" placeholder="Digite aqui o criterio de avaliação"><br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">						
                    <input type="submit" name="desativar" class="btn btn-primary btn-lg" value="Desativar">
                    <input type="reset" name="reset" class="btn btn-primary btn-lg" value="Limpar Campos">
                </div>	
            </div>
        </div>
    </form>
</div> 
</body>
</html>

