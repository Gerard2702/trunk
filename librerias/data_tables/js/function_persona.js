$(document).ready(function() {
	$.ajax({
			url: './include/process_personasedad.php',
			type: 'post',
			data: { tag: 'getData'},
			dataType: 'json',
			success: function (data) {
				if (data.success) {
					$.each(data, function (index, record) {
						if ($.isNumeric(index)) { 
							var row = $("<tr />");
							$("<td />").text(record.Nombre).appendTo(row);
							$("<td />").text(record.Apellido).appendTo(row);
							$("<td />").text(record.Edad).appendTo(row);
							$("<td />").text(record.Nivel_Educativo).appendTo(row);
							$("<td />").text(record.Ocupacion).appendTo(row);
							$("<td />").text(record.Sit_Laboral).appendTo(row);
							row.appendTo("table");
						}
					})
				}

				$('table').dataTable({
					
				})
			}
		});
})