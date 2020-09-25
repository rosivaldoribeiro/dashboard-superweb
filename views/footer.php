<!-- BEGIN: Footer-->
<footer class="page-footer footer footer-static footer-light navbar-border navbar-shadow">
    <div class="footer-copyright">
        <div class="container"><span>&copy; 2020 - <?php echo $site['nome_site']; ?></span></div>
    </div>
</footer>

<!-- END: Footer-->
<!-- BEGIN VENDOR JS-->
<script src="assets/js/vendors.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="assets/vendors/chartjs/chart.min.js"></script>
<!-- END PAGE VENDOR JS-->
<?php
    if ($site['titulo'] == "Todos os Usuários") {
        echo '<script src="assets/js/scripts/page-users.min.js"></script>';
        echo '<script src="assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>';
        echo '<script src="assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>';
    }
?>
<!-- BEGIN THEME  JS-->
<script src="assets/js/plugins.min.js"></script>
<script src="assets/js/search.min.js"></script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="assets/js/scripts/dashboard-ecommerce.min.js"></script>
<!-- END PAGE LEVEL JS-->
</body>

</html>