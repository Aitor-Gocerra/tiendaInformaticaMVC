<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Ordenadores</title>
    <link rel="stylesheet" href="Vistas/estiloLista.css">
</head>
<body>

    <h1>Listado de Ordenadores</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Código de Barras</th>
                <th>ID Categoría</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($datos as $ordenador) {
                    echo "<tr>";
                    echo "<td>" . $ordenador['idOrdenador'] . "</td>";
                    echo "<td>" . $ordenador['Marca'] . "</td>";
                    echo "<td>" . $ordenador['Modelo'] . "</td>";
                    echo "<td>" . $ordenador['CodigoBarras'] . "</td>";
                    echo "<td>" . $ordenador['idCategoria'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

</body>
</html>