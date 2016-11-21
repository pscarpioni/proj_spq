<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <form action="RespConsultaRecompensa.php" method="POST" id="form" name="frm">
        <div class="text-center">
            <h2><ins>Consulta de Recompensas </ins></h2><br></div>
        <b> Nome do Projeto: </b> <input type="text" name="nome" size="50"><br><br>
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
