/**
 * comun.js - Funciones compartidas por todas las pantallas.
 */

// Dirección base del proyecto dentro del servidor local
const URL_BASE = '/tp2pro/public/';

// Textos en español para DataTables
const IDIOMA_TABLA = {
    search: 'Buscar:',
    lengthMenu: 'Mostrar _MENU_ registros',
    info: 'Mostrando _START_ a _END_ de _TOTAL_',
    infoEmpty: 'Sin registros',
    emptyTable: 'Todavía no hay datos cargados',
    zeroRecords: 'No se encontraron resultados',
    paginate: { next: 'Siguiente', previous: 'Anterior' }
};

// Si la sesión expira, cualquier petición AJAX devuelve 401: mandamos al login
$(document).ajaxError(function (evento, xhr) {
    if (xhr.status === 401) {
        window.location.href = '/tp2pro/public/login';
    }
});

// Convierte un texto en "texto seguro" para meterlo dentro de HTML
// (evita que alguien escriba <script> en una pregunta o examen)
function limpiar(texto) {
    return $('<div>').text(texto).html();
}

// Dibuja las filas en la tabla y la convierte en DataTable.
// Si la tabla ya era DataTable, primero se destruye y se vuelve a crear.
function mostrarTabla(selector, filas) {
    if ($.fn.DataTable.isDataTable(selector)) {
        $(selector).DataTable().destroy();
    }

    $(selector + ' tbody').html(filas);

    $(selector).DataTable({
        language: IDIOMA_TABLA,
        columnDefs: [{ orderable: false, targets: -1 }] // la última columna (botones) no se ordena
    });
}
