<?php
	require_once 'ModConexion.php';
	
	class Caracteristicas extends Conexion{
		
		public function listarCaracteristicas(){

			$sql = "
				SELECT * FROM caracteristicas;
			";

            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return !empty($resultado) ? $resultado : null;
		}
	}
?>