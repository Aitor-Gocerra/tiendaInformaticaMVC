<?php
    require_once __DIR__ . '/../Modelos/ModOrdenador.php';

    class ConOrdenadores {

        private $accion;

        public function __construct() {
            $this->accion = new Ordenador();
        }

        public function guardarOrdenador() {

            // Recoger datos
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $codigo = $_POST['codigoBarras'];
            $categoria = $_POST['categoria'];
            $caracteristicas = $_POST['caracteristicas'] ?? [];

            // Insertar ordenador
            $idOrdenador = $this->accion->introducirOrdenador(
                $marca, 
                $modelo, 
                $codigo, 
                $categoria
            );

            if (!$idOrdenador) {
                echo "Error al crear el ordenador";
                return;
            }

            // Insertar características vinculadas
            foreach ($caracteristicas as $car) {
                $this->accion->introducirOrdenadorCaracteristicas($idOrdenador, $car);
            }

            // 4. Mostrar mensaje o redireccionar
            echo "Ordenador guardado correctamente con ID: " . $idOrdenador;
        }
    }
