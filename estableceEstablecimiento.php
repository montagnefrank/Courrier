<?php
/////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

session_start();
if (isset($_SESSION["usuario"])) {
    ?>
    <!DOCTYPE html>
    <html lang="en" class="no-js">
        <head>
            <meta charset="utf-8">
            <title>CMS terminales - Sistema de control de usuarios</title>  
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href="favicon.png" type="image/x-icon" />
            <!-- CSS -->
            <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" href="assets/css/reset.css">
            <link rel="stylesheet" href="assets/css/supersized.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="assets/css/estilo.css">
            <style>
                .btn-danger{
                    color: #fff;
                    background-color: #219dd9!important;
                    border-color: #40b4ed!important;
                }
                .btn-danger.active{
                    color: #fff;
                    background-color: #83d1f7!important;
                    border-color: #40b4ed!important;
                }
                .btn-danger:hover{
                    background-color: #40b4ed!important;
                }
                    
            </style>
        </head>
        <body>
            <div class="page-container">
                <div class="col-md-12">
                    <img class="logo" src="img/logo_rec.png" />
                </div>
                <div class="col-md-6">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="btn-group-vertical radioEstablecimiento" data-toggle="buttons" style="width: 100%;">
                            <h2 class="select_location">Seleccione un establecimiento para continuar..</h2>
                            <label class="btn btn-danger">
                                <input type="radio" name="options" id="option2" autocomplete="off" value="ambato"><img src="img/establecimientos/ambato.jpg" alt="Imagen anterior" class="mCS_img_loaded ico-city" width="100" height="100"> <h3 style="color:white;">Ambato</h3>
                            </label>
                            <label class="btn btn-danger">
                                <input type="radio" name="options" id="option3" autocomplete="off" value="guayaquil"><img src="img/establecimientos/guayaquil.jpg" alt="Imagen anterior" class="mCS_img_loaded ico-city" width="100" height="100"> <h3 style="color:white;">Guayaquil</h3>
                            </label>
                            <label class="btn btn-danger">
                                <input type="radio" name="options" id="option4" autocomplete="off" value="quito"><img src="img/establecimientos/quito.jpg" alt="Imagen anterior" class="mCS_img_loaded ico-city" width="100" height="100"> <h3 style="color:white;">Quito</h3>
                            </label>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-danger continuar">Continuar</button>
                    <br>
                    <button class="btn btn-danger salir">Salir del sistema</button>
                    <br>
                    <br>
                </div>
                <!-- MENSAJE DE SALIDA-->
            </div>
            <!-- Javascript -->
            <script src="assets/js/jquery-1.8.2.min.js"></script>
            <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
            <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
            <script src="assets/js/supersized.3.2.7.min.js"></script>
            <script src="assets/js/supersized-init.js"></script>

            <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>  
            <script type="text/javascript" src="js/plugins/notify/notify.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".page-container").css("margin", "30px auto 0 auto");

                    estableceEstablecimiento();

                    function estableceEstablecimiento() {
                        $.ajax({
                            url: 'assets/user_config/control.php',
                            type: 'GET',
                            data: {
                                establecimiento: true,
                            },
                            success: function (respuesta) {
                                $(".radioEstablecimiento .btn-danger").each(function (index, value) {
                                    $(this).removeClass("active");
                                    if ($(this).find("input[type='radio']").val() == respuesta) {
                                        $(this).addClass("active");
                                        $(this).find("input[type='radio']").prop("checked", true);
                                    }
                                });

                            },
                            error: function (error) {
                                console.log('Error, revise la funcion estableceEstablecimiento()');
                                console.log(error);
                            },
                            complete: function (xhr, status) {
                                console.log('PeticiÃ³n realizada');
                            }
                        });

                    }
                }
                );



                $(".continuar").click(function () {
                    //ESTA CHEKADO
                    if ($(".radioEstablecimiento input:radio:checked").val() != "") {
                        $.ajax({
                            url: 'assets/user_config/control.php',
                            type: 'POST',
                            dataType: "json",
                            data: {
                                establecimiento: $(".radioEstablecimiento input:radio:checked").val(),
                            },
                            success: function (respuesta) {

                                if (respuesta) {
                                    window.location.href = "index.php?panel=index.php#autoscroll";
                                }

                            },
                            error: function (error) {
                                console.log('Error, estableceEstablecimiento.php linea 141');
                                console.log(error);
                            },
                            complete: function (xhr, status) {
                                console.log('PeticiÃ³n realizada');
                            }
                        });
                    } else {
                        $.notify("Error \nSeleccione un establecimiento para entrar al sistema !", "error");
                    }
                });

                $(".salir").click(function () {
                    $.ajax({
                        url: 'assets/salir/salir_controller.php',
                        type: 'POST',
                        success: function (respuesta) {
                            if (respuesta) {
                                window.location.href = "login.php";
                            }
                        },
                        error: function (error) {
                            console.log('Error, estableceEstablecimiento.php linea 163');
                            console.log(error);
                        },
                        complete: function (xhr, status) {
                            console.log('PeticiÃ³n realizada');
                        }
                    });

                });

            </script>
        </body>

    </html>
    <?php
} else {
    header("Location:login.php");
    exit();
}
?>
