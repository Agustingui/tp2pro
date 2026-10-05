$(document).ready(function () {
    if ($('#tablaExamenes').length === 0) {
        return;
    }

    obtenerExamenes();
    // Obtener exámenes
    function obtenerExamenes() {
        $.ajax({
            url: 'http://localhost/tp2pro/public/examenes/listar',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                let filas = "";
                response.forEach(i => {
                    filas += `<tr>
                                <td>${limpiar(i.nombreExamen)}</td>
                                <td>${i.cantidadPreguntas}</td>
                                <td>
                                    <a href="http://localhost/tp2pro/public/preguntas/${i.id}" class="btn btn-sm btn-info">Preguntas</a>
                                    <a href="http://localhost/tp2pro/public/sorteo/${i.id}" class="btn btn-sm btn-success">Sortear</a>
                                    <button class="btn btn-sm btn-warning btn-editar" data-id="${i.id}">Editar</button>
                                    <button class="btn btn-sm btn-danger btn-eliminar" data-id="${i.id}">Eliminar</button>
                                </td>
                              </tr>`;
                });

                mostrarTabla('#tablaExamenes', filas);
            },
            error: function (error) {
                console.log('Error al obtener los exámenes', error);
            },
            complete: function () {
                console.log('Proceso Finalizado');
            }
        });
    }
    // Nuevo examen
    $('#btnNuevo').on('click', function () {
        $('#formExamen')[0].reset();
        $('#idExamen').val('');
        $('#mensaje').text('');
        $('#tituloModal').text('Nuevo examen');
        $('#modalExamen').modal('show');
    });
    // Editar examen
    $('#tablaExamenes').on('click', '.btn-editar', function () {

        let id = $(this).data('id');
        let nombre = $(this).closest('tr').find('td:eq(0)').text();

        $('#idExamen').val(id);
        $('#nombreExamen').val(nombre);
        $('#mensaje').text('');
        $('#tituloModal').text('Editar examen');
        $('#modalExamen').modal('show');
    });
    // Guardar examen
    $('#formExamen').on('submit', function (e) {
        e.preventDefault();
        let datos = {
            id: $('#idExamen').val(),
            nombreExamen: $('#nombreExamen').val()
        };
        $.ajax({
            url: 'http://localhost/tp2pro/public/examenes/guardar',
            type: 'POST',
            data: datos,
            dataType: 'json',
            success: function (response) {
                if (response.ok) {
                    $('#modalExamen').modal('hide');
                    $('#formExamen')[0].reset();
                    $('#idExamen').val('');
                    obtenerExamenes();
                }
            },
            error: function (error) {
                console.log('Error guardar el examen', error);
            }
        });
    });
    // Eliminar examen
    $('#tablaExamenes').on('click', '.btn-eliminar', function () {
        let id = $(this).data('id');
        if (!confirm('¿Eliminar este examen y todas sus preguntas?')) {
            return;
        }
        $.ajax({
            url: 'http://localhost/tp2pro/public/examenes/eliminar',
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function (response) {
                obtenerExamenes();
            },
            error: function (error) {
                console.log('Error en la solicitud', error);
            }
        });
    });
});