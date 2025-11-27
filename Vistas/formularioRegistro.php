<?php
	require_once __DIR__ . '/../Controladores/ConCaracteristicas.php';
	require_once __DIR__ . '/../Controladores/ConCategoria.php';

	$objCategoria = new ConCategoria();
	$objCaracteristicas = new ConCaracteristicas();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Formulario Registro Producto</title>
		<link rel="stylesheet" href="estiloform.css">
	</head>
	<body>
		<h1>Registro de Producto</h1>
		<form action="../Controladores/ConProductos.php" method="POST">
		
			<label for="marca">Marca</label>
			<input type="text" name="marca" required>
			<br>
			
			<label for="modelo">Modelo (opcional)</label>
			<input type="text" name="modelo">
			<br>
			
			<label for="codigoBarras">Codigo de barras</label>
			<input type="text" name="codigoBarras" required>
			<br>
			
			<label for="categoria">Categoria</label>
			<select name="categoria">
				<option value="">-- Selecciona una --</option>
				<?php
					$objCategoria->cargarCategorias();
				?>
			</select>
			<br>
			
			<label for="caracteristicas">Caracteristicas</label>
				<ul>
					<?php
						$objCaracteristicas->cargarCaracteristicas();
					?>
				</ul>
			
			<input type="submit" value="ENVIAR">
		</form>
	</body>
</html>