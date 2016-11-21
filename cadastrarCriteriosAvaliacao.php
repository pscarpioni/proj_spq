<?php include("cabecalho_funcionalidade.php"); ?>
<script type="text/javascript">
    function liberar() {
        if (document.getElementById("tip").value == "3")
            document.getElementById("cat").style.visibility = 'visible';
        else
            document.getElementById("cat").style.visibility = 'hidden';
    }

    function validacao(frm) {
        if (document.frm.criterio.value == "") {
            alert("O campo Critério de Avaliação não foi informado.");
            frm.criterio.focus();
            return false;
        }
        if (document.frm.peso.value == "" || document.frm.peso.value < 0 || document.frm.peso.value > 10) {
            alert("O campo Peso está incorreto.");
            frm.peso.focus();
            return false;
        }

    }
</script>
</head>

<div class="col-md-9 well admin-content" id="home">
    <form action="cadastroCriteriosAvaliacao.php" method="POST" id="form" name="frm" onsubmit="return validacao(this)">
        <div class="text-center">
            <h2><ins>Cadastro de Critérios de Avaliação </ins></h2><br></div>
        <b>Categoria do Critério: </b><select name="categoria" id="pais">
            <option value="1" selected="selected">Pesquisa</option>
            <option value="2">Competição Tecnológica</option>
            <option value="3">Inovação no Ensino</option>
            <option value="4">Manutenção e Reforma</option>
            <option value="5">Pequenas Obras</option>
        </select><br><br>
        <b> Nome do Critério: </b> <input type="text" name="criterio" size="50"><br><br>
        <b> Status: </b> <select name="status"> 
            <option value="Ativado" selected="selected">Ativado</option>
            <option value="Desativado">Desativado</option>
        </select><br><br>
        <b> Peso (Valor de 0 a 10): </b> <input type="number"name="peso" min="1" max="10"/> <br><br><br><br>
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
