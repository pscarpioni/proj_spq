<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <form action="RespConsultaCriteriosAvaliacao.php" method="POST" id="form" name="frm">
        <div class="text-center">
            <h2><ins>Consulta de Critérios de Avaliação </ins></h2><br></div>
        <b>Categoria do Projeto: </b><select name="categoria" id="pais">
            <option value=" "></option>
            <option value="Pesquisa">Pesquisa</option>
            <option value="Competição Tecnológica">Competição Tecnologica</option>
            <option value="Inocação no Ensino">Inovação no Ensino</option>
            <option value="Manutenção e Reforma">Manutenção e Reforma</option>
            <option value="Pequenas Obras">Pequenas Obras</option>
        </select><br><br>
        <b> Critério de Avaliação: </b> <input type="text" name="criterio" size="50"><br><br>
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

