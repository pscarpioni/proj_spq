<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <h3>Consulte seu projeto!</h3>
    <h4>Digite o seguintes filtros para consultar seu projeto:</h4>
    <form method="post" action="consultarProjeto.php" name="projForm">
        <label for="cd">Código do projeto: </label><input type="text" name="codigo" id="cd"/><br/><br/>
        <label for="nm">Nome do projeto: </label><input type="text" name="nome" id="nm"/><br/><br/>
        Categoria:<br/>
        <div id="cat">
            <input type="radio" name="categoria" value="1" checked/> Pesquisa<br/>
            <input type="radio" name="categoria" value="2"/>Competição Tecnológica<br/>
            <input type="radio" name="categoria" value="3"/> Inovação no Ensino<br/>
            <input type="radio" name="categoria" value="4"/> Manutenção e Reforma<br/>
            <input type="radio" name="categoria" value="5"/> Pequenas Obras<br/><br/>
        </div>
        <input type="submit" name="Consultar"/>
        <input type="reset" value="Voltar"/>
    </form>
</div> 
</body>
</html>

