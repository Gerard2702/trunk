<?php
    include_once("../php/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Document</title>
  	<script type="text/javascript" src="../js/jquery.min.js"></script>
 	<script src="../js/highcharts.js"></script>
	<script src="../js/highcharts-3d.js"></script>


</head>
<body>

<div id="tasa" style="width: 36%; height: 350px; margin: 0 auto;float:left;"></div>
<div id="genero" style="width: 28%; height: 350px; margin: 0 auto;float:left;"></div>
<div id="tenencia" style="width: 36%; height: 350px; margin: 0 auto;float:left;"></div>
		
<div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div>

<div id="nivel" style="width: 50%; height: 350px; margin: 0 auto;float:left;"></div>
<div id="riesgos" style="width: 50%; height: 350px; margin: 0 auto;float:left;"></div>


<script>
	
	$(function () {
	    $('#tasa').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Tasa de Empleo'
        },
        subtitle: {
            text: 'Paramentro Global del Municipio'
        },
        plotOptions: {
            pie: {

                innerSize: 100,
                depth: 45
                
            }


        },
        series: [{
            name: 'Cantidad ',
            data: [


            
            <?php
            $sql=mysql_query("SELECT situacion_laboral.nombre, COUNT(*) AS cantidad
            FROM situacion_laboral INNER JOIN persona 
            ON situacion_laboral.id_sitlaboral=persona.id_sitlaboral
            GROUP BY nombre
            ORDER BY cantidad DESC");
            while($res=mysql_fetch_array($sql)){
            ?>
            
                ['<?php echo $res['nombre']; ?>', <?php echo $res['cantidad'] ?>],
            
            <?php
            }
            ?>  


            ]
        }]
    });

		$('#genero').highcharts({
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


		$('#tenencia').highcharts({

        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Tenencia de Vivienda'
        },
        subtitle: {
            text: 'Panorama Global Nuevo Cuscatlan'
        },



        tooltip: {
            pointFormat: '{series.name}:{point.y} <b>({point.percentage:.1f}%)</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: <b>({point.percentage:.1f}%)</b>'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Total',
            data: [

                <?php
            $sql=mysql_query("SELECT nombre, COUNT(*) AS cantidad
            FROM vivienda INNER JOIN tenencia_vivienda 
            ON vivienda.id_tenencia=tenencia_vivienda.id_tenencia
            GROUP BY nombre
            ORDER BY cantidad asc");
            while($res=mysql_fetch_array($sql)){
            ?>
            
                ['<?php echo $res['nombre']; ?>', <?php echo $res['cantidad'] ?>],
            
            <?php
            }
            ?>  


                                    
            ]
        }]
    });

		
		$(document).ready(function() {
			Highcharts.setOptions({
				global: {
					useUTC: false
				}
			});
		
			var chart;
			$('#nivel').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Nivel Educativo'
        },
        subtitle: {
            text: 'Panorama Global Nuevo Cuscatlan'
        },
        xAxis: {
            categories: [
                'Nivel Educativo',
                
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Personas'
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
                $sql=mysql_query("SELECT nivel_educativo.nombre, COUNT(*) AS cantidad
                FROM nivel_educativo INNER JOIN persona 
                ON nivel_educativo.id_niveleducativo=persona.id_niveleducativo
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

		$(document).ready(function() {
			Highcharts.setOptions({
				global: {
					useUTC: false
				}
			});
		
			var chart;
			$('#riesgos').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Vulnerabilidades'
        },
        subtitle: {
            text: 'Panorama Global Nuevo Cuscatlan'
        },
        xAxis: {
            categories: [
                'Riesgos',
                
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
                $sql=mysql_query("SELECT riesgo.nombre riesgo, COUNT(*) AS cantidad
                                FROM riesgo_vivienda
                                INNER JOIN riesgo
                                ON riesgo.id_riesgo=riesgo_vivienda.id_riesgo
                                GROUP BY nombre
                                ORDER BY cantidad DESC");
                while($res=mysql_fetch_array($sql)){
                ?>  

            {name: '<?php echo $res['riesgo'] ?>',
            data: [<?php echo $res['cantidad'] ?>] }, 

 
                <?php
                }
                ?>



            ]
    });
		});

    });

</script>
	
</body>
</html>