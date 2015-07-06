<?php
    include_once("../php/conexion.php");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

        <script type="text/javascript" src="../js/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Distribucion de Religiones'
        },
        subtitle: {
            text: 'Panorama Global Nuevo Cuscatlan'
        },
        xAxis: {
            categories: [
                'Religiones',
                
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Viviendas'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [



                <?php
                $sql=mysql_query("SELECT nombre, COUNT(*) AS cantidad
                FROM vivienda INNER JOIN religion 
                ON vivienda.id_religion=religion.id_religion
                GROUP BY nombre
                ORDER BY cantidad DESC");
                while($res=mysql_fetch_array($sql)){            
                ?>  

            {name: '<?php echo $res['nombre'] ?>',
            data: [<?php echo $res['cantidad'] ?>] }, 

 

                <?php
                }
                ?>



            ]
    });
});
		</script>
	</head>
	<body>

<script src="../js/highcharts.js"></script>
<script src="../js/highcharts-3d.js"></script>
<script src="../js/exporting.js"></script>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
