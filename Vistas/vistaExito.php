<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro Completado</title>
    <link rel="stylesheet" href="Vistas/estiloLista.css">
</head>

<body>
    <div class="container">
        <div class="mensaje">
            <?php
            // Mensaje del controlador
            if (isset($mensaje)) {
                echo $mensaje;
            }
            ?>
        </div>
        <a href="index.php?c=Ordenador&m=listarOrdenadores" class="volver">Ver lista de ordenadores</a>
    </div>
</body>

</html>