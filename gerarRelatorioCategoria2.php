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
            text: 'Relatório de Projetos por categorias'
        },
        subtitle: {
            text: 'Passe o mouse nas colunas e veja a porcentagem de investimento em cada categoria. \n\
Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
        },
        xAxis: {
            type: 'Categorias'
        },
        yAxis: {
            title: {
                text: 'Porcentagem de investimentos em projetos (%)'
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
            name: 'Categorias',
            colorByPoint: true,
            data: [{
                name: 'Pesquisa',
                y: 100,//56.33,
                drilldown: 'Pesquisa'
            }, {
                name: 'Competição Tecnológica',
                y: 0,//24.03,
                drilldown: 'Competição Tecnológica'
            }, {
                name: 'Inovação no Ensino',
                y: 0,//10.38,
                drilldown: 'Inovação no Ensino'
            }, {
                name: 'Manutenção e Reforma',
                y: 0,//4.77,
                drilldown: 'Manutenção e Reforma'
            }, {
                name: 'Pequenas Obras',
                y: 0,//0.91,
                drilldown: 'Pequenas Obras'
            }]
        }],
        drilldown: {
            series: [{
                name: 'Pesquisa',
                id: 'Pesquisa',
                data: [
                    [
                        'Acessibilidade Digital',
                        100.00//24.13
                    ]
                ]
            }, {
                name: 'Competição Tecnológica',
                id: 'Competição Tecnológica',
                data: [
                   
                ]
            }, {
                name: 'Inovação no Ensino',
                id: 'Inovação no Ensino',
                data: [
                   
                ]
            }, {
                name: 'Manutenção e Reforma',
                id: 'Manutenção e Reforma',
                data: [
                    
                ]
            }, {
                name: 'Pequenas Obras',
                id: 'Pequenas Obras',
                data: [
                  
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
    //echo"datai inicial = $datai<br>";
    if(isset($_POST["dataf"])){///verifica se a data final está setada, se estiver a variavel recebe a datafinal
        $dataf = $_POST["dataf"];
        //echo"dataf inicial = $dataf<br/>";
    }
    else{
        //se não tiver setado uma data final ele receberá a atual (veirficar)
        $dataf = date("Y-m-d");
        //echo"dataf do else= $dataf<br/>"; ///echo de teste
    }
    //convertendo as datas para o formato do BD
    //date_format($datai,"Y-m-a");
    //$ndatai = date("Y-m-d", strtotime($datai)); //funçaõ converte ano/dia/mes
    //$ndataf = date("Y-m-d", strtotime($dataf)); //função retorn 1970-01-01
    
    
    //teste usando a função converte (deu certo) 
    $ndatai = converte($datai);
    $ndataf = converte($dataf);
    $datai = date("Y-m-d", strtotime($ndatai));
    $dataf = date("Y-m-d", strtotime($ndataf));
    
    /* aqui não tinha dado certo para converter datas
    $ndatai = \DateTime::createFromFormat('d-m-Y', $datai);
    $datai = $ndatai->format('Y-m-d');
    $ndataf = \DateTime::createFromFormat('d/m/Y', $dataf);
        $dataf = $ndataf->format('Y-m-d');
    */
    
    //echos de teste
    //echo"datai = $datai<br/>";
    //echo"dataf = $dataf<br/>";
    
    
    $total = 0;
     $db = mysqli_connect("localhost", "root");
     mysqli_select_db($db, "spq");
     
     //Catgoria: Pesquisa
     ///Problemas com o INNER JOIN (sem o data) aparece duplicado Acessibilidade e EVM
     /// com o AND data não aparece nada
     /*
     $result = "SELECT nome_projeto 'a.nome_projeto', valor 'b.valor' FROM projeto a "
             . "INNER JOIN financiamento b ON a.id_categoria = b.id_categoria WHERE a.id_categoria = 1";
             //. "AND b.data_financiamento BETWEEN '$datai' AND '$dataf'";
             //. "AND a.codigo_projeto = b.codigo_projeto";
     
     
     //teste com o UNION mesmo problema que o INNER no caso da data
     /*
     $result = "SELECT nome_projeto 'a.nome_projeto' FROM projeto a WHERE a.id_categoria = 1"
             . "UNION ALL"
             . "SELECT valor 'b.valor' FROM financiamento b WHERE a.id_categoria = b.id_categoria";
             //. "b.data_financiamento BETWEEN '$datai' AND"
             //. "'$dataf'";
     */
     
     $result = "select nome_projeto 'p.nome_projeto', valor 'f.valor' from financiamento f inner join"
             . " projeto p on p.codigo_projeto = f.codigo_projeto and f.id_categoria = 1 "
             . "WHERE f.data_financiamento BETWEEN '$datai' and '$dataf'";
     //echo $result;
     
     $res1 = mysqli_query($db, $result);
    
     echo"<table>";
     echo"<tr>";
        echo"<th>Pesquisa</th>";
        echo"<th>Valor investido</th>";
     echo"</tr>";
     while ($consulta = mysqli_fetch_array($res1,MYSQLI_ASSOC)) {
         echo"<tr>";
         echo"<td>".$consulta["p.nome_projeto"]."</td>";
         echo"<td>R$ ".$consulta["f.valor"]."</td>";
         $total += $consulta["f.valor"];
         echo"</tr>";
     }
     echo"<tr>";
     echo"<th>TOTAL</th>";
     echo"<th>R$ $total</th>";
     echo"</tr>";
     echo"</table>";
     echo"<br><br>";
     
     
     
     ///tentei criar uma consutla que daria certo e replica nas outras depois! 
     //Categoria: Competição tecnologia:
     $total = 0;
      $result = "select nome_projeto 'p.nome_projeto', valor 'f.valor' from financiamento f inner join"
             . " projeto p on p.codigo_projeto = f.codigo_projeto and f.id_categoria = 2 "
             . "WHERE f.data_financiamento BETWEEN '$datai' and '$dataf'";
     $res1 = mysqli_query($db, $result);
     echo"<table>";
     echo"<tr>";
        echo"<th>Competição Tecnológica</th>";
        echo"<th>Valor investido</th>";
     echo"</tr>";
     while ($consulta = mysqli_fetch_array($res1,MYSQLI_ASSOC)) {
         echo"<tr>";
         echo"<td>".$consulta["nome_projeto"]."</td>";
         echo"<td>R$ ".$consulta["valor_projeto"]."</td>";
         $total += $consulta["valor_projeto"];
         echo"</tr>";
     }
     echo"<tr>";
     echo"<td>TOTAL</td>";
     echo"<td>R$ $total</td>";
     echo"</tr>";
     echo"</table>";
     echo"<br><br>";
     //Categoria: Inovação do ensino:
     $total = 0;
      $result = "select nome_projeto 'p.nome_projeto', valor 'f.valor' from financiamento f inner join"
             . " projeto p on p.codigo_projeto = f.codigo_projeto and f.id_categoria = 3 "
             . "WHERE f.data_financiamento BETWEEN '$datai' and '$dataf'";
     $res1 = mysqli_query($db, $result);
     echo"<table>";
     echo"<tr>";
        echo"<th>Inovação no Ensino</th>";
        echo"<th>Valor investido</th>";
     echo"</tr>";
     while ($consulta = mysqli_fetch_array($res1,MYSQLI_ASSOC)) {
         echo"<tr>";
         echo"<td>".$consulta["nome_projeto"]."</td>";
         echo"<td>R$ ".$consulta["valor_projeto"]."</td>";
         $total += $consulta["valor_projeto"];
         echo"</tr>";
     }
     echo"<tr>";
     echo"<td>TOTAL</td>";
     echo"<td>R$ $total</td>";
     echo"</tr>";
     echo"</table>";
     echo"<br><br>";
      //Categoria: manutenção e reforma:
     $total = 0;
     $result = "select nome_projeto 'p.nome_projeto', valor 'f.valor' from financiamento f inner join"
             . " projeto p on p.codigo_projeto = f.codigo_projeto and f.id_categoria = 4 "
             . "WHERE f.data_financiamento BETWEEN '$datai' and '$dataf'";
     $res1 = mysqli_query($db, $result);
     echo"<table>";
     echo"<tr>";
        echo"<th>Manutenção e Reforma</th>";
        echo"<th>Valor investido</th>";
     echo"</tr>";
     while ($consulta = mysqli_fetch_array($res1,MYSQLI_ASSOC)) {
         echo"<tr>";
         echo"<td>".$consulta["nome_projeto"]."</td>";
         echo"<td>R$ ".$consulta["valor_projeto"]."</td>";
         $total += $consulta["valor_projeto"];
         echo"</tr>";
     }
     echo"<tr>";
     echo"<td>TOTAL</td>";
     echo"<td>R$ $total</td>";
     echo"</tr>";
     echo"</table>";
     echo"<br><br>";
      //Categoria: pequenas obras:
     $total = 0;
     $result = "select nome_projeto 'p.nome_projeto', valor 'f.valor' from financiamento f inner join"
             . " projeto p on p.codigo_projeto = f.codigo_projeto and f.id_categoria = 5 "
             . "WHERE f.data_financiamento BETWEEN '$datai' and '$dataf'";
     $res1 = mysqli_query($db, $result);
     echo"<table>";
     echo"<tr>";
        echo"<th>Pequenas Obras</th>";
        echo"<th>Valor investido</th>";
     echo"</tr>";
     while ($consulta = mysqli_fetch_array($res1,MYSQLI_ASSOC)) {
         echo"<tr>";
         echo"<td>".$consulta["nome_projeto"]."</td>";
         echo"<td>R$ ".$consulta["valor_projeto"]."</td>";
         $total += $consulta["valor_projeto"];
         echo"</tr>";
     }
     echo"<tr>";
     echo"<td>TOTAL</td>";
     echo"<td>R$ $total</td>";
     echo"</tr>";
     echo"</table>";
}
?>
</div>
