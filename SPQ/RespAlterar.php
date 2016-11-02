<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cadastrar Usuário</title>
        <link href="css/estilo_pages.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="padding-top: 5px;">
                        <img alt="logo" src="img/1.png">
                    </a>
                    <h3 class="navbar-text">Plataforma de Financiamento Coletivo da UNIFEI</h3>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-top:10px;">
                    <button type="button" class="btn btn-warning navbar-right">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Sair
                    </button>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <        <div class="container" >
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <div class="list-group">
                        <a class="list-group-item" href="home_adm.php"><i class="glyphicon glyphicon-home btn-lg"></i>Página Inicial</a>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle list-group-item" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-user btn-lg"></i>Usuários
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="cadastrarUsuario.php">Cadastrar Usuário </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="consultaUsuario.php">Consultar Dados do Usuário </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="alterarUsuarioConsulta.php">Alterar Dados do Usuário </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="desativarUserConsultar.php">Desativar Usuário </a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle list-group-item" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-copy btn-lg"></i>Projetos Candidatos
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="cadastroProjeto.php">Cadastrar Projeto Candidato </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="consultaProjeto.php">Listar Projetos Candidatos </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="atualizaProjeto.php">Alterar Projeto Candidato </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="apagaProjeto.php">Remover Projeto Candidato </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 well admin-content" id="home">
                    <?php
                    $db = mysqli_connect("localhost", "root");

                    if (!$db) {
                        die('Não foi possível Conectar: ' . mysql_error());
                    }
                    mysqli_select_db($db, "spq");
                    $pais = $_POST["pais"];
                    $cidade = $_POST["cidade"];
                    $estado = $_POST["estado"];
                    $rua = $_POST["rua"];
                    $numero = $_POST["numero"];
                    $bairro = $_POST["bairro"];
                    $email = $_POST["email"];
                    $login = $_POST["login"];
                    $senha = $_POST["senha"];
                    $valor = $_POST["valor"];
                    $tipo = $_POST["tip"];

                    if ($tipo == "3") {
                        $cat = $_POST["categoria"];
                        $sql = "update usuario set login='" . $login . "',pais='" . $pais . "',cidade='" . $cidade . "',estado='" . $estado . "',"
                                . "rua='" . $rua . "',numero_residencia='" . $numero . "',"
                                . "bairro='" . $bairro . "',email='" . $email . "',senha='" . $senha . "',id_categoria='" . $cat . "' WHERE login='" . $valor . "'";
                    } else {
                        $sql = "update usuario set login='" . $login . "',pais='" . $pais . "',cidade='" . $cidade . "',estado='" . $estado . "',"
                                . "rua='" . $rua . "',numero_residencia='" . $numero . "',"
                                . "bairro='" . $bairro . "',email='" . $email . "',senha='" . $senha . "' WHERE login='" . $valor . "'";
                    }

                    $result=mysqli_query($db, $sql); /* executa a query */
                    if ($result) {
                        echo "<script>alert('Usuário $login alterado com sucesso!'); window.location.href='home_adm.php' </script>";
                    } else {
                        echo json_encode(array('msg' => 'Erro ao atualizar dados.'));
                    }
                    mysqli_close($db);
                    ?>
                </div> 
            </div>		
        </div>
    </body>
</html>