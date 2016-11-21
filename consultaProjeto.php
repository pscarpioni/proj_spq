<?php include("cabecalho_funcionalidade.php"); ?>

<script type="text/javascript">
    function liberar() {
            document.getElementById("catg").style.visibility = 'visible';
            document.getElementById("camp").style.visibility = 'hidden';
    }
</script>

<div class="col-md-9 well admin-content" id="home">
    <form action="consultarProjeto.php" method="POST">
        <div class="text-center">
            <h2><ins>Consultar os Projetos Cadastrados</ins></h2><br></div>
        <b>Filtros: </b>
        <label class="radio-inline">						
            <input type="radio" name="radio" value="nome" checked> Nome
        </label>
        <label class="radio-inline">
            <input type="radio" name="radio" value="codigo"> Código 
        </label>
        <label class="radio-inline">
            <input type="radio" name="radio" value="cat" name="cat" onblur="liberar();"> Categoria
        </label>
        <select id = "catg" name="categoria" style="visibility: hidden;" > 
            <option value="1">Pesquisa</option>
            <option value="2">Competição Tecnológica</option>
            <option value="3">Inovação no Ensino</option>
            <option value="4">Manutenção e Reforma</option>
            <option value="5">Pequenas Obras</option>
        </select><br>
        <br><br>				
        <input type="text" name="valor"  id="camp" class="form-control" placeholder="Digite aqui"><br><br>
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

