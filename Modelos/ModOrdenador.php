<?php
require_once 'ModConexion.php';

class Ordenador extends Conexion
{

    public function listarOrdenadores()
    {

        $sql = "
                SELECT * FROM ordenadores
            ";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return !empty($resultado) ? $resultado : null;
    }

    public function visualizarOrdenador($idOrdenador)
    {

        $sql = "
                SELECT * FROM ordenadores
                WHERE idOrdenador = ?;
            ";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$idOrdenador]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return !empty($resultado) ? $resultado : null;
    }

    public function introducirOrdenador($marca, $modelo, $codigoBarras, $idCategoria)
    {

        $sql = "
                INSERT INTO ordenadores (Marca, Modelo, CodigoBarras, idCategoria)
                VALUES (?, ?, ?, ?);
            ";

        $stmt = $this->conexion->prepare($sql);
        /* $stmt->bindParam(1, $marca, PDO::PARAM_STR);
        $stmt->bindParam(2, $modelo, PDO::PARAM_STR);
        $stmt->bindParam(3, $codigoBarras, PDO::PARAM_STR);
        $stmt->bindParam(4, $idCategoria, PDO::PARAM_INT); */

        if ($stmt->execute([$marca, $modelo, $codigoBarras, $idCategoria])) {
            $idUltimo = $this->conexion->lastInsertId();
        }

        return $idUltimo;
    }

    public function introducirOrdenadorCaracteristicas($idUltimo, $valor)
    {

        $sql = "
                INSERT INTO ordenadorcaracteristicas (idOrdenador, idCaracteristica)
                VALUES (?, ?);
            ";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$idUltimo, $valor]);
    }
}