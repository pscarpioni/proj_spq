<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Consultar Usuário</title>
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
                    <?php
                    if (isset($_POST["consultar"])) {
                        $db = mysqli_connect("localhost", "root");
                        if (!$db) {
                            die('Não foi possível Conectar: ' . mysql_error());
                        }
                        mysqli_select_db($db, "spq");

                        if (empty($_POST["valor"])) {
                            echo "<div class='panel panel-default'>
                                    <table class='table'> <tr>
                                    <th>Nome</th>
                                    <th>Login</th>
                                    </tr> ";
                            $query = ("select * from usuario ORDER BY usuario.nome ASC");
                            $res = mysqli_query($db, $query);
                                     while ($consulta = mysqli_fetch_array($res)) {
                            echo"<tr>
                                        <td><a href='dados_user_consulta.php?busca=" . $consulta['login'] . "'>" . $consulta['nome'] . "</a></td>
                                        <td>" . $consulta['login'] . "</td>                                    
                                        </tr>";
                            }
                            echo" </table></div>";
                            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
                            mysqli_close ( $db );
                            return 0;
                        }
                        
                        $valor = $_POST["valor"];
                        
                        if ($_POST["radio"]=="nome") {
                            echo "<div class='panel panel-default'>
                                        <table class='table'> <tr>
                                        <th>Dados do Usuário</th>
                                        </tr>  </table></div>";
                            $query = ("select * from usuario where nome='" . $valor . "'");
                                $res = mysqli_query ( $db, $query);
                            while ($consulta = mysqli_fetch_array($res)) {
                            echo"<b> Código: </b>" . $consulta['codigo_usuario'] . "<br>
                                    <b> Nome Completo: </b>" . $consulta['nome'] . "<br>"
                                            . " <b> Login: </b>" . $consulta['login'] . "<br>"
                                    . "<b> País: </b>" . $consulta['pais'] . "<br>"
                                    . "<b> Estado: </b>" . $consulta['estado'] . "<br>"
                            . "<b> Cidade: </b>" . $consulta['cidade'] . "<br>"
                            . "<b> Data de nascimento: </b>" . $consulta['data_nascimento'] . "<br>"
                            . "<b> Email: </b>" . $consulta['email'] . "<br>"
                            . "<b> Status: </b>" . $consulta['status'] . "<br>"
                                    . "<b> Tipo de usuário: </b>" . $consulta['tipo'] . "<br><br>";
                                     if ($consulta['tipo'] == "3")
                            echo "<b> Categoria de projeto: </b>" . $consulta['id_categoria'] . "<br><br>";
                            }
                            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
                            mysqli_close ( $db);
                            return 0;
                        }
                          if ($_POST["radio"]=="login") { 
                            echo "<div class='panel panel-default'>
                                        <table class='table'> <tr>
                                        <th>Dados do Usuário</th>
                                        </tr>  </table></div>";
                            $query = ("select * from usuario where login='" . $valor . "'");
                                $res = mysqli_query ( $db, $query);
                            while ($consulta = mysqli_fetch_array($res)) {
                            echo"<b> Código: </b>" . $consulta['codigo_usuario'] . "<br>
                                    <b> Nome Completo: </b>" . $consulta['nome'] . "<br>"
                                            . " <b> Login: </b>" . $consulta['login'] . "<br>"
                                    . "<b> País: </b>" . $consulta['pais'] . "<br>"
                                    . "<b> Estado: </b>" . $consulta['estado'] . "<br>"
                            . "<b> Cidade: </b>" . $consulta['cidade'] . "<br>"
                            . "<b> Data de nascimento: </b>" . $consulta['data_nascimento'] . "<br>"
                            . "<b> Email: </b>" . $consulta['email'] . "<br>"
                            . "<b> Status: </b>" . $consulta['status'] . "<br>"
                                    . "<b> Tipo de usuário: </b>" . $consulta['tipo'] . "<br><br>";
                                     if ($consulta['tipo'] == "3")
                            echo "<b> Categoria de projeto: </b>" . $consulta['id_categoria'] . "<br><br>";
                            }
                            echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
                            mysqli_close ( $db);
                            return 0;
                        }                    
                    }
                    ?>
                </div> 
            </div>		
        </div>
    </body>
</html>