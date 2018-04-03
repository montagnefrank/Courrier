<?php
/////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>CMS terminales - Sistema de control de usuarios</title>  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/estilo.css">
        <link rel="icon" href="favicon.png" type="image/x-icon" />
        <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <style>
            body{
                overflow-x: hidden;
            }

            .clouds_one {
                position: absolute;
                               left: 0;
                top: 0;
                height: 100%;
                width: 50%;
                -webkit-animation: cloud_one 70s linear infinite;
                -moz-animation: cloud_one 70s linear infinite;
                -o-animation: cloud_one 70s linear infinite;
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0)
            }

            .cloudimg1 {
                position: absolute;
                left: 0px;
            }

            .clouds_two {
                position: absolute;
                left: 0;
                top: 30%;
                height: 50%;
                width: 50%;
                -webkit-animation: cloud_two 70s linear infinite;
                -moz-animation: cloud_two 70s linear infinite;
                -o-animation: cloud_two 70s linear infinite;
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0)
            }

            @-webkit-keyframes cloud_one {
                0% {
                    left: +100%
                }
                10% {
                    left: +60%
                }
                20% {
                    left: +30%
                }
                30% {
                    left: -10%
                }
                45% {
                    left: -12%
                }
                50% {
                    left: -12%
                }
                55% {
                    left: -8%
                }
                100% {
                    left: +100%
                }
            }

            @-webkit-keyframes cloud_two {
                0% {
                    left: -30%
                }
                100% {
                    left: +100%
                }
            }

            @-moz-keyframes cloud_one {
                0% {
                    left: +100%
                }
                10% {
                    left: +60%
                }
                20% {
                    left: +30%
                }
                30% {
                    left: -10%
                }
                45% {
                    left: -12%
                }
                50% {
                    left: -12%
                }
                55% {
                    left: -8%
                }
                100% {
                    left: +100%
                }
            }

            @-moz-keyframes cloud_two {
                0% {
                    left: -30%
                }
                100% {
                    left: +100%
                }
            }
        </style>
    </head>
    <body>
        <div class="clouds_one"><img class="cloudimg1" src="cloud1.png" /></div>
        <div class="clouds_two"><img class="cloudimg1" src="cloud2.png" /></div>
        <div class="page-container">
            <img class="logo" src="img/logo_rec.png" />
            <form method="post">
                <input type="text" name="username" class="username" placeholder="Usuario">
                <input type="password" name="password" class="password" placeholder="Contraseña">
                <button type="submit">Iniciar Sesion</button>
                <div class="error"><span>+</span></div>
                <div class="notificacion" hidden></div>
            </form>
        </div>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>

</html>
