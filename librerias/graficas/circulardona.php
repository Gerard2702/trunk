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
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Contents of Highsoft\'s weekly fruit delivery'
        },
        subtitle: {
            text: 'Registros Encontrados'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Registros Encontrados',
            data: [
            
            <?php
            $sql=mysql_query("SELECT nombre, COUNT(*) AS cantidad
            FROM vivienda INNER JOIN religion 
            ON vivienda.id_religion=religion.id_religion
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
});
		</script>
	</head>
	<body>

<script src="../js/highcharts.js"></script>
<script src="../js/highcharts.js"></script>
<script src="../js/exporting.js"></script>


<div id="container" style="height: 400px"></div>
	</body>
</html>
