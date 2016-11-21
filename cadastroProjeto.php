<?php include("cabecalho_funcionalidade.php"); ?>
<script>
    function validateForm() {
        var a = document.forms["projForm"]["nome"].value;
        var b = document.forms["projForm"]["categoria"].value;
        var c = document.forms["projForm"]["duracao"].value;
        var d = document.forms["projForm"]["valor"].value;
        var e = document.forms["projForm"]["imagem"].value;
        if ((a === null || a === "") || (b === null || b === "") ||
                (c === null || c === "") || (d === null || d === "")
                || (e === null || e === "")) {
            alert("Preencha todos os campos obrigatórios.");
            return false;
        }
    }
</script>
</head>

<div class="col-md-9 well admin-content" id="home">
    <h4><ins>Digite o seguintes dados para cadastrar seu projeto:</ins> </h4>
    <br> <b> (*) campos de preenchimento obrigatório </b><br><br>
    <form method="post" action="cadastrarProjeto.php" name="projForm" onsubmit="return validateForm()"
          enctype="multipart/form-data">
              <?php echo " <input type='hidden' name='coduser' value=" . $_SESSION["codigo"] . " id='cdu'/> \n"; ?>

        <br><label for="nm"> *Nome do Projeto: </label> <input type="text" name="nome" id="nm"/><br/><br/>
        <b> *Categoria do Projeto: </b><br/>
        <div id="cat">
            <input type="radio" name="categoria" value="1" checked/> Pesquisa<br/>
            <input type="radio" name="categoria" value="2"/> Competição Tecnológica<br/>
            <input type="radio" name="categoria" value="3"/> Inovação no Ensino<br/>
            <input type="radio" name="categoria" value="4"/> Manutenção e Reforma<br/>
            <input type="radio" name="categoria" value="5"/> Pequenas Obras<br/><br/>
        </div>
        <label for="du"> *Duração prevista (em meses): </label> <input type="number" name="duracao" id="du" min="1"/><br/><br/>
        <label for="vl"> *Valor Previsto: </label> <input type="number" name="valor" id="vl" min="1"/><br/>
        <input type="hidden" value="Candidato" name="status" readonly/><br/><br/>
        <label for="im">*Imagem relacionada ao projeto: </label> <input type="file" name="imagem" id="im"><br/><br/>
        <label>Link para um vídeo do projeto: </label> <input type="text" name="link"/><br/><br/>
        <label>Descrição do projeto: </label><br> <textarea rows="4" cols="50" maxlength="250" name="descricao"></textarea><br/><br/>

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <input type="submit" name="cadastrar" class="btn btn-primary btn-lg" value="Cadastrar" onclick="">
                    <input type="reset" name="reset" class="btn btn-primary btn-lg" value="Limpar Campos">
                </div>	
            </div>
        </div>
    </form>
</div> 
</body>
</html>