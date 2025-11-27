<?php
	require_once 'ModConexion.php';
	
	class Categoria extends Conexion {
		
		public function listarCategorias(){

			$sql = "
				SELECT * FROM categorias;
			";
			
			$stmt = $this->conexion->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return !empty($resultado) ? $resultado : null;
			
		}
	}
?>