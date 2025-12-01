<?php
require_once __DIR__ . '/../Modelos/ModConexion.php';

class Categoria extends Conexion
{

	public static function listarCategorias()
	{

		$modelo = new Categoria();
		$sql = "
				SELECT * FROM categorias;
			";

		$stmt = $modelo->conexion->prepare($sql);
		$stmt->execute();

		$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return !empty($resultado) ? $resultado : null;

	}
}
?>