<?php include("cabecalho_funcionalidade.php"); ?>
<head>
    <script type="text/javascript">
        function validacao(frm) {
            alert("Sua conta será desativada! Clique em Ok se deseja realmente desativá-la.\n\
            Clique na seta de voltar do navegador, caso contrário.");
            document.frm.submit();            
        }
    </script>
</head>
<div class="col-md-9 well admin-content" id="home" name="frm" onsubmit="return validacao(this)">
    <form action="desativarUsuario.php" method="POST" onsubmit="return validacao(this)">
        <div class="text-center">
            <h2><ins>Desativar Usuário</ins></h2><br></div>

        <input type="text" name="login" class="form-control" placeholder="Digite aqui o login do Usuário"><br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">						
                    <input type="submit" name="desativar" class="btn btn-primary btn-lg" value="Desativar">
                    <input type="reset" name="reset" class="btn btn-primary btn-lg" value="Limpar Campos">
                </div>	
            </div>
        </div>
    </form>
</div> 
</body>
</html>

