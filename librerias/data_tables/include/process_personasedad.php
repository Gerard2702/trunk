<?php
	if (isset($_POST['tag'])) {
		try {
			$conn = require_once 'connect.php';

			$sql = "SELECT persona.nombre,persona.apellido, TIMESTAMPDIFF(YEAR, persona.fecha_nac, CURDATE()) AS edad,
					nivel_educativo.nombre nivel ,ocupacion.nombre ocu, situacion_laboral.nombre sit
					FROM persona
					INNER JOIN nivel_educativo ON persona.id_niveleducativo=nivel_educativo.id_niveleducativo 
					INNER JOIN ocupacion ON persona.id_ocupacion=ocupacion.id_ocupacion
					INNER JOIN situacion_laboral ON persona.id_sitlaboral=situacion_laboral.id_sitlaboral ";
			$result = $conn->prepare($sql) or die ($sql);

			if (!$result->execute()) return false;

			if ($result->rowCount() > 0) {
				$json = array();
				while ($row = $result->fetch()) {
					$json[] = array(
						'Nombre' => $row['nombre'],
						'Apellido' =>$row['apellido'],
						'Edad' => $row['edad'],
						'Nivel_Educativo' => $row['nivel'],
						'Ocupacion' => $row['ocu'],
						'Sit_Laboral' => $row['sit']
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