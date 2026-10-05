$(document).ready(function () {
    if ($('#tablaPreguntas').length === 0) {
        return;
    }

    let idExamen = window.location.pathname.split('/').pop();
    $('#idExamen').val(idExamen);
    $('#btnSortear').attr('href', 'http://localhost/tp2pro/public/sorteo/' + idExamen);

    obtenerExamen();
    obtenerPreguntas();

    // Obtener examen
    function obtenerExamen() {
        $.ajax({
            url: 'http://localhost/tp2pro/public/examenes/obtener/' + idExamen,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $('#nombreExamen').text(response.nombreExamen);
            },
            error: function (error) {
                console.log('Error al obtener el examen');
            },
            complete: function () {
                console.log('Proceso Finalizado');
            }
        });
    }
    // Obtener preguntas
    function obtenerPreguntas() {
        $.ajax({
            url: 'http://localhost/tp2pro/public/preguntas/listar/' + idExamen,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                let filas = "";
                response.forEach(i => {
                    filas += `<tr>
                                <td>${limpiar(i.textoPregunta)}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning btn-editar" data-id="${i.id}">Editar</button>
                                    <button class="btn btn-sm btn-danger btn-eliminar" data-id="${i.id}">Eliminar</button>
                                </td>
                              </tr>`;
                });
                mostrarTabla('#tablaPreguntas', filas);
            },
            error: function (error) {
                console.log('Error al obtener las preguntas');
            },
            complete: function () {
                console.log('Proceso Finalizado');
            }
        });
    }
    // Nueva pregunta
    $('#btnNueva').on('click', function () {
        $('#formPregunta')[0].reset();
        $('#idPregunta').val('');
        $('#mensaje').text('');
        $('#tituloModal').text('Nueva pregunta');
        $('#modalPregunta').modal('show');
    });
    // Editar pregunta
    $('#tablaPreguntas').on('click', '.btn-editar', function () {
        let id = $(this).data('id');
        let texto = $(this).closest('tr').find('td:eq(0)').text();
        $('#idPregunta').val(id);
        $('#textoPregunta').val(texto);
        $('#mensaje').text('');
        $('#tituloModal').text('Editar pregunta');
        $('#modalPregunta').modal('show');
    });
    // Guardar pregunta
    $('#formPregunta').on('submit', function (e) {
        e.preventDefault();

        var formulario = $('#formPregunta');
        var datos = new FormData(formulario[0]);

        $.ajax({
            url: 'http://localhost/tp2pro/public/preguntas/guardar',
            type: 'POST',
            data: datos,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                if (response.ok) {
                    $('#modalPregunta').modal('hide');
                    $('#formPregunta')[0].reset();
                    $('#idPregunta').val('');
                    obtenerPreguntas();
                } else {
                    $('#mensaje').text(response.mensaje || 'No se pudo guardar la pregunta.');
                }
            },
            error: function (error) {
                console.log('Error en la solicitud', error);
            }
        });
    });
    // Eliminar pregunta
    $('#tablaPreguntas').on('click', '.btn-eliminar', function () {
        let id = $(this).data('id');
        if (!confirm('¿Eliminar esta pregunta?')) {
            return;
        }

        $.ajax({
            url: 'http://localhost/tp2pro/public/preguntas/eliminar',
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function (response) {
                obtenerPreguntas();
            },
            error: function (error) {
                console.log('Error en la solicitud');
            }
        });
    });
});