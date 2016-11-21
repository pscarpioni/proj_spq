<?php include("cabecalho_funcionalidade.php"); ?>

<script type="text/javascript">
    function validacao(frm) {
        if (document.frm.valor.value == "") {
            alert("O campo Nome não foi informado.");
            frm.cpf.focus();
            return false;
        }
    }
	
</script>
</head>
<div class="col-md-9 well admin-content" id="home">
    <form action="cadastrarRepasseFinanceiro_Pesquisa.php" name='frm' onsubmit='return validacao(this)' method="POST">
        <div class="text-center">
            <h2><ins>Cadastrar Repasses do Projeto</ins></h2><br></div>

        <input type="text" name="valor" class="form-control" placeholder="Digite aqui o nome do projeto"><br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">						
                    <input type="submit" name="consultar" class="btn btn-primary btn-lg" value="Cadastrar">
                    <input type="reset" name="reset" class="btn btn-primary btn-lg" value="Limpar Campos">
                </div>	
            </div>
        </div>
    </form>
</div> 
</body>
</html>
