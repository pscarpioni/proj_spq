<!DOCTYPE>
<?php include("cabecalho_funcionalidade.php"); ?>
<html>
    <head>
        <meta charset="utf-8"/>
        <script type="text/javascript">
            function validacao() {
                var a = document.forms["projForm"]["datai"].value;
                var b = document.forms["projForm"]["dataf"].value;
                var e = document.forms["projForm"]["nome"].value;
                if (a === null || a === "") {
                    alert("deve-se digitar uma data inicial");
                    return false;
                }
                if(e === null || e === ""){
                    alert("deve-se digitar um nome de algum projeto");
                    return false;
                }
                var c = new Date(a);
                var d = new Date(b);
                if ((b !== null && b !== "") && d < c) {
                    alert("data final menor que data inicial.");
                    return false;
                    //}
                }
            }
        </script>
    </head>
    <body>
        <div class="col-md-9 well admin-content" id="home">
            <form name="projForm" action="gerarRelatorioInvestimento.php" method="POST" onsubmit="return validacao();">
                <div class="text-center">
                    <h2><ins>Relatório de Investimento</ins></h2><br>
                </div>
                <label for="di">Data inicial: *</label> &nbsp;<input type="date" name="datai" id="di"/>
                <br/><br/>
                <label for="df">Data final:</label>&nbsp;<input type="date" name="dataf" id="df" />
                <br/><br/>
                <label for="df">Nome do projeto: *</label>&nbsp;<input type="text" name="nome" id="df" />
                <br/><br/>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">	
                            <input type="submit" name="gerar" value="Gerar Relatório">
                            <input type="reset" name="reset" value="Limpar Dados">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>