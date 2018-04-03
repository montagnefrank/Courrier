<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>  
<script type="text/javascript" src="js/plugins/notify/notify.js"></script>
<script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
<script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
<script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
<script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/plugins/moment.min.js"></script>
<script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="js/plugins/dropzone/dropzone.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="js/plugins/form/jquery.form.js"></script>
<script type="text/javascript" src="js/plugins/cropper/cropper.min.js"></script>
<script type='text/javascript' src='js/plugins/jquery-validation/jquery.validate.js'></script>
<script type="text/javascript" src="js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>     
<script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="https://cdn.rawgit.com/download/glyphicons/0.1.0/glyphicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<!--<script type="text/javascript" src="js/settings.js"></script>-->
<script type="text/javascript" src="js/plugins.js"></script>        
<script type="text/javascript" src="js/actions.js"></script>
<script type="text/javascript" src="js/demo_edit_profile.js"></script>
<script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
<script type='text/javascript' src='js/plugins/noty/layouts/topCenter.js'></script>
<script type='text/javascript' src='js/plugins/noty/layouts/topLeft.js'></script>
<script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script> 
<script type='text/javascript' src='node_modules/dragula/dist/dragula.min.js'></script>
<script type='text/javascript' src='node_modules/easy-autocomplete/dist/jquery.easy-autocomplete.min.js'></script>
<script type='text/javascript' src='js/plugins/filestyle/bootstrap-filestyle.min.js'></script>
<script type='text/javascript' src='assets/js/modalMultiple.js'></script>
<script type='text/javascript' src='assets/salir/script_salir.js'></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datepicker();
    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    $(document).on("click", function () {
        $(".notificactionbox,.customalert").animate({width: 'hide'}, 600);
    });

    $(document).ready(function (e) {
        $(".notificactionbox").animate({width: 'toggle'}, 600);
    });

    $('.numonly').bind('keyup blur', function () {
        var node = $(this);
        node.val(node.val().replace(/[^0-9-]/g, ''));
    });

    $('.alphanumonly').bind('keyup blur', function () {
        var node = $(this);
        node.val(node.val().replace(/[^0-9a-z-]/g, ''));
    });

    $('.alphaonly').bind('keyup blur', function () {
        var node = $(this);
        node.val(node.val().replace(/[^a-zA-Z\-\s]/g, ''));
    });
</script>       
<?php
switch ($panel) {///////////////////////////////////////////////////////////////SELECTOR DE PANEL, DEPENDIENDO DEL PANEL, HACE LAS LLAMADAS A LOS ARCHIVOS CORRESPONDINETES
    case "index.php":
        require ("assets/inventory/model.php");
        break;
    case "leer.php":
        require ("assets/oper/model.php");
        break;
    case "ingresos.php":
        require ("assets/ingresos/model.php");
        break;
    case "configurar.php":
        require ("assets/configuracion/model.php");
        break;
    case "discos.php":
        require ("assets/discos/model.php");
        break;
    case "sucursal.php":
        require ("assets/suc/model.php");
        break;
    case "dashboard.php":
        echo "<script type=\"text/javascript\" src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyAmiuiSiaQkYId2AJwdZqW-vVoR0VcqT50\"></script>";
        echo "<script type='text/javascript' src='assets/dashboard/dashboard.js'></script>";
        echo "<script type='text/javascript' src=\"assets/dashboard/echarts/dist/echarts.js\"></script>";
        require ("assets/dashboard/dashboardscripts.php");
        break;
    case "checkout.php":
        require ("assets/checkout/model.php");
        break;
    case "user.php":
        require ("assets/users/model.php");
        break;
    case "user_config.php":
        require ("assets/user_config/model.php");
        break;
    case "track.php":
        echo "<script type=\"text/javascript\" src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyAmiuiSiaQkYId2AJwdZqW-vVoR0VcqT50\"></script>";
        require ("assets/track/model.php");
        break;
    case "boletos.php":
        require ("assets/boletos/model.php");
        break;
}
?>
