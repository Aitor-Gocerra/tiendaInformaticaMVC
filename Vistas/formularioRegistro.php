<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Formulario Registro Producto</title>
	<link rel="stylesheet" href="Vistas/estiloLista.css">
</head>

<body>
    <div class="container">
        <h1>Registro de Producto</h1>
        <form action="index.php?c=Ordenador&m=guardarOrdenador" method="POST">

            <label for="marca">Marca</label>
            <input type="text" name="marca" required>

            <label for="modelo">Modelo (opcional)</label>
            <input type="text" name="modelo">

            <label for="codigoBarras">Codigo de barras</label>
            <input type="text" name="codigoBarras" required>

            <label for="categoria">Categoria</label>
            <select name="categoria">
                <option value="">-- Selecciona una --</option>
                <?php
                foreach ($categorias as $fila) {
                    echo "<option value='{$fila['idCategoria']}'>{$fila['Nombre']}</option>";
                }
                ?>
            </select>

            <label for="caracteristicas">Caracteristicas</label>
            <ul>
                <?php
                foreach ($caracteristicas as $fila) {
                    echo "<li>";
                    echo "<input type='checkbox' name='caracteristicas[]' value='{$fila['idCaracteristica']}'>";
                    echo "<label for='{$fila['Nombre']}'>{$fila['Nombre']}</label>";
                    echo "</li>";
                }

                ?>
            </ul>

            <input type="submit" value="ENVIAR">
        </form>
        <a href="index.php?c=Ordenador&m=listarOrdenadores" class="volver">Volver al listado</a>
    </div>
</body>

</html>