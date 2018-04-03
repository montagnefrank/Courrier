<?php

/////////////////////////////////////////////////////////////////////////////// BLOG CONTROL
/////////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
error_reporting(E_ALL);
ini_set('display_errors', 1);



require ("../conn.php");
session_start();

if (isset($_POST['addnewdisco'])) {
    //$asientos = explode(",", $_POST["asientos"]);
    $query = '';
    // INSERT INTO `transportes`.`discos` (`disco`,`placa`,`carga`) VALUES (NULL, NULL, NULL);
    //foreach ($asientos as $key => $value) {
        $query = "INSERT INTO discos (`disco`, `placa`, `carga`) "
                . "VALUES ('" . $_POST['disco'] . "','". $_POST['placa'] . "','" . $_POST['carga'] . "');";
      // exit($query); 
       $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    //}
    echo " Se registró correctamente el envío " ;
}



?>