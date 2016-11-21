
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>PLATAFORMA DE FINANCIAMENTOS - UNIFEI </title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
    </head>

    <body>
        <center>
            <h2>RELATÓRIO DE FINANCIAMENTOS DE PROJETOS</h2>
            <div class="demo-info" style="margin-bottom:10px">
                <div class="demo-tip icon-tip">&nbsp;</div>
            </div>

            <script language="JavaScript">

                document.write("<font color='#000000' size='3' face='arial'>")
                var mydate = new Date()
                var year = mydate.getYear()
                if (year < 2000)
                    year += (year < 1900) ? 1900 : 0
                var day = mydate.getDay()
                var month = mydate.getMonth()
                var daym = mydate.getDate()
                if (daym < 10)
                    daym = "0" + daym
                var dayarray = new Array("Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado")
                var montharray = new Array(" de Janeiro de ", " de Fevereiro de ", " de Março de ", "de Abril de ", "de Maio de ", "de Junho de", "de Julho de ", "de Agosto de ", "de Setembro de ", " de Outubro de ", " de Novembro de ", " de Dezembro de ")
                document.write("Este Relatório foi gerado em:")
                document.write(" " + dayarray[day] + ", " + daym + " " + montharray[month] + " " + year + " ");
                document.write("</b></i></font>")
            </script>
    </body>

</html>
<div class="form-panel">

    <?php
    require_once('jpgraph/jpgraph.php');
    require_once('jpgraph/jpgraph_bar.php');
    // Mensagens de Erro 
    $msg[0] = "Conexão com o banco falhou!";
    $msg[1] = "Não foi possível selecionar o banco de dados!";

// Fazendo a conexão com o servidor MySQL 
    $conexao = @mysql_connect('127.0.0.1', 'root', '') or die($msg[0]);
    mysql_select_db('spq', $conexao) or die($msg[1]);
    ?> 


    <?php
    $query = "SELECT codigo_usuario, valor FROM financiamento ORDER BY codigo_usuario";
    $resultado = @mysql_query($query, $conexao);
    while ($linha = @mysql_fetch_array($resultado)) {
        $dados[] = $linha['codigo_usuario'];
        $labels[] = a;
    }
    $grafico = new Graph(500, 400, 'auto');
    $grafico->SetScale("textint");
    $grafico->title->Set("Demonstrativo Mensal de Caixa");
    $grafico->xaxis->title->Set("Meses");
    $grafico->xaxis->SetTickLabels($labels);
    $grafico->yaxis->title->Set("Valores (R$)");

    $barplot1 = new BarPlot($dados);
    $barplot1->SetFillGradient("#BE81F7", "#E3CEF6", GRAD_HOR);
    $barplot1->SetWidth(30);

    $grafico->Add($barplot1);
    $grafico->Stroke();
    $grafico->Stroke("IMG.png");
    ?> 

</center>

<img src="IMG.png">

</body>
</head>
</html>
