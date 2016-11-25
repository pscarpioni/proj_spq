<?php include("cabecalho_funcionalidade.php"); ?>
<link href="css/tabela.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<div class="col-md-9 well admin-content" id="home">
<div id="container" style="min-width: 310px; height: 400px; margin: 100px 100px"></div>

<script type="text/javascript">
$(function () {
    // Create the chart
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Relatório de Investimentos Financeiros'
        },
        subtitle: {
            text: 'Passe o mouse nas colunas e veja a porcentagem de investimento em cada dia. \n\
Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
        },
        xAxis: {
            type: 'Dias'
        },
        yAxis: {
            title: {
                text: 'Porcentagem de investimentos ao dia (%)'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Acessibilidade',
            colorByPoint: true,
            data: [{
                name: '13/11/2016',
                y: 0,//56.33,
                drilldown: '13/11/2016'
            }, {
                name: '14/11/2016',
                y: 7.48,//24.03,
                drilldown: '14/11/2016'
            }, {
                name: '15/11/2016',
                y: 91.74,//10.38,
                drilldown: '15/11/2016'
            }, {
                name: '16/11/2016',
                y: 0.75,//4.77,
                drilldown: '16/11/2016'
            }, {
                name: '17/11/2016',
                y: 0.05,//0.91,
                drilldown: '17/11/2016'
            }]
        }],
        drilldown: {
            series: [{
                name: '13/11/2016',
                id: '13/11/2016',
                data: [
                    [
                        'Acessibilidade',
                        0.00//24.13
                    ]
                ]
            }, {
                name: '14/11/2016',
                id: '14/11/2016',
                data: [
                    'Acessibilidade',
                    7.48
                ]
            }, {
                name: '15/11/2016',
                id: '15/11/2016',
                data: [
                    'Acessibilidade',
                    91.74
                ]
            }, {
                name: '16/11/2016',
                id: '16/11/2016',
                data: [
                    'Acessibilidade',
                    0.75
                ]
            }, {
                name: '17/11/2016',
                id: '17/11/2016',
                data: [
                    'Acessibilidade',
                    0.05
                ]
            }]
        }
    });
});
</script>
<?php
function converte($data){
    if(strstr($data, "/")){
        $d = explode("/", $data);
        $rdata = "$d[2]-$d[1]-$d[0]";
        return $rdata;
    }    
}

?>
<?php
if (isset($_POST["gerar"])) {
    $datai = $_POST["datai"];
    $nome = $_POST["nome"];
    if(isset($_POST["dataf"])){///verifica se a data final está setada, se estiver a variavel recebe a datafinal
        $dataf = $_POST["dataf"];
    }
    else{
        //se não tiver setado uma data final ele receberá a atual (veirficar)
        $dataf = date("Y-m-d");
    }
    $ndatai = converte($datai);
    $ndataf = converte($dataf);
    $datai = date("Y-m-d", strtotime($ndatai));
    $dataf = date("Y-m-d", strtotime($ndataf));
    $total = 0;
     $db = mysqli_connect("localhost", "root");
     mysqli_select_db($db, "spq");
     $result = "SELECT nome_projeto 'a.nome_projeto', data_financiamento 'b.data_financiamento', valor 'b.valor'"
             . " FROM projeto a INNER JOIN financiamento b ON a.codigo_projeto = b.codigo_projeto WHERE"
             . " b.data_financiamento BETWEEN '$datai' and '$dataf' and"
             . " a.nome_projeto LIKE '%$nome%'";
     $res1 = mysqli_query($db, $result);
     echo"<table>";
     echo"<tr>";
        echo"<th>Projeto</th>";
        echo"<th>Valor investido</th>";
        echo"<th>Data de Investimento</th>";
     echo"</tr>";
     while ($consulta = mysqli_fetch_array($res1,MYSQLI_ASSOC)) {
         echo"<tr>";
         echo"<td>".$consulta["a.nome_projeto"]."</td>";
         echo"<td>R$ ".$consulta["b.valor"]."</td>";
         echo"<td>".$consulta["b.data_financiamento"]."</td>";
         $total += $consulta["b.valor"];
         echo"</tr>";
     }
     echo"<tr>";
        echo"<th>TOTAL</th>";
        echo"<th>RS $total</th>";
     echo"</tr>";
     echo"</table>";
     echo"<br><br>";
}

?>
</div>