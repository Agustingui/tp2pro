    </div>
    <!-- Librerías: jQuery primero, después las que dependen de él -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <!-- JS común a todas las pantallas -->
    <script src="<?= base_url('js/comun.js') ?>"></script>
    <!-- JS propio de cada pantalla -->
    <script src="<?= base_url('js/login.js') ?>"></script>
    <script src="<?= base_url('js/registro.js') ?>"></script>
    <script src="<?= base_url('js/examenes.js') ?>"></script>
    <script src="<?= base_url('js/preguntas.js') ?>"></script>
    <script src="<?= base_url('js/sorteo.js') ?>"></script>
</body>
</html>
