<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cadastrar Projetos Candidatos</title>
        <link href="css/estilo_pages.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            function validateForm() {
                var a = document.forms["projForm"]["nome"].value;
                var b = document.forms["projForm"]["categoria"].value;
                var c = document.forms["projForm"]["duracao"].value;
                var d = document.forms["projForm"]["valor"].value;
                var e = document.forms["projForm"]["coduser"].value;
                if ((a === null || a === "") || (b === null || b === "") ||
                        (c === null || c === "") || (d === null || d === "")
                        ) {
                    alert("Preencha os campos corretamente, sem deixar espaço em branco!");
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
                    <div class="text-center">
                        <h2><ins>Cadastro de Projetos</ins></h2><br></div>
                    <h4>Digite o seguintes dados para cadastrar seu projeto:</h4>
                    <form method="post" action="cadastrarProjeto.php" name="projForm" onsubmit="return validateForm()">
                        <br><label for="cdu">Código do usuário: </label><input type="text" name="coduser" id="cdu"/>
                        <br/><br/>
                        <label for="nm">Nome: </label><input type="text" name="nome" id="nm"/><br/><br/>
                        <b> Categoria: </b><br/>
                        <div id="cat">
                            <input type="radio" name="categoria" value="1" checked/> Pesquisa<br/>
                            <input type="radio" name="categoria" value="2"/> Competição Tecnológica<br/>
                            <input type="radio" name="categoria" value="3"/> Inovação no Ensino<br/>
                            <input type="radio" name="categoria" value="4"/> Manutenção e Reforma<br/>
                            <input type="radio" name="categoria" value="5"/> Pequenas Obras<br/><br/>
                        </div>
                        <label for="du"> Duração (em meses): </label><input type="number" name="duracao" id="du" min="1"/><br/><br/>
                        <label for="vl"> Valor Previsto: </label><input type="text" name="valor" id="vl"/><br/><br/>
                        <b> Status: </b> <input type="text" value="candidato" name="status" readonly/><br/><br/>
                        <input type="submit" name="Cadastrar" value="Cadastrar"/>
                        <input type="reset" value="Voltar"/>
                    </form>
                </div> 
            </div>		
        </div>
    </body>
</html>