<div class="row justify-content-center my-5">
    <div class="col-12 col-sm-8 col-md-5 col-lg-4">
        <div class="card border-0 shadow-sm p-4">

            <div class="card-body">
                <h3 class="fw-bold text-center mb-4">INGRESAR</h3>

                <form id="formLogin">
                    <!-- Usuario -->
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-white">
                            <span class="material-symbols-outlined fs-5">person</span>
                        </span>
                        <input type="text" name="usuario" class="form-control" placeholder="Usuario" autocomplete="off" required>
                    </div>
                    <!-- Contraseña -->
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-white">
                            <span class="material-symbols-outlined fs-5">lock</span>
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                    <!-- Mensaje -->
                    <div id="mensaje" class="text-danger small text-center mb-3"></div>
                    <!-- Botón -->
                    <button type="submit" class="btn btn-dark w-100">
                        INGRESAR
                    </button>
                </form>

                <div class="text-center mt-4">
                    <a href="<?= base_url('registro') ?>" class="text-dark text-decoration-none small">
                        ¿No tenés cuenta? Registrate
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>