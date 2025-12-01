<?php
    require_once __DIR__ . 'configIndex.php';

    if(!isset($_GET['c'])){
        $_GET['c'] = CONTROLADOR_DEFECTO;
    }

    if(!isset($_GET['m'])){
        $_GET['m'] = MODELO_DEFECTO;
    }

    $rutaControlador = RUTA_CONTROLADORES . $_GET['c'] . '.php';

    $controlador = 'Con' . $_GET['c'];
    $objControlador = new $controlador();

    $datos = []; /* Para guardar los datos que obtenga del controlodaor */

    if(method_exists($objControlador, $_GET['m'])){
        $datos = $objControlador->$_GET['m']();
        /* $datos = $objControlador->{$_GET['m']}();  VERSION CORRECTA Y MAS SEGURA*/

    }

    if($objControlador->vistas != ''){
        if(is_array($datos)){
            extract($datos);
        }
        require_once RUTA_VISTAS . $objControlador->vista . '.php';
    }

?>
