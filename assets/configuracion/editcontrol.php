<?php
require ("../conn.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['addedit'])) {
    $id=$_POST['id_edit'];
     $nombre=$_POST['nombre_edit'];
     $dir=$_POST['dir_edit'];
      $ciudad=$_POST['ciudad_edit'];
       $telef=$_POST['telef_edit'];
        $sector=$_POST['sector_edit'];
    //$asientos = explode(",", $_POST["asientos"]);
    $query = '';
    // INSERT INTO `transportes`.`ingresos` (`idIngreso`, `pesoIngreso`, `placaIngreso`, `origenIngreso`, `destinoIngreso`, `horaIngreso`, `precioIngreso`, `cedulaIngreso`, `nombreIngreso`, `telefonoIngreso`, `emailIngreso`, `statusIngreso`, `reCedula`, `renombre`, `reTelef`, `reEmail`, `observaciones`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
    //foreach ($asientos as $key => $value) {
        $query = "UPDATE  establecimiento SET `nombreEstablecimiento` = '$nombre', `direccionEstablecimiento` = '$dir', `ciudadEstablecimiento` = '$ciudad',
            `telefonoEstablecimiento` = '$telef', `sectorEstablecimiento` = '$sector'
                 WHERE  `idEstablecimiento` = '$id'  ";
      // exit($query); 
       $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    //}
      
       
    echo " Se registró correctamente el envío " ;
}