<?php include("cabecalho_funcionalidade.php"); ?>
<script type="text/javascript">

    function validacao(frm) {
        if (document.frm.nome.value == "" || document.frm.descricao.value == "" || document.frm.valorMinimo.value == "" || document.frm.valorMaximo.value == "" || document.frm.limite.value == "") {
            alert("Preencha corretamente todos os campos!");
            frm.nome.focus();
            return false;
        }
        if (document.frm.valorMinimo.value < 0 || document.frm.valorMaximo.value < 0 || document.frm.limite.value < 0 || document.frm.valorMinimo.value > document.frm.valorMaximo.value) {
            alert("Os valores devem ser maiores que 0 e o valor máximo maior que o valor mínimo");
            frm.valorMinimo.focus();
            return false;
        }
        document.frm.submit();
    }
</script>
</head>
<div class="col-md-9 well admin-content" id="home">
    <?php
    if (isset($_POST["consultar"])) {
        $db = mysqli_connect("localhost", "root");
        if (!$db) {
            die('Não foi possível Conectar: ' . mysql_error());
        }
        mysqli_select_db($db, "spq");

        $nome_projeto = $_POST["nome"];

        $query = ("select status from projeto where nome_projeto ='" . $nome_projeto . "'");
        $res = mysqli_query($db, $query);
        if ($consulta = mysqli_fetch_array($res)) {
            $status = $consulta['status'];
        }
        if ($status == "Finalizado") {
            $query = ("select projeto.nome_projeto, recompensa.id_recompensa, recompensa.descricao, recompensa.valor_min, recompensa.valor_max, recompensa.limite from recompensa inner join projeto on recompensa.codigo_projeto = projeto.codigo_projeto and projeto.nome_projeto = '" . $_POST["nome"] . "'");

            $res = mysqli_query($db, $query);

            while ($consulta = mysqli_fetch_array($res)) {
                echo"<tr height='50'>
                    <form action = 'respAlteraRecompensa.php' method = 'POST' id = 'form' name = 'frm' onsubmit='return validacao(this);'>
                    <div class = 'text-center'>
                    <h2><ins>Alterar Recompensa </ins></h2><br></div>
                        <b> Nome do Projeto: </b> <input type = 'text' name = 'nome' size = '50' value = " . $consulta['nome_projeto'] . " readonly='readonly'><br><br>
                        <b> Descrição da Recompensa: </b> <input type = 'text' name = 'descricao' size = '50' value = " . $consulta['descricao'] . "> <br><br>
                        <b> Valor mínimo do financiamento: </b> <input type = 'text' name = 'valorMinimo' size = '20' value = " . $consulta['valor_min'] . "> <br><br>
                        <b> Valor máximo do financiamento: </b> <input type = 'text' name = 'valorMaximo' size = '20' value = " . $consulta['valor_max'] . "><br><br>
                        <b> Limite: </b> <input type = 'text' name = 'limite' size = '20' value = " . $consulta['limite'] . ">
                        <input type = 'hidden' name = 'id' value = " . $consulta['id_recompensa'] . ">
                        <div class = 'row'>
                        <div class = 'col-sm-12'>
                            <div class = 'text-center'>
                            <input type = 'submit' name = 'alterar' class = 'btn btn-primary btn-lg' value = 'Alterar' onclick = ''>
                            <input type = 'reset' name = 'reset' class = 'btn btn-primary btn-lg' value = 'Limpar Campos'>
                            </div>
                            </div>
                            </div>
                            </form>";
            }
        } else {
            echo " <h2>As recompensas desse projeto não podem serem alteradas!</h2><br>";
        }
    }
    ?>
</div> 
</body>
</html>
