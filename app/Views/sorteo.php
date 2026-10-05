<a href="<?= base_url('examenes') ?>" 
    class="btn btn-secondary btn-sm mb-4 rounded-2 px-3 d-inline-flex align-items-center gap-1 fw-bold text-uppercase">
    Volver
</a>

<!-- El nombre y el total los completa sorteo.js por AJAX -->
<div class="mb-4">
    <h3 class="fw-bold font-monospace mb-1">
        Sorteo: <span id="nombreExamen"></span>
    </h3>
    <p class="text-body-secondary mb-0"> 
        Este examen tiene <strong id="total">0</strong> 
        pregunta(s) cargada(s).
    </p>
</div>

<!-- Formulario de sorteo -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">

        <form id="formSorteo" class="row g-3 align-items-end">
            <input type="hidden" name="idExamen" id="idExamen">

            <div class="col-12 col-md-auto">
                <label for="cantidad" class="form-label fw-semibold">
                    ¿Cuántas preguntas querés sortear?
                </label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" value="1" required>
            </div>

            <div class="col-12 col-md-auto">
                <button type="submit" class="btn btn-dark px-4">
                    <span class="material-symbols-outlined fs-5 align-middle">casino</span>
                    Sortear
                </button>
            </div>
        </form>

        <div id="mensaje" class="text-danger small mt-2"></div>
        
    </div>
</div>

<!-- Resultado -->
<div id="resultado" class="card border-0 shadow-sm d-none">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Preguntas sorteadas</h5>
        <ol id="listaPreguntas" class="mb-0"></ol>
    </div>
</div>