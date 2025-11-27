<?php
require_once 'Controladores/ConOrdenador.php';

// Instanciar el controlador
$controlador = new ConOrdenadores();

// Obtener los datos
$datos = $controlador->listarOrdenadores();

// Cargar la vista
include 'Vistas/vistaListarOrdenadores.php';
?>