<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="url-base" content="<?= rtrim(base_url(), '/') ?>/">
    <title>TP2 - ​Integración de JavaScript y PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body class="bg-white text-dark">
    <header class="sticky-top bg-white py-4 mb-5">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="text-dark text-decoration-none fw-bold fs-5 text-uppercase font-monospace" href="<?= base_url('examenes') ?>">
                TP2 PROGRAMACIÓN
            </a>
            <?php if (session()->get('usuario')): ?>
                <div class="d-flex align-items-center gap-2">
                    <!-- Usuario con ícono en pastilla -->
                    <span class="badge text-dark rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2 fs-6 text-uppercase">
                        <span class="material-symbols-outlined fs-5">account_circle</span>
                        <?= esc(session()->get('usuario')) ?>
                    </span>

                    <!-- Botón Salir con ícono logout -->
                    <a href="<?= base_url('salir') ?>" class="btn btn-dark btn-sm rounded-2 px-3 d-inline-flex align-items-center gap-1 fw-bold text-uppercase">
                        <span class="material-symbols-outlined fs-6">logout</span>
                        Salir
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </header>
    <div class="container">