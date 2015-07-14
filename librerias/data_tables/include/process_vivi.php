<?php
	if (isset($_POST['tag'])) {
		try {
			$conn = require_once 'connect.php';

			$sql = "SELECT colonia.nombre as colonia, vivienda.direccion as direccion,vivienda.numero numero,
					mat_paredes.nombre as paredes, mat_techo.nombre as techo, mat_piso.nombre as piso,tipo_letrina.nombre as letrina
					FROM vivienda
					INNER JOIN colonia ON vivienda.id_colonia=colonia.id_colonia
					INNER JOIN mat_paredes ON vivienda.id_matparedes=mat_paredes.id_matparedes
					INNER JOIN mat_techo ON vivienda.id_mattecho=mat_techo.id_mattecho
					INNER JOIN mat_piso ON vivienda.id_matpiso=mat_piso.id_matpiso
					INNER JOIN tipo_letrina ON vivienda.id_tipoletrina=tipo_letrina.id_tipoletrina
					group by vivienda.id_vivienda
					order by colonia.nombre";

					

			$result = $conn->prepare($sql) or die ($sql);

			if (!$result->execute()) return false;

			if ($result->rowCount() > 0) {
				$json = array();
				while ($row = $result->fetch()) {
					$json[] = array(
						'Colonia' => $row['colonia'],
						'Direccion' =>$row['direccion'].", ".$row['numero'],
						'Paredes' => $row['paredes'],
						'Techo' => $row['techo'],
						'Piso' => $row['piso'],
						'Letrina' => $row['letrina'],
						);
				}

				$json['success'] = true;
				echo json_encode($json);
			}
		} catch (PDOException $e) {
			echo 'Error: '. $e->getMessage();
		}
	}

?>