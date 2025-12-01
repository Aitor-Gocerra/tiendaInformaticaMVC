<?php
    require_once __DIR__ . '/../Modelos/ModOrdenador.php';
    require_once __DIR__ . '/../Modelos/ModCategorias.php';
    require_once __DIR__ . '/../Modelos/ModCaracteristicas.php';

    class ConOrdenadores{

        private $accion;
        public $categorias;
        public $caracteristicas;
        public $mensaje;
        public $vista;

        public function __construct(){

            $this->accion = new Ordenador();
            $this->vista = ''; // Inicializar vista vacía

        }

        public function listarOrdenadores(){

            $this->vista = 'vistaListarOrdenadores';
            $ordenadores = $this->accion->listarOrdenadores();
            return ['ordenadores' => $ordenadores];

        }

        /* OBTENER LOS DATOS PARA RELLENAR EL FORMULARIO */

        public function obtenerDatosFormulario(){

            $this->vista = 'formularioRegistro';

            // Aqui obtengo las categorias accediendo a su metodo
            $this->categorias = Categoria::listarCategorias();

            // Aqui las caracteristicas
            $this->caracteristicas = Caracteristicas::listarCaracteristicas();

            return [
                'categorias' => $this->categorias,
                'caracteristicas' => $this->caracteristicas
            ];
        }

        public function guardarOrdenador(){
            
            $this->vista = 'vistaExito';

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

            return ['mensaje' => $this->mensaje];
        }
    }
?>