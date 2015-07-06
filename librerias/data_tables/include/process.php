<?php
	if (isset($_POST['tag'])) {
		try {
			$conn = require_once 'connect.php';

			$sql = "SELECT colonia.nombre Colonia,vivienda.direccion Direccion,
			vivienda.numero Numero,tipo_familia.nombre Tipo_Familia,religion.nombre Religion
			FROM vivienda 
			INNER JOIN religion ON vivienda.id_religion=religion.id_religion
			INNER JOIN tipo_familia ON vivienda.id_tipofamilia=tipo_familia.id_tipofamilia
			INNER JOIN colonia ON vivienda.id_colonia=colonia.id_colonia";
			$result = $conn->prepare($sql) or die ($sql);

			if (!$result->execute()) return false;

			if ($result->rowCount() > 0) {
				$json = array();
				while ($row = $result->fetch()) {
					$json[] = array(
						'Colonia' => $row['Colonia'],
						'Direccion' =>$row['Direccion'],
						'Numero' => $row['Numero'],
						'Tipo_Familia' => $row['Tipo_Familia'],
						'Religion' => $row['Religion'],
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