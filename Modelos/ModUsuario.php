<?php
require_once 'ModConexion.php';

class Usuario extends Conexion
{

    public function validarUsuario($email, $password)
    {

        $sql = "
                SELECT * FROM usuarios
                WHERE mail = ? AND contraseña = ?;
            ";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$email, $password]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return !empty($resultado) ? $resultado : null;
    }
}
?>