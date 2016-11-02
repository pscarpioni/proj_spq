<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Entre no Sistema</title>
        <link href="css/estilo_login.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="js/validacoes.js"></script> 
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
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html">Volte para a Página Inicial</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container" style="margin-top:40px">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p align="middle"><strong><ins> Plataforma de Financiamento Coletivo da UNIFEI </ins></strong></p>
                            <?php
                            // Exibir mensagem de erro caso ocorra
                            if (isset($_GET["erro"])) {
                                $erro = $_GET["erro"];
                                echo "<CENTER><FONT color='red'> $erro</FONT></CENTER>";
                            }
                            ?>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="login_val.php" method="POST">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span> 
                                                    <input class="form-control" placeholder="Login" name="txtLogin" type="text" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-lock"></i>
                                                    </span>
                                                    <input class="form-control" placeholder="Senha" name="txtSenha" type="password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Acessar">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="panel-footer ">
                            Não tenho uma conta! <a href="cadastrarUsuarioComum.php" onClick=""> Cadastre-se aqui</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>