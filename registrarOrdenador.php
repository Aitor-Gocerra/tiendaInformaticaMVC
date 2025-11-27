<?php
    // Proceso 2: Registrar ordenador
    require_once __DIR__ . '/Controladores/ConOrdenador.php';

    $controlador = new ConOrdenadores();

    $controlador->guardarOrdenador();

    include __DIR__ . '/Vistas/vistaExito.php';
?>