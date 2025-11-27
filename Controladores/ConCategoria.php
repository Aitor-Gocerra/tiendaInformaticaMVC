<?php
    require_once __DIR__ . '/../Modelos/ModCategorias.php';

    class ConCategoria {
        public $accion;

        function __construct(){
            $this->accion = new Categoria();
        }
        
        public function cargarCategorias(){
            
            $resultado = $this->accion->listarCategorias();

            if ($resultado) {
                foreach ($resultado as $fila) {
                    echo "<option value='{$fila['idCategoria']}'>{$fila['Nombre']}</option>";
                }
            }
        }
    }
?>