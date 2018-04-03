<?php

/////////////////////////////////////////////////////////////////////////////// BLOG CONTROL
/////////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require ("../conn.php");
session_start();

if (isset($_POST['addnewsuc'])) {
    $query = "INSERT INTO establecimiento (nombreEstablecimiento,direccionEstablecimiento,ciudadEstablecimiento,telefonoEstablecimiento,sectorEstablecimiento) "
            . "VALUES ('" . $_POST['nombreEst'] . "','" . $_POST['dirEst'] . "','" . $_POST['ciudadEst'] . "','" . $_POST['phoneEst'] . "','" . $_POST['sectorEst'] . "');";
    $result = $conn->query($query);
    if (!$result)
        die($conn->error);
    echo " Se registró correctamente el envío ";
}

if (isset($_POST['editSuc'])) {
    $query = "UPDATE establecimiento SET nombreEstablecimiento = '" . $_POST['nombreEst'] . "', direccionEstablecimiento = '" . $_POST['dirEst'] . "', ciudadEstablecimiento = '" . $_POST['ciudadEst'] . "', telefonoEstablecimiento = '" . $_POST['phoneEst'] . "', sectorEstablecimiento = '" . $_POST['sectorEst'] . "' "
            . " WHERE idEstablecimiento = '" . $_POST['editId'] . "'";
    $result = $conn->query($query);

    if (!$result)
        die($query);
    echo "Se actualizó correctamente la sucursal";
}

if (isset($_POST['deleteDisco'])) {
    $query = "DELETE FROM establecimiento WHERE idEstablecimiento = '" . $_POST['deleteId'] . "'";
    $result = $conn->query($query);
    if (!$result)
        die($conn->error);
    echo " Se eliminó correctamente la sucursal ";
}

if (isset($_POST['getSuc'])) {
    $query = "SELECT * FROM establecimiento";
    $result = $conn->query($query);
    if (!$result)
        die($conn->error);
    while ($row_discos_list = $result->fetch_array(MYSQLI_BOTH)) {
        echo "<tr style='cursor:pointer'  class='singleing_row' >
                <td class='nombreEst'>" . $row_discos_list['nombreEstablecimiento'] . "</td>
                <td class='dirEst'>" . $row_discos_list['direccionEstablecimiento'] . "</td>
                <td class='ciudadEst'>" . $row_discos_list['ciudadEstablecimiento'] . "</td>	
                <td class='telEst'>" . $row_discos_list['telefonoEstablecimiento'] . "</td>	
                <td class='sectorEst'>" . $row_discos_list['sectorEstablecimiento'] . "</td>
                <td class='idcontainerEst displaynone'>" . $row_discos_list['idEstablecimiento'] . "</td>
                <td class='delete_disco'><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button></td>
            </tr>";
    }
}
?>