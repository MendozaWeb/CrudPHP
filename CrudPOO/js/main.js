$(function() {
    var input_busqueda = $('#txt_busqueda');
    listar('');
    tipoListado(input_busqueda);
    crearPaginacion();
    ejecutarAccion();
});
// Quitar la alerta del Modal
var quitarAlerta = () => {
    $('#alerta').html('');
}
// Limpiar el cuadro de búsqueda
var limpiarBusqueda = () => {
    $('#txt_busqueda').val('');
}
// Desbloquear el botón 'Guardar Cambios'
var desbloquearBoton = () => {
    $('#btn_guardar_cambios').removeAttr('disabled');
}
// Mostrar una alerta de acuerdo a la respuesta del servidor
var alerta = (opcion, respuesta) => {
    let mensaje = '';
    switch (opcion) {
        case 'insertar':
            mensaje = 'Usuario insertado correctamente.';
            break;
        case 'editar':
            mensaje = 'Información de usuario modificada con exito.';
            break;
        case 'eliminar':
            mensaje = 'Usuario eliminado exitosamente.';
            break;
    }
    switch (respuesta) {
        case 'BIEN':
            $('#alerta').html('<div class="alert alert-success text-center"><strong>¡BIEN! </strong>' + mensaje + '</div>');
            break;
        case 'ERROR':
            $('#alerta').html('<div class="alert alert-danger text-center"><strong>¡ERROR! </strong>Solicitud no procesada.</div>');
            break;
        case 'IGUAL':
            $('#alerta').html('<div class="alert alert-info text-center"><strong>¡ADVERTENCIA! </strong>Ha enviado los mismos datos.</div>');
            break;
        case 'VACIO':
            $('#alerta').html('<div class="alert alert-danger text-center"><strong>¡ERROR! </strong>No puede enviar datos vacíos.</div>');
            break;
    }
}
// ----------------------------------------------------Ejecutar la acción seleccionada por el usuario----------------------------------------------------
var ejecutarAccion = () => {
    $('#btn_guardar_cambios').on('click', function() {
        let opcion = $('#opcion').val();
        let id = $('#id').val();
        let nombre = $('#txt_nombre').val();
        let pais = $('#txt_pais').val();
        let edad = $('#txt_edad').val();
        $.ajax({
            beforeSend: function() {
                $('#gif').toggleClass('d-none');
            },
            url: 'controllers/controllerActions.php',
            method: 'POST',
            data: {
                opcion: opcion,
                id: id,
                nombre: nombre,
                pais: pais,
                edad: edad
            },
        }).done(function(data) {
            $('#gif').toggleClass('d-none');
            alerta(opcion, data);
            listar('');
            crearPaginacion();
            if (opcion == 'eliminar' && data == 'BIEN') {
                $('#btn_guardar_cambios').attr('disabled', true);
            }
            if (opcion == 'insertar' && data == 'BIEN') {
                $('#id').val('');
                $('#txt_nombre').val('');
                $('#txt_pais').val('');
                $('#txt_edad').val('');
            }
        });
    });
}
// -------------------------------------------------------------------Preparar datos-------------------------------------------------------------------
var prepararDatos = () => {
    let values = [];
    // Evento botón editar
    $('#table .editar').on('click', function() {
        values = ciclo($(this));
        $('#opcion').val('editar');
        $('#id').val(values[0]);
        $('#txt_nombre').val(values[1]).removeAttr('disabled');
        $('#txt_pais').val(values[2]).removeAttr('disabled');
        $('#txt_edad').val(values[3]).removeAttr('disabled');
        cambiarTitulo('Editar información');
        quitarAlerta();
        limpiarBusqueda();
        desbloquearBoton();
    });
    // Evento botón eliminar
    $('#table .eliminar').on('click', function() {
        values = ciclo($(this));
        $('#opcion').val('eliminar');
        $('#id').val(values[0]);
        $('#txt_nombre').val(values[1]).attr('disabled', true);
        $('#txt_pais').val(values[2]).attr('disabled', true);
        $('#txt_edad').val(values[3]).attr('disabled', true);
        cambiarTitulo('Eliminar usuario');
        quitarAlerta();
        limpiarBusqueda();
        desbloquearBoton();
    });
    // Evento btotón insertar
    $('#btn_insertar').on('click', function() {
        $('#opcion').val('insertar');
        $('#id').val('');
        $('#txt_nombre').val('').removeAttr('disabled');
        $('#txt_pais').val('').removeAttr('disabled');
        $('#txt_edad').val('').removeAttr('disabled');
        cambiarTitulo('Insertar usuario');
        quitarAlerta();
        limpiarBusqueda();
        desbloquearBoton();
    });
}
var ciclo = (selector) => {
    let datos = [];
    $(selector).parents('tr').find('td').each(function(i) {
        if (i < 4) {
            datos[i] = $(this).text();
        } else {
            return false;
        }
    });
    return datos;
}
var cambiarTitulo = (titulo) => {
    $('.modal-header .modal-title').text(titulo);
}
// --------------------------------------------------------------------------Paginación--------------------------------------------------------------------------
var cambiarPagina = () => {
    $('.page-item>.page-link').on('click', function() {
        $.ajax({
            url: 'controllers/controllerList.php',
            method: 'POST',
            data: {
                pagina: $(this).text()
            },
        }).done(function(data) {
            $('#div_tabla').html(data);
            prepararDatos();
        });
    });
}
var crearPaginacion = () => {
    $.ajax({
        url: 'controllers/controllerPagination.php',
        method: 'POST'
    }).done(function(data) {
        $('#pagination li').remove();
        for (var i = 1; i <= data; i++) {
            $('#pagination').append('<li class="page-item"><a class="page-link text-muted" href="#">' + i + '</a></li>');
        }
        cambiarPagina();
    });
}
// ---------------------------------------------------Listar personas---------------------------------------------------
var listar = (param) => {
    $.ajax({
        url: 'controllers/controllerList.php',
        method: 'POST',
        data: {
            termino: param
        }
    }).done(function(data) {
        $('#div_tabla').html(data);
        prepararDatos();
    });
}
var tipoListado = (input) => {
    $(input).on('keyup', function() {
        let termino = '';
        if ($(this).val() != '') {
            termino = $(this).val();
        }
        listar(termino);
    });
}