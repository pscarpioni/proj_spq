<?php include("cabecalho_funcionalidade.php"); ?>	
<div class="col-md-9 well admin-content" id="home">
    <h3>Exclua um projeto!</h3>
    <h4>Digite o código do projeto que deseja excluir</h4>
    <form method="post" action="apagarProjeto.php" name="projForm" onsubmit="validatecod()">
        <label for="cd">Código: </label><input type="text" name="codigo" id="cd"/> <br/><br/>
        <input type="submit" value="Apagar" name="Apagar"/>
        <input type="reset" value="Voltar"/>
</div> 
</body>
</html>