<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="<?= base_url('examenes') ?>"
            class="btn btn-secondary btn-sm rounded-2 px-3 d-inline-flex align-items-center gap-1 fw-bold text-uppercase">
            Volver
        </a>
    </div>
    <div class="d-flex gap-2">
        <a id="btnSortear" href="#" class="btn btn-secondary rounded-2 px-3 fw-bold">
            Sortear preguntas
        </a>
        <button id="btnNueva" class="btn btn-dark rounded-2 px-3 fw-bold">
            <span class="material-symbols-outlined fs-5 align-middle">add</span>
            Nueva pregunta
        </button>
    </div>
</div>
    <div>
        <h3 class="d-inline fw-bold font-monospace">
            Preguntas de: <span id="nombreExamen"></span>
        </h3>
    </div>
<!-- Tabla -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <table id="tablaPreguntas" class="table table-hover align-middle w-100 mb-0">
            <thead>
                <tr>
                    <th>Pregunta</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalPregunta" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <form id="formPregunta">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="tituloModal">Pregunta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Contenido -->
                <div class="modal-body">
                    <input type="hidden" name="id" id="idPregunta">
                    <input type="hidden" name="idExamen" id="idExamen">
                    <textarea name="textoPregunta" id="textoPregunta" class="form-control" rows="4" placeholder="Escribí la pregunta" required></textarea>
                    <div id="mensaje" class="text-danger small text-center mt-2"></div>
                </div>
                <!-- Botones -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-dark">
                        Guardar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>