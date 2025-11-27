<?php
    require_once __DIR__ . '/../Modelos/ModCaracteristicas.php';

    class ConCaracteristicas {
        public $accion;

        function __construct(){
            $this->accion = new Caracteristicas();
        }
        
        public function cargarCaracteristicas(){

            $resultado = $this->accion->listarCaracteristicas();

            if($resultado){
                foreach($resultado as $fila){
                    echo "<li>";
                    echo "<input type='checkbox' name='caracteristicas[]' value='{$fila['idCaracteristicas']}'>";
                    echo "<label for='{$fila['Nombre']}'>{$fila['Nombre']}</label>";
                    echo "</li>";
                }
            }
        }
    }
?>