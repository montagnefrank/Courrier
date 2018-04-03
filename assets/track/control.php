<?php

/////////////////////////////////////////////////////////////////////////////// BLOG CONTROL
/////////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
error_reporting(E_ALL);
ini_set('display_errors', 1);


require ("../conn.php");
session_start();
$obj = array();

if (isset($_POST['leertracking'])) {
    $query = "SELECT * FROM ingresos WHERE trackingnumber = '" . $_POST['valortrack'] . "' AND statusIngreso = 'nuevo' LIMIT 1";
    $result = $conn->query($query);
    if (!$result)
        die($conn->error);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($row == '') {
        echo json_encode("error");
    } else {
        $query2 = "SELECT gpsphone FROM discos WHERE placa = '" . $row['placaIngreso'] . "' LIMIT 1";
        $result2 = $conn->query($query2);
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
        $obj['num'] = $row2['gpsphone'];
        $obj['placa'] = $row['placaIngreso'];
        $obj['msg'] = 'DW';
        $obj['fila'] = $row;
        echo json_encode($obj);
    }
}
?>