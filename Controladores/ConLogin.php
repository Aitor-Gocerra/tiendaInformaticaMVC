<?php
require_once __DIR__ . '/../Modelos/ModUsuario.php';

class ConLogin
{

    public $vista = '';

    public function index()
    {
        $this->vista = 'login';
    }

    public function validar()
    {

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $objUsuario = new Usuario();
            $usuario = $objUsuario->validarUsuario($email, $password);

            if ($usuario) {
                // Login correcto
                header("Location: index.php?c=Ordenador&m=listarOrdenadores");
                exit();
            } else {
                // Login incorrecto
                $this->vista = 'login';
                return ['error' => 'Email o contraseña incorrectos'];
            }
        } else {
            // Acceso directo a validar sin datos
            header("Location: index.php?c=Login&m=index");
            exit();
        }
    }
}
?>