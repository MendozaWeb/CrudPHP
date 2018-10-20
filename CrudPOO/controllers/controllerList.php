<?php
declare (strict_types = 1);
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if ($_POST) {
    require_once '../models/Personas.php';
    $persona = new Personas();
    $data    = array();
    // Paginación
    $paginacion  = array();
    // Para versiones de PHP inferiores a la 7
    // $pagina      = isset($_POST['pagina']) ? $_POST['pagina'] : 1;
    $pagina      = $_POST['pagina'] ?? 1;
    // Para versiones de PHP inferiores a la 7
    // $termino     = isset($_POST['termino']) ? $_POST['termino'] : '';
    $termino     = $_POST['termino'] ?? '';
    $paginacion  = $persona->getPagination();
    $filasTotal  = $paginacion['filasTotal'];
    $filasPagina = $paginacion['filasPagina'];

    $empezarDesde = ($pagina - 1) * $filasPagina;

    if ($termino != '') {
        $data = $persona->getSearch($termino);
    } else {
        $data = $persona->getAll($empezarDesde, $filasPagina);
    }
    echo $persona->showTable($data);
} else {
    // Retornar a inicio
    header('Location:../');
}
