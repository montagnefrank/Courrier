<?php

/////////////////////////////////////////////////////////////////////////////// BLOG CONTROL
/////////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
error_reporting(E_ALL);
ini_set('display_errors', 1);


require ("../conn.php");
session_start();

if (isset($_POST['leercedula'])) {
    $query = "SELECT * FROM ingresos WHERE recedula = '" . $_POST['valorcedula'] . "' AND statusIngreso = 'nuevo' LIMIT 1";
    $resultt = $conn->query($query);
    $query = "UPDATE ingresos SET statusIngreso = 'recibido' WHERE recedula = '" . $_POST['valorcedula'] . "' AND statusIngreso = 'nuevo' LIMIT 1";
    $result = $conn->query($query);
    if (!$result)
        die($conn->error);
    $row = mysqli_fetch_array($resultt,MYSQLI_ASSOC);
    if ($row == '') {
        echo json_encode("error");
    } else {
         echo json_encode($row);
    }
}
?>