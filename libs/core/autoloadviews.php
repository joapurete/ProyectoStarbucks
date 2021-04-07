<?php
class AutoLoadViews
{
    //Slick________________________________________________________________________________________________________________________________________________________
    static function getLinkSlick()
    {
        ob_start(); ?>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <?php $slick = ob_get_clean();
        return $slick;
    }
    static function getScriptSlick()
    {
        ob_start(); ?>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <?php $slick = ob_get_clean();
        return $slick;
    }
    //Lightbox_____________________________________________________________________________________________________________________________________________________
    static function getLinkLightbox()
    {
        ob_start(); ?>
        <link rel="stylesheet" href="<?= URL; ?>assets/css/libs/lightbox/lightbox.css">
    <?php $lightbox = ob_get_clean();
        return $lightbox;
    }
    static function getScriptLightbox()
    {
        ob_start(); ?>
        <script src="<?= URL; ?>assets/js/libs/lightbox/lightbox.min.js"></script>
    <?php $lightbox = ob_get_clean();
        return $lightbox;
    }
    //Map__________________________________________________________________________________________________________________________________________________________
    static function getScriptMap()
    {
        ob_start(); ?>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <?php $scriptMap = ob_get_clean();
        return $scriptMap;
    }
    static function getLinkMap()
    {
        ob_start(); ?>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <?php $linkMap = ob_get_clean();
        return $linkMap;
    }
    //ChartJs______________________________________________________________________________________________________________________________________________________
    static function getScriptChartJs()
    {
        ob_start(); ?>
        <script src="<?= URL ?>assets/js/libs/chart.js/Chart.min.js"></script>
    <?php $scriptChartJs = ob_get_clean();
        return $scriptChartJs;
    }
    //DataTables___________________________________________________________________________________________________________________________________________________
    static function getLinkDatatables()
    {
        ob_start(); ?>
        <link rel="stylesheet" href="<?= URL ?>assets/css/libs/datatables-bs4/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= URL ?>assets/css/libs/datatables-responsive/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= URL ?>assets/css/libs/datatables-buttons/buttons.bootstrap4.min.css">
    <?php $linkDatatables = ob_get_clean();
        return $linkDatatables;
    }
    static function getScriptDatatables()
    {
        ob_start(); ?>
        <script src="<?= URL ?>assets/js/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= URL ?>assets/js/libs/datatables/dataTables.js"></script>
        <script src="<?= URL ?>assets/js/libs/datatables-bs4/dataTables.bootstrap4.min.js"></script>
        <script src="<?= URL ?>assets/js/libs/datatables-responsive/dataTables.responsive.min.js"></script>
        <script src="<?= URL ?>assets/js/libs/datatables-responsive/responsive.bootstrap4.min.js"></script>
        <script src="<?= URL ?>assets/js/libs/datatables-buttons/dataTables.buttons.min.js"></script>
        <script src="<?= URL ?>assets/js/libs/datatables-buttons/buttons.bootstrap4.min.js"></script>
        <script src="<?= URL ?>assets/js/libs/jszip/jszip.min.js"></script>
        <script src="<?= URL ?>assets/js/libs/pdfmake/pdfmake.min.js"></script>
        <script src="<?= URL ?>assets/js/libs/pdfmake/vfs_fonts.js"></script>
        <script src="<?= URL ?>assets/js/libs/datatables-buttons/buttons.html5.min.js"></script>
        <script src="<?= URL ?>assets/js/libs/datatables-buttons/buttons.print.min.js"></script>
        <script src="<?= URL ?>assets/js/libs/datatables-buttons/buttons.colVis.min.js"></script>
    <?php $scriptDatatables = ob_get_clean();
        return $scriptDatatables;
    }
    //SummerNote____________________________________________________________________________________________________________________________________________________
    static function getLinkSummerNote()
    {
        ob_start(); ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <?php $linkSummerNote = ob_get_clean();
        return $linkSummerNote;
    }
    static function getScriptSummerNote()
    {
        ob_start(); ?>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script src="<?= URL ?>assets/js/libs/surmmernote/summernote-es-ES.js"></script>
        <script src="<?= URL ?>assets/js/libs/summernote/summernote.js"></script>
    <?php $scriptSummerNote = ob_get_clean();
        return $scriptSummerNote;
    }
    //OverlayScrollbar_____________________________________________________________________________________________________________________________________________
    static function getLinkOverlayScrollbar()
    {
        ob_start(); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.min.css" />
    <?php $linkOverlayScrollBar = ob_get_clean();
        return $linkOverlayScrollBar;
    }
    static function getScriptOverlayScrollbar()
    {
        ob_start(); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/OverlayScrollbars.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/jquery.overlayScrollbars.min.js"></script>
    <?php $scriptOverlayScrollbar = ob_get_clean();
        return $scriptOverlayScrollbar;
    }
    //Adminlte_____________________________________________________________________________________________________________________________________________________
    static function getLinkAdminlte()
    {
        ob_start(); ?>
        <link rel="stylesheet" href="<?= URL ?>assets/css/libs/adminlte/adminlte.min.css" />
    <?php $linkAdminlte = ob_get_clean();
        return $linkAdminlte;
    }
    static function getScriptAdminlte()
    {
        ob_start(); ?>
        <script src="<?= URL ?>assets/js/libs/adminlte/adminlte.min.js"></script>
<?php $scriptAdminlte = ob_get_clean();
        return $scriptAdminlte;
    }
    //Template General_____________________________________________________________________________________________________________________________________________
    static function getTemplateGeneral()
    {
        include_once 'views/templates/preloader.php';
        include_once 'views/templates/flechaScrollTop.php';
        include_once 'views/templates/header.php';
        include_once 'views/templates/buscador.php';
    }
    //Validación Sesión____________________________________________________________________________________________________________________________________________
    static function validateSession()
    {
        if (isset($_SESSION['user']) || isset($_SESSION['user']['id']) || isset($_SESSION['user']['type'])) {
            return true;
        } else {
            return false;
        }
    }
}
//__________________________________________________________________________________________________________________________________________________________________