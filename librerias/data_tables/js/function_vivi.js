$(document).ready(function() {
	$.ajax({
			url: './include/process_vivi.php',
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
							$("<td />").text(record.Paredes).appendTo(row);
							$("<td />").text(record.Techo).appendTo(row);
							$("<td />").text(record.Piso).appendTo(row);
							$("<td />").text(record.Letrina).appendTo(row);
							row.appendTo("table");
						}
					})
				}

				$('table').dataTable({
					
				})
			}
		});
})