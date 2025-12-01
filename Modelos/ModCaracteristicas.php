<?php
require_once 'ModConexion.php';

class Caracteristicas extends Conexion
{

	public static function listarCaracteristicas()
	{

		$modelo = new Caracteristicas();
		$sql = "
				SELECT * FROM caracteristicas;
			";

		$stmt = $modelo->conexion->prepare($sql);
		$stmt->execute();

		$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return !empty($resultado) ? $resultado : null;
	}
}
?>