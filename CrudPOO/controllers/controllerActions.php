<?php
declare (strict_types = 1);
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if ($_POST) {
    require_once '../models/Personas.php';
    $persona = new Personas();
    $opcion  = $_POST['opcion'];
    $id      = intval($_POST['id']);
    $nombre  = $_POST['nombre'];
    $pais    = $_POST['pais'];
    $edad    = $_POST['edad'];
    if (!empty($opcion)) {
        switch ($opcion) {
            case 'insertar':
                if (!empty($nombre) && !empty($pais) && !empty($edad)) {
                    $persona->insert($nombre, $pais, $edad);
                } else {
                    echo 'VACIO';
                }
                break;
            case 'editar':
                if (!empty($id) && !empty($nombre) && !empty($pais) && !empty($edad)) {
                    $persona->edit($id, $nombre, $pais, $edad);
                } else {
                    echo 'VACIO';
                }
                break;
            case 'eliminar':
                if (!empty($id)) {
                    $persona->delete($id);
                } else {
                    echo 'VACIO';
                }
                break;

        }
    } else {
        echo $opcion;
    }

} else {
    // Retornar
    header('Location:../');
}
