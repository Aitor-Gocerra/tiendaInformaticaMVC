<?php

    require_once __DIR__ . '/../Controladores/ConOrdenador.php';

    $controlador = new ConOrdenadores();

    // Guardamos el ordenador (asumimos que la función devuelve true o el ID si va bien)
    $resultado = $controlador->guardarOrdenador();

    if($resultado->num_rows() > 0) {
        // Incluimos la vista de éxito
        include __DIR__ . '/../Vistas/vistaExito.php';
    } else {
        echo "Error al guardar el ordenador";
    }
    
?>