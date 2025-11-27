<?php
    require_once __DIR__ . '/../Modelos/ModOrdenador.php';
    require_once __DIR__ . '/../Modelos/ModCategorias.php';
    require_once __DIR__ . '/../Modelos/ModCaracteristicas.php';

    class ConOrdenadores{

        private $accion;
        public $categorias;
        public $caracteristicas;
        public $mensaje;

        public function __construct(){

            $this->accion = new Ordenador();
        }

        public function listarOrdenadores(){

            return $this->accion->listarOrdenadores();
        }

        /* OBTENER LOS DATOS PARA RELLENAR EL FORMULARIO */

        public function obtenerDatosFormulario(){
            // Instanciar las clases de modelo
            $modeloCategoria = new Categoria();
            $modeloCaracteristicas = new Caracteristicas();
            
            // Obtener datos usando métodos de instancia
            $this->categorias = $modeloCategoria->listarCategorias();
            $this->caracteristicas = $modeloCaracteristicas->listarCaracteristicas();
        }

        public function guardarOrdenador(){

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

            if ($idOrdenador) {
                
                foreach ($caracteristicas as $car) {
                    $this->accion->introducirOrdenadorCaracteristicas($idOrdenador, $car);
                }
                
                // Mensaje Exito
                $this->mensaje = "Ordenador guardado correctamente con ID: " . $idOrdenador;
            } else {
                // Mensaje de error
                $this->mensaje = "Error al guardar el ordenador";
            }
        }
    }
?>