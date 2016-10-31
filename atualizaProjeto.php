<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">

    <h3>Atualize seu projeto!</h3>
    <h4>Digite o código do projeto que deseja modificar:</h4>
    <form method="post" action="atualizarProjeto.php" name="projForm" onsubmit="validatecod()">
        <label for="cd">Código: </label><input type="text" name="codigo" id="cd"/>
        <h4>Por favor, digite as novas informações do projeto:</h4>
        <label for="nm">Nome: </label><input type="text" name="nome" id="nm"/><br/><br/>
        Categoria:<br/>
        <div id="cat">
            <input type="radio" name="categoria" value="1"/> Pesquisa<br/>
            <input type="radio" name="categoria" value="2"/> 
            Competição Tecnológica<br/>
            <input type="radio" name="categoria" value="3"/> Inovação no Ensino<br/>
            <input type="radio" name="categoria" value="4"/> Manutenção e Reforma<br/>
            <input type="radio" name="categoria" value="5"/> Pequenas Obras<br/><br/>
        </div>
        <label for="du">Duração: </label><input type="number" name="duracao" id="du" min="1"/>
        <br/><br/>
        <label for="vl">Valor Previsto: </label><input type="text" name="valor" id="vl"/><br/><br/>
        <input type="submit" name="Atualizar" value="Atualizar"/>
        <input type="reset" value="Voltar"/>
    </form>
</div> 
</body>
</html>