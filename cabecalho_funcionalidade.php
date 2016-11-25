<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Plataforma de Financiamento Coletivo da UNIFEI</title>
        <link href="css/estilo_pages.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function acessa_logout() {
                location.href = 'logout.php';
            }
        </script> 
    </head>
    <body>
        <?php include_once("validar.php"); ?>
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
                    <button type="button" class="btn btn-warning navbar-right" onclick= "acessa_logout();">
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
                            <button class="btn dropdown-toggle list-group-item" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-copy btn-lg"></i>Projetos
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="cadastroProjeto.php">Cadastrar Projeto Candidato</li>
                                <li role="separator" class="divider"></li>
                                <li><a href="consultaProjeto.php">Listar Projetos </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="atualizaProjeto.php">Alterar Projeto </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="apagaProjeto.php">Remover Projeto Candidato</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle list-group-item" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-file btn-lg"></i>Critérios de Avaliação
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="cadastrarCriteriosAvaliacao.php">Cadastrar Critérios de Avaliação </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="consultarCriteriosAvaliacao.php">Listar Critérios de Avaliação </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="alterarCriterioAvaliacaoConsulta.php">Alterar Critérios de Avaliação </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="desativarCriterioConsultar.php">Desativar Critérios de Avaliação </a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle list-group-item" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-pencil btn-lg"></i>Avaliação
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="avaliaProjeto.php">Avaliar Projeto </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="consultaAvaliaProjeto.php">Consultar Avaliação do Projeto </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="alterarNotaCriterio.php">Alterar Avaliação do Projeto </a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle list-group-item" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-ok btn-lg"></i>Projetos Aprovados
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="consultaAprovado.php">Consultar Projetos Aprovados </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="consultaFinalizaProjeto.php">Finalizar Projeto Aprovado </a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle list-group-item" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-credit-card btn-lg"></i>Financiar Projeto
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="cadastroFinanciaProjeto.php">Cadastrar Financiamento </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="cadastraRestricaoFinanciamento.php">Cadastrar Restrição de Financiamento </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="consultaFinanciamento.php">Consultar Financiamento </a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle list-group-item" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-transfer btn-lg"></i>Recompensa
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="cadastrarRecompensa.php">Cadastrar Recompensa </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="consultarRecompensa.php">Consultar Recompensa </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="alterarRecompensa.php">Alterar Recompensa </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="excluirRecompensa.php">Excluir Recompensa </a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle list-group-item" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-arrow-right btn-lg"></i>Valor de Repasse
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="cadastroRepasseFinanceiro.php">Cadastrar Valor de Repasse </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="consultarRepasseFinanceiro.php">Consultar Valor de Repasse </a></li>
                            </ul>
                        </div>
                        <a class="list-group-item" href="geraRelatorioInvestimento.php"><i class="glyphicon glyphicon-list-alt btn-lg"></i>Relatório de Investimentos</a>
                        <a class="list-group-item" href="geraRelatorioCategoria2.php"><i class="glyphicon glyphicon-list btn-lg"></i>Relatório de Projetos por &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Categoria</a>
                    </div>
                </div>
                </body>
                </html>