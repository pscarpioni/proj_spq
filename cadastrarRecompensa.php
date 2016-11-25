<?php include("cabecalho_funcionalidade.php"); ?>
<script type="text/javascript">

    function validacao(frm) {
        if (document.frm.nome.value == "" || document.frm.descricao.value == "" || document.frm.valorMinimo.value == "" || document.frm.valorMaximo.value == "" || document.frm.limite.value == "") {
            alert("Preencha corretamente todos os campos!");
            frm.nome.focus();
            return false;
        }
        if ( document.frm.valorMinimo.value < 0 || document.frm.valorMaximo.value < 0 || document.frm.limite.value < 0 || document.frm.valorMinimo.value > document.frm.valorMaximo.value) {
            alert("Os valores devem ser maiores que 0 e o valor máximo maior que o valor mínimo");
            frm.valorMinimo.focus();
            return false;
        }
        document.frm.submit();
    }
</script>
</head>

<div class="col-md-9 well admin-content" id="home">
    <form action="cadastroRecompensa.php" method="POST" id="form" name="frm">
        <div class="text-center">
            <h2><ins>Atribuir Recompensa a um Projeto </ins></h2><br></div>
        <br> <b> (*) campos de preenchimento obrigatório </b><br><br><br>
        <b> *Nome do Projeto: </b> <input type="text" name="nome" size="50"><br><br>
        <b> *Descrição da Recompensa: </b> <input type="text" name="descricao" size="50"> <br><br>
        <b> *Valor mínimo do financiamento para receber esta recompensa: </b> <input type="number" name="valorMinimo" size="20"> <br><br>
        <b> *Valor máximo do financiamento para receber esta recompensa: </b> <input type="number" name="valorMaximo" size="20"><br><br>
        <b> *Número limite de itens desta recompensa a serem ofertados: </b> <input type="number" name="limite" size="20"><br><br><br>
         <?php echo " <input type='hidden' name='coduser' value=" . $_SESSION["codigo"] . " id='cdu'/> \n"; ?>
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
