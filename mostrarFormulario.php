<?php
    // Proceso 1: Mostrar formulario de registro
    require_once __DIR__ . '/Controladores/ConOrdenador.php';

    $controlador = new ConOrdenadores();

    $controlador->obtenerDatosFormulario();

    include __DIR__ . '/Vistas/formularioRegistro.php';
?>