<?php
    include_once("../../librerias/php/conexion.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'Distribucion Por<br>Genero',
            align: 'center',
            verticalAlign: 'middle',
            y: 50
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            name: 'Total',
            innerSize: '50%',
            data: [


         <?php
            $sql=mysql_query("select genero, count(*) as Total from persona 
                             group by genero");
            while($res=mysql_fetch_array($sql)){
            ?>
            
                ['<?php echo $res['genero']; ?>', <?php echo $res['Total'] ?>],
            
            <?php
            }
            ?>  


            ]
        }]
    });
});


		</script>
	</head>
	<body>
<script src="../../librerias/js/highcharts.js"></script>
<script src="../../librerias/js/highcharts-3d.js"></script>
<script src="../../librerias/js/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

	</body>
</html>