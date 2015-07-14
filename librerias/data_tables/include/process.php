<?php
	if (isset($_POST['tag'])) {
		try {
			$conn = require_once 'connect.php';

			$sql = "SELECT vivienda.id_vivienda Id,colonia.nombre Colonia,vivienda.direccion Direccion,
					vivienda.numero Numero,tipo_familia.nombre Tipo_Familia,religion.nombre Religion,vivienda.cant_familia cant_familia,
					tenencia_vivienda.nombre Tenencia,COUNT(persona.nombre) AS cantidad
					FROM vivienda
					INNER JOIN religion ON vivienda.id_religion=religion.id_religion
					INNER JOIN tipo_familia ON vivienda.id_tipofamilia=tipo_familia.id_tipofamilia
					INNER JOIN colonia ON vivienda.id_colonia=colonia.id_colonia
					INNER JOIN tenencia_vivienda ON vivienda.id_tenencia=tenencia_vivienda.id_tenencia
					INNER JOIN persona ON vivienda.id_vivienda = persona.id_vivienda
					GROUP BY Id";

					

			$result = $conn->prepare($sql) or die ($sql);

			if (!$result->execute()) return false;

			if ($result->rowCount() > 0) {
				$json = array();
				while ($row = $result->fetch()) {
					$json[] = array(
						'Colonia' => $row['Colonia'],
						'Direccion' =>$row['Direccion'].", ".$row['Numero'],
						'Tenencia' => $row['Tenencia'],
						'Tipo_Familia' => $row['Tipo_Familia'],
						'Religion' => $row['Religion'],
						'Cant_Familia' => $row['cant_familia'],
						'Personas' => $row['cantidad'],
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