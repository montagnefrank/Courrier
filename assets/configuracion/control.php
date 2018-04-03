<?php

/////////////////////////////////////////////////////////////////////////////// BLOG CONTROL
/////////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
error_reporting(E_ALL);
ini_set('display_errors', 1);



require ("../conn.php");
session_start();

if (isset($_POST['addnewreg'])) {
    //$asientos = explode(",", $_POST["asientos"]);
    $query = '';
    // INSERT INTO `transportes`.`ingresos` (`idIngreso`, `pesoIngreso`, `placaIngreso`, `origenIngreso`, `destinoIngreso`, `horaIngreso`, `precioIngreso`, `cedulaIngreso`, `nombreIngreso`, `telefonoIngreso`, `emailIngreso`, `statusIngreso`, `reCedula`, `renombre`, `reTelef`, `reEmail`, `observaciones`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
    //foreach ($asientos as $key => $value) {
        $query = "INSERT INTO establecimiento (`nombreEstablecimiento`, `direccionEstablecimiento`, `ciudadEstablecimiento`, `telefonoEstablecimiento`, `sectorEstablecimiento`) "
                . "VALUES ('" . $_POST['nombre'] . "','". $_POST['direccion'] . "','" . $_POST['ciudad'] . "','" . $_POST['telefono'] . "','" . $_POST['sector'] ."');";
      // exit($query); 
       $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    //}
    echo " Se registró correctamente el envío " ;
}



?>