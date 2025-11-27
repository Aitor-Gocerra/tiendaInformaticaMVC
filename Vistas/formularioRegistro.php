<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<title>Formulario Registro Producto</title>
		<link rel="stylesheet" href="estiloform.css">
	</head>

	<body>
		<h1>Registro de Producto</h1>
		<form action="../Controladores/ConRegistro.php" method="POST">

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
					if ($controlador->categorias) {
						foreach ($controlador->categorias as $fila) {
							echo "<option value='{$fila['idCategoria']}'>{$fila['Nombre']}</option>";
						}
					}
				?>
			</select>
			<br>

			<label for="caracteristicas">Caracteristicas</label>
			<ul>
				<?php
					if ($controlador->caracteristicas) {
						foreach ($controlador->caracteristicas as $fila) {
							echo "<li>";
							echo "<input type='checkbox' name='caracteristicas[]' value='{$fila['idCaracteristicas']}'>";
							echo "<label for='{$fila['Nombre']}'>{$fila['Nombre']}</label>";
							echo "</li>";
						}
					}
				?>
			</ul>

			<input type="submit" value="ENVIAR">
		</form>
	</body>

</html>