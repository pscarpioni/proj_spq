<?php include("cabecalho_funcionalidade.php"); ?>
<script>
    function validateForm() {
        var a = document.forms["projForm"]["nome"].value;
        var b = document.forms["projForm"]["categoria"].value;
        var c = document.forms["projForm"]["duracao"].value;
        var d = document.forms["projForm"]["valor"].value;
        var e = document.forms["projForm"]["coduser"].value;
        if ((a === null || a === "") || (b === null || b === "") ||
                (c === null || c === "") || (d === null || d === "")
                ) {
            alert("Preencha os campos corretamente, sem deixar espaço em branco!");
            return false;
        }
    }
</script>
</head>

<div class="col-md-9 well admin-content" id="home">
    <h3>Cadastre seu projeto!</h3>
    <h4>Digite o seguintes dados para cadastrar seu projeto:</h4>
    <form method="post" action="cadastrarProjeto.php" name="projForm" onsubmit="return validateForm()"
          enctype="multipart/form-data">
        <br><label for="cdu">Código do usuário: </label><input type="text" name="coduser" id="cdu"/>
        <br/><br/>
        <label for="nm">Nome: </label><input type="text" name="nome" id="nm"/><br/><br/>
        <b> Categoria: </b><br/>
        <div id="cat">
            <input type="radio" name="categoria" value="1" checked/> Pesquisa<br/>
            <input type="radio" name="categoria" value="2"/> Competição Tecnológica<br/>
            <input type="radio" name="categoria" value="3"/> Inovação no Ensino<br/>
            <input type="radio" name="categoria" value="4"/> Manutenção e Reforma<br/>
            <input type="radio" name="categoria" value="5"/> Pequenas Obras<br/><br/>
        </div>
        <label for="du"> Duração (em meses): </label><input type="number" name="duracao" id="du" min="1"/><br/><br/>
        <label for="vl"> Valor Previsto: </label><input type="number" name="valor" id="vl" min="1"/><br/><br/>
        <b> Status: </b> <input type="text" value="Candidato" name="status" readonly/><br/><br/>
        <label>Link: </label><input type="text" name="link"/><br/><br/>
        <label>Descrição: </label><br><textarea rows="4" cols="50" maxlength="250" name="descricao"></textarea><br/><br/>
        <label for="im">Imagem: </label><input type="file" name="imagem" id="im"><br/><br/>
        <input type="submit" name="Cadastrar" value="Cadastrar"/>
        <input type="reset" value="Voltar"/>
    </form>
</div> 
</body>
</html>