<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <form action="Respconsulta.php" method="POST">
        <div class="text-center">
            <h2><ins>Consultar Usuário</ins></h2><br></div>
        <b>Filtros: </b>
        <label class="radio-inline">						
            <input type="radio" name="radio" value="nome" checked> Nome
        </label>
        <label class="radio-inline">
            <input type="radio" name="radio" value="login"> Login(Nickname) 
        </label><br><br>				
        <input type="text" name="valor" class="form-control" placeholder="Digite aqui"><br><br>
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