<!DOCTYPE>
<head>
<meta charset="utf-8"/>

<script type="text/javascript">
    
    function validacao() {
       var a = document.forms["projForm"]["codigo"].value;
        var b = document.forms["projForm"]["nome"].value;
        var c = document.forms["projForm"]["categoria"].value;
        var d = document.forms["projForm"]["codaval"].value;
        var e = document.forms["projForm"]["nomeaval"].value;
        if ((a === null || a === "") || (b === null || b === "") ||
                (c === null || c === "") || (d === null || d === "") ||
                (e === null || e === "")) {
            alert("Preencha os campos corretamente, sem deixar espaço em branco!");
            return false;
        }

    }
</script>
</head>
<?php include("cabecalho_funcionalidade.php"); ?>
<div class="col-md-9 well admin-content" id="home">
    <form action="avaliarProjeto.php" method="POST" id="form" name="projForm" onsubmit="return validacao()">
        <div class="text-center">
            <h2><ins>Avaliação de Projetos Candidatos</ins></h2><br></div>
        <label for="cd">Código do Projeto: </label><input type="text" name="codigo" id="cd"/><br><br>
        <label for="nm">Nome do Projeto: </label><input type="text" name="nome" id="nm"/><br><br>
        <b> Categoria do Projeto: </b><br/>
        <div id="cat">
            <input type="radio" name="categoria" value="1" checked/> Pesquisa<br/>
            <input type="radio" name="categoria" value="2"/> Competição Tecnológica<br/>
            <input type="radio" name="categoria" value="3"/> Inovação no Ensino<br/>
            <input type="radio" name="categoria" value="4"/> Manutenção e Reforma<br/>
            <input type="radio" name="categoria" value="5"/> Pequenas Obras<br/><br/>
        </div><br><br>
        <label for="ca"> Código do Avaliador: </label><input type="text" name="codaval" id="ca"/><br><br>
        <label for="na"> Nome do Avaliador: </label><input type="text" name="nomeaval" id="na"/><br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">						
                    <input type="submit" name="avaliar" class="btn btn-primary btn-lg" value="Avaliar" onclick="">
                    <input type="reset" name="reset" class="btn btn-primary btn-lg" value="Limpar Campos">
                </div>	
            </div>
        </div>
    </form>
</div> 
</body>
</html>
