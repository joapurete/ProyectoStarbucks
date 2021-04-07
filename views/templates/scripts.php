<!-- URL Raiz -->
<script>
    URL = <?= URL ?>
</script>

<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- JS -->
<?php if (isset($data['scriptJs'])) {
    echo $data['scriptJs'];
} ?>
<script src="<?= getUrl() ?>assets/js/main.js"></script>

<!-- Ajax JS -->
<?php if (isset($data['scriptAjax'])) { ?>
    <?php for ($i = 0; $i < count($data['scriptAjax']); $i++) { ?>
        <script src="<?= URL ?><?= $data['scriptAjax'][$i] ?>.js"></script>
    <?php } ?>
<?php } ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>