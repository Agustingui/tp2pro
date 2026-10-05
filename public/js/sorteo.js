$(document).ready(function () {
    if ($('#formSorteo').length === 0) {
        return;
    }
    let idExamen = window.location.pathname.split('/').pop();
    $('#idExamen').val(idExamen);

    obtenerExamen();
    
    function obtenerExamen() {
        $.ajax({
            url: 'http://localhost/tp2pro/public/examenes/obtener/' + idExamen,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $('#nombreExamen').text(response.nombreExamen);
                $('#total').text(response.cantidadPreguntas);
                $('#cantidad').attr('max', response.cantidadPreguntas);
            },
            error: function (error) {
                console.log('Error al obtener el examen');
            },
            complete: function () {
                console.log('Proceso Finalizado');
            }
        });
    }
    // Realizar sorteo
    $('#formSorteo').on('submit', function (e) {
        e.preventDefault();
        $('#mensaje').text('');

        var formulario = $('#formSorteo');
        var datos = new FormData(formulario[0]);

        $.ajax({
            url: 'http://localhost/tp2pro/public/sorteo/realizar',
            type: 'POST',
            data: datos,
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            success: function (response) {
                if (!response.ok) {
                    $('#mensaje').text(response.mensaje || 'No se pudo realizar el sorteo.');
                    $('#resultado').addClass('d-none');
                    return;
                }
                let lista = "";
                response.preguntas.forEach(i => {
                    lista += `<li>${i.textoPregunta}</li>`;
                });
                $('#listaPreguntas').html(lista);
                $('#resultado').removeClass('d-none');
            },
            error: function (error) {
                console.log('Error en la solicitud', error);
            }
        });
    });
});