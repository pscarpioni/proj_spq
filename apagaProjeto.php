<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Exclusão de Projetos Candidatos</title>
        <link href="css/estilo_pages.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            function validatecod() {
                var a = document.forms["projForm"]["codigo"].value;
                if (a === null || a === "") {
                    alert("Preencha o campo código, sem deixar espaço em branco!");
                    return false;
                }
            }
        </script>
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
        <div class="container" >
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
                    <h3>Exclua um projeto!</h3>
                    <h4>Digite o código do projeto que deseja excluir</h4>
                    <form method="post" action="apagarProjeto.php" name="projForm" onsubmit="validatecod()">
                        <label for="cd">Código: </label><input type="text" name="codigo" id="cd"/> <br/><br/>
                        <input type="submit" value="Apagar" name="Apagar"/>
                        <input type="reset" value="Voltar"/>
                </div> 
            </div>		
        </div>
    </body>
</html>