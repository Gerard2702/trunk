$(document).ready(function() {
	$.ajax({
			url: './include/process.php',
			type: 'post',
			data: { tag: 'getData'},
			dataType: 'json',
			success: function (data) {
				if (data.success) {
					$.each(data, function (index, record) {
						if ($.isNumeric(index)) { 
							var row = $("<tr />");
							$("<td />").text(record.Colonia).appendTo(row);
							$("<td />").text(record.Direccion).appendTo(row);
							$("<td />").text(record.Numero).appendTo(row);
							$("<td />").text(record.Tipo_Familia).appendTo(row);
							$("<td />").text(record.Religion).appendTo(row);
							row.appendTo("table");
						}
					})
				}

				$('table').dataTable({
					"bJQueryUI": true,
				})
			}
		});
})