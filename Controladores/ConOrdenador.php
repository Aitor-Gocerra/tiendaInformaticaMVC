<?php
require_once __DIR__ . '/../Modelos/ModOrdenador.php';

class ConOrdenadores
{
    private $accion;

    public function __construct()
    {
        $this->accion = new Ordenador();
    }

    public function listarOrdenadores()
    {
        return $this->accion->listarOrdenadores();
    }

    public function guardarOrdenador()
    {

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
            // Si falla, podríamos retornar false o manejarlo de otra forma
            return false;
        }

        // Insertar características vinculadas
        foreach ($caracteristicas as $car) {
            $this->accion->introducirOrdenadorCaracteristicas($idOrdenador, $car);
        }

        // Retornar el ID en lugar de hacer echo
        return $idOrdenador;
    }
}
?>