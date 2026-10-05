<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold font-monospace text-uppercase mb-0">
        MIS EXÁMENES CREADOS
    </h3>
    <button id="btnNuevo" class="btn btn-dark rounded-2 px-4 py-2 d-inline-flex align-items-center gap-2 fw-bold text-uppercase font-monospace fs-6">
        <span class="material-symbols-outlined fs-5">add</span>
        Nuevo Examen
    </button>
</div>

<!-- Tabla -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <table id="tablaExamenes" class="table table-hover align-middle w-100 mb-0">
            <thead>
                <tr>
                    <th>Nombre del Examen</th>
                    <th>Preguntas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalExamen" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <form id="formExamen">
                <!-- Cabecera -->
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="tituloModal">
                        Examen
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Contenido -->
                <div class="modal-body">
                    <input type="hidden" name="id" id="idExamen">
                    <div class="mb-3">
                        <label for="nombreExamen" class="form-label">Nombre del examen</label>
                        <input type="text" name="nombreExamen" id="nombreExamen" class="form-control" placeholder="Nombre del examen" autocomplete="off" required>
                    </div>
                    <div id="mensaje" class="text-danger small text-center"></div>
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