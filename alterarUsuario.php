<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Alterar Usuário</title>
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

                        $valor = $_POST["valor"];

                        echo "<div class='panel panel-default'>
                                        <table class='table'> <tr>
                                        <th>Dados do Usuário</th>
                                        </tr>  </table></div>";
                        $query = ("select * from usuario where login='" . $valor . "'");
                        $res = mysqli_query($db, $query);
                        while ($consulta = mysqli_fetch_array($res)) {
                            echo "<form action='RespAlterar.php' method='POST' id='form' name='frm'><b><ins> Endereço: </ins></b> <br><br>"
                            . "<b> &nbsp &nbsp &nbsp &nbsp &nbsp País: </b><select name='pais' id='pais'>"
                            . " <option value=" . $consulta['pais'] . " selected='selected'> " . $consulta['pais'] . "</option>
                            <option value='Afeganistão'>Afeganistão</option>
                            <option value='África do Sul'>África do Sul</option>
                            <option value='Albânia'>Albânia</option>
                            <option value='Alemanha'>Alemanha</option>
                            <option value='Andorra'>Andorra</option>
                            <option value='Angola'>Angola</option>
                            <option value='Anguilla'>Anguilla</option>
                            <option value='Antilhas Holandesas'>Antilhas Holandesas</option>
                            <option value='Antárctida'>Antárctida</option>
                            <option value='Antígua e Barbuda'>Antígua e Barbuda</option>
                            <option value='Argentina'>Argentina</option>
                            <option value='Argélia'>Argélia</option>
                            <option value='Armênia'>Armênia</option>
                            <option value='Aruba'>Aruba</option>
                            <option value='Arábia Saudita'>Arábia Saudita</option>
                            <option value='Austrália'>Austrália</option>
                            <option value='Áustria'>Áustria</option>
                            <option value='Azerbaijão'>Azerbaijão</option>
                            <option value='Bahamas'>Bahamas</option>
                            <option value='Bahrein'>Bahrein</option>
                            <option value='Bangladesh'>Bangladesh</option>
                            <option value='Barbados'>Barbados</option>
                            <option value='Belize'>Belize</option>
                            <option value='Benim'>Benim</option>
                            <option value='Bermudas'>Bermudas</option>
                            <option value='Bielorrússia'>Bielorrússia</option>
                            <option value='Bolívia'>Bolívia</option>
                            <option value='Botswana'>Botswana</option>
                            <option value='Brunei'>Brunei</option>
                            <option value='Bulgária'>Bulgária</option>
                            <option value='Burkina Faso'>Burkina Faso</option>
                            <option value='Burundi'>Burundi</option>
                            <option value='Butão'>Butão</option>
                            <option value='Bélgica'>Bélgica</option>
                            <option value='Bósnia e Herzegovina'>Bósnia e Herzegovina</option>
                            <option value='Cabo Verde'>Cabo Verde</option>
                            <option value='Camarões'>Camarões</option>
                            <option value='Camboja'>Camboja</option>
                            <option value='Canadá'>Canadá</option>
                            <option value='Catar'>Catar</option>
                            <option value='Cazaquistão'>Cazaquistão</option>
                            <option value='Chade'>Chade</option>
                            <option value='Chile'>Chile</option>
                            <option value='China'>China</option>
                            <option value='Chipre'>Chipre</option>
                            <option value='Colômbia'>Colômbia</option>
                            <option value='Comores'>Comores</option>
                            <option value='Coreia do Norte'>Coreia do Norte</option>
                            <option value='Coreia do Sul'>Coreia do Sul</option>
                            <option value='Costa do Marfim'>Costa do Marfim</option>
                            <option value='Costa Rica'>Costa Rica</option>
                            <option value='Croácia'>Croácia</option>
                            <option value='Cuba'>Cuba</option>
                            <option value='Dinamarca'>Dinamarca</option>
                            <option value='Djibouti'>Djibouti</option>
                            <option value='Dominica'>Dominica</option>
                            <option value='Egito'>Egito</option>
                            <option value='El Salvador'>El Salvador</option>
                            <option value='Emirados Árabes Unidos'>Emirados Árabes Unidos</option>
                            <option value='Equador'>Equador</option>
                            <option value='Eritreia'>Eritreia</option>
                            <option value='Escócia'>Escócia</option>
                            <option value='Eslováquia'>Eslováquia</option>
                            <option value='Eslovênia'>Eslovênia</option>
                            <option value='Espanha'>Espanha</option>
                            <option value='Estados Federados da Micronésia'>Estados Federados da Micronésia</option>
                            <option value='Estados Unidos'>Estados Unidos</option>
                            <option value='Estônia'>Estônia</option>
                            <option value='Etiópia'>Etiópia</option>
                            <option value='Fiji'>Fiji</option>
                            <option value='Filipinas'>Filipinas</option>
                            <option value='Finlândia'>Finlândia</option>
                            <option value='França'>França</option>
                            <option value='Gabão'>Gabão</option>
                            <option value='Gana'>Gana</option>
                            <option value='Geórgia'>Geórgia</option>
                            <option value='Gibraltar'>Gibraltar</option>
                            <option value='Granada'>Granada</option>
                            <option value='Gronelândia'>Gronelândia</option>
                            <option value='Grécia'>Grécia</option>
                            <option value='Guadalupe'>Guadalupe</option>
                            <option value='Guam'>Guam</option>
                            <option value='Guatemala'>Guatemala</option>
                            <option value='Guernesei'>Guernesei</option>
                            <option value='Guiana'>Guiana</option>
                            <option value='Guiana Francesa'>Guiana Francesa</option>
                            <option value='Guiné'>Guiné</option>
                            <option value='Guiné Equatorial'>Guiné Equatorial</option>
                            <option value='Guiné-Bissau'>Guiné-Bissau</option>
                            <option value='Gâmbia'>Gâmbia</option>
                            <option value='Haiti'>Haiti</option>
                            <option value='Honduras'>Honduras</option>
                            <option value='Hong Kong'>Hong Kong</option>
                            <option value='Hungria'>Hungria</option>
                            <option value='Ilha Bouvet'>Ilha Bouvet</option>
                            <option value='Ilha de Man'>Ilha de Man</option>
                            <option value='Ilha do Natal'>Ilha do Natal</option>
                            <option value='Ilha Heard e Ilhas McDonald'>Ilha Heard e Ilhas McDonald</option>
                            <option value='Ilha Norfolk'>Ilha Norfolk</option>
                            <option value='Ilhas Cayman'>Ilhas Cayman</option>
                            <option value='Ilhas Cocos (Keeling)'>Ilhas Cocos (Keeling)</option>
                            <option value='Ilhas Cook'>Ilhas Cook</option>
                            <option value='Ilhas Feroé'>Ilhas Feroé</option>
                            <option value='Ilhas Geórgia do Sul e Sandwich do Sul'>Ilhas Geórgia do Sul e Sandwich do Sul</option>
                            <option value='Ilhas Malvinas'>Ilhas Malvinas</option>
                            <option value='Ilhas Marshall'>Ilhas Marshall</option>
                            <option value='Ilhas Menores Distantes dos Estados Unidos'>Ilhas Menores Distantes dos Estados Unidos</option>
                            <option value='Ilhas Salomão'>Ilhas Salomão</option>
                            <option value='Ilhas Virgens Americanas'>Ilhas Virgens Americanas</option>
                            <option value='Ilhas Virgens Britânicas'>Ilhas Virgens Britânicas</option>
                            <option value='Ilhas Åland'>Ilhas Åland</option>
                            <option value='Indonésia'>Indonésia</option>
                            <option value='Inglaterra'>Inglaterra</option>
                            <option value='Índia'>Índia</option>
                            <option value='Iraque'>Iraque</option>
                            <option value='Irlanda do Norte'>Irlanda do Norte</option>
                            <option value='Irlanda'>Irlanda</option>
                            <option value='Irã'>Irã</option>
                            <option value='Islândia'>Islândia</option>
                            <option value='Israel'>Israel</option>
                            <option value='Itália'>Itália</option>
                            <option value='Iêmen'>Iêmen</option>
                            <option value='Jamaica'>Jamaica</option>
                            <option value='Japão'>Japão</option>
                            <option value='Jersey'>Jersey</option>
                            <option value='Jordânia'>Jordânia</option>
                            <option value='Kiribati'>Kiribati</option>
                            <option value='Kuwait'>Kuwait</option>
                            <option value='Laos'>Laos</option>
                            <option value='Lesoto'>Lesoto</option>
                            <option value='Letônia'>Letônia</option>
                            <option value='Libéria'>Libéria</option>
                            <option value='Liechtenstein'>Liechtenstein</option>
                            <option value='Lituânia'>Lituânia</option>
                            <option value='Luxemburgo'>Luxemburgo</option>
                            <option value='Líbano'>Líbano</option>
                            <option value='Líbia'>Líbia</option>
                            <option value='Macau'>Macau</option>
                            <option value='Macedônia'>Macedônia</option>
                            <option value='Madagáscar'>Madagáscar</option>
                            <option value='Malawi'>Malawi</option>
                            <option value='Maldivas'>Maldivas</option>
                            <option value='Mali'>Mali</option>
                            <option value='Malta'>Malta</option>
                            <option value='Malásia'>Malásia</option>
                            <option value='Marianas Setentrionais'>Marianas Setentrionais</option>
                            <option value='Marrocos'>Marrocos</option>
                            <option value='Martinica'>Martinica</option>
                            <option value='Mauritânia'>Mauritânia</option>
                            <option value='Maurícia'>Maurícia</option>
                            <option value='Mayotte'>Mayotte</option>
                            <option value='Moldávia'>Moldávia</option>
                            <option value='Mongólia'>Mongólia</option>
                            <option value='Montenegro'>Montenegro</option>
                            <option value='Montserrat'>Montserrat</option>
                            <option value='Moçambique'>Moçambique</option>
                            <option value='Myanmar'>Myanmar</option>
                            <option value='México'>México</option>
                            <option value='Mônaco'>Mônaco</option>
                            <option value='Namíbia'>Namíbia</option>
                            <option value='Nauru'>Nauru</option>
                            <option value='Nepal'>Nepal</option>
                            <option value='Nicarágua'>Nicarágua</option>
                            <option value='Nigéria'>Nigéria</option>
                            <option value='Niue'>Niue</option>
                            <option value='Noruega'>Noruega</option>
                            <option value='Nova Caledônia'>Nova Caledônia</option>
                            <option value='Nova Zelândia'>Nova Zelândia</option>
                            <option value='Níger'>Níger</option>
                            <option value='Omã'>Omã</option>
                            <option value='Palau'>Palau</option>
                            <option value='Palestina'>Palestina</option>
                            <option value='Panamá'>Panamá</option>
                            <option value='Papua-Nova Guiné'>Papua-Nova Guiné</option>
                            <option value='Paquistão'>Paquistão</option>
                            <option value='Paraguai'>Paraguai</option>
                            <option value='País de Gales'>País de Gales</option>
                            <option value='Países Baixos'>Países Baixos</option>
                            <option value='Peru'>Peru</option>
                            <option value='Pitcairn'>Pitcairn</option>
                            <option value='Polinésia Francesa'>Polinésia Francesa</option>
                            <option value='Polônia'>Polônia</option>
                            <option value='Porto Rico'>Porto Rico</option>
                            <option value='Portugal'>Portugal</option>
                            <option value='Quirguistão'>Quirguistão</option>
                            <option value='Quênia'>Quênia</option>
                            <option value='Reino Unido'>Reino Unido</option>
                            <option value='República Centro-Africana'>República Centro-Africana</option>
                            <option value='República Checa'>República Checa</option>
                            <option value='República Democrática do Congo'>República Democrática do Congo</option>
                            <option value='República do Congo'>República do Congo</option>
                            <option value='República Dominicana'>República Dominicana</option>
                            <option value='Reunião'>Reunião</option>
                            <option value='Romênia'>Romênia</option>
                            <option value='Ruanda'>Ruanda</option>
                            <option value='Rússia'>Rússia</option>
                            <option value='Saara Ocidental'>Saara Ocidental</option>
                            <option value='Saint Martin'>Saint Martin</option>
                            <option value='Saint-Barthélemy'>Saint-Barthélemy</option>
                            <option value='Saint-Pierre e Miquelon'>Saint-Pierre e Miquelon</option>
                            <option value='Samoa Americana'>Samoa Americana</option>
                            <option value='Samoa'>Samoa</option>
                            <option value='Santa Helena, Ascensão e Tristão da Cunha'>Santa Helena, Ascensão e Tristão da Cunha</option>
                            <option value='Santa Lúcia'>Santa Lúcia</option>
                            <option value='Senegal'>Senegal</option>
                            <option value='Serra Leoa'>Serra Leoa</option>
                            <option value='Seychelles'>Seychelles</option>
                            <option value='Singapura'>Singapura</option>
                            <option value='Somália'>Somália</option>
                            <option value='Sri Lanka'>Sri Lanka</option>
                            <option value='Suazilândia'>Suazilândia</option>
                            <option value='Sudão'>Sudão</option>
                            <option value='Suriname'>Suriname</option>
                            <option value='Suécia'>Suécia</option>
                            <option value='Suíça'>Suíça</option>
                            <option value='Svalbard e Jan Mayen'>Svalbard e Jan Mayen</option>
                            <option value='São Cristóvão e Nevis'>São Cristóvão e Nevis</option>
                            <option value='São Marino'>São Marino</option>
                            <option value='São Tomé e Príncipe'>São Tomé e Príncipe</option>
                            <option value='São Vicente e Granadinas'>São Vicente e Granadinas</option>
                            <option value='Sérvia'>Sérvia</option>
                            <option value='Síria'>Síria</option>
                            <option value='Tadjiquistão'>Tadjiquistão</option>
                            <option value='Tailândia'>Tailândia</option>
                            <option value='Taiwan'>Taiwan</option>
                            <option value='Tanzânia'>Tanzânia</option>
                            <option value='Terras Austrais e Antárticas Francesas'>Terras Austrais e Antárticas Francesas</option>
                            <option value='Território Britânico do Oceano Índico'>Território Britânico do Oceano Índico</option>
                            <option value='Timor-Leste'>Timor-Leste</option>
                            <option value='Togo'>Togo</option>
                            <option value='Tonga'>Tonga</option>
                            <option value='Toquelau'>Toquelau</option>
                            <option value='Trinidad e Tobago'>Trinidad e Tobago</option>
                            <option value='Tunísia'>Tunísia</option>
                            <option value='Turcas e Caicos'>Turcas e Caicos</option>
                            <option value='Turquemenistão'>Turquemenistão</option>
                            <option value='Turquia'>Turquia</option>
                            <option value='Tuvalu'>Tuvalu</option>
                            <option value='Ucrânia'>Ucrânia</option>
                            <option value='Uganda'>Uganda</option>
                            <option value='Uruguai'>Uruguai</option>
                            <option value='Uzbequistão'>Uzbequistão</option>
                            <option value='Vanuatu'>Vanuatu</option>
                            <option value='Vaticano'>Vaticano</option>
                            <option value='Venezuela'>Venezuela</option>
                            <option value='Vietname'>Vietname</option>
                            <option value='Wallis e Futuna'>Wallis e Futuna</option>
                            <option value='Zimbabwe'>Zimbabwe</option>
                            <option value='Zâmbia'>Zâmbia</option>
                        </select><br><br>"
                            . "<b> &nbsp &nbsp &nbsp &nbsp &nbsp Cidade: </b> <input type='text' name='cidade' value=" . $consulta['cidade'] . ">"
                            . "<b> &nbsp &nbsp &nbsp Estado: </b> <select name='estado' value=" . $consulta['estado'] . "> "
                            . " <option value=" . $consulta['estado'] . " selected='selected'> " . $consulta['pais'] . "</option>"
                            . "<option value='Acre'>Acre</option>
                            <option value='Alagoas'>Alagoas</option>
                            <option value='Amapá'>Amapá</option>
                            <option value='Amazonas'>Amazonas</option>
                            <option value='Bahia'>Bahia</option>
                            <option value='Ceará'>Ceará</option>
                            <option value='Distrito Federal'>Distrito Federal</option>
                            <option value='Espírito Santo'>Espírito Santo</option>
                            <option value='Goiás'>Goiás</option>
                            <option value='Maranhão'>Maranhão</option>
                            <option value='Mato Grosso'>Mato Grosso</option>
                            <option value='Mato Grosso do Sul'>Mato Grosso do Sul</option>
                            <option value='Minas Gerais'>Minas Gerais</option>
                            <option value='Pará'>Pará</option>
                            <option value='Paraíba'>Paraíba</option>
                            <option value='Paraná'>Paraná</option>
                            <option value='Pernambuco'>Pernambuco</option>
                            <option value='Piauí'>Piauí</option>
                            <option value='Rio de Janeiro'>Rio de Janeiro</option>
                            <option value='Rio Grande do Sul'>Rio Grande do Sul</option>
                            <option value='Rio Grande do Norte'>Rio Grande do Norte</option>
                            <option value='Rondônia'>Rondônia</option>
                            <option value='Roraima'>Roraima</option>
                            <option value='Santa Catarina'>Santa Catarina</option>
                            <option value='São Paulo'>São Paulo</option>
                            <option value='Sergipe'>Sergipe</option>
                            <option value='Tocantins'>Tocantins</option>
                        </select><br><br>"
                            . "<b> &nbsp &nbsp &nbsp &nbsp &nbsp Rua: </b> <input type='text' name='rua' value=" . $consulta['rua'] . ">
                        <b> &nbsp &nbsp &nbsp Número: </b> <input type='text' name='numero' value=" . $consulta['numero_residencia'] . ">
                        <b> &nbsp &nbsp &nbsp Bairro: </b> <input type='text' name='bairro' value=" . $consulta['bairro'] . "><br><br><br>"
                            . "<b> Login(Nickname): </b><input type='text' name='login' value=" . $consulta['login'] . "><br><br>
                                      <b> Email: </b> <input type='email' name='email' value=" . $consulta['email'] . "> <br>
                                    <br><b> Senha: </b><input type='senha' name='senha' value=" . $consulta['senha'] . "><br><br>";
                            echo"<INPUT TYPE='hidden' NAME='valor' VALUE=" . $valor . "><INPUT TYPE='hidden' NAME='tip' VALUE='" . $consulta['tipo'] . "'>";
                            if ($consulta['tipo'] == "3")
                                echo "<b> Categoria de Projeto: </b> <select id = 'cat' name='categoria'>
                                 <option value=" . $consulta['id_categoria'] . " selected='selected'> </option>
                                 <option value='1'>Pesquisa</option>
                                 <option value='2'>Competição Tecnológica</option>
                                 <option value='3'>Inovação no Ensino</option>
                                 <option value='4'>Manutenção e Reforma</option>
                                 <option value='5'>Pequenas Obras</option>
                             </select><br><br><br>";
                        }
                        echo"<div class='row'>
                            <div class='col-sm-12'>
                                <div class='text-center'><input type='submit' name='alterar' class='btn btn-primary btn-lg' value='Salvar'></div></div></div></form><br><br>";
                        echo "<p align='center'><a href = 'javascript:history.back()'>Voltar</a><p/>";
                        mysqli_close($db);
                        return 0;
                    }
                    ?>
                </div> 
            </div>		
        </div>
    </body>
</html>

