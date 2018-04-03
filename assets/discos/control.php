<?php

/////////////////////////////////////////////////////////////////////////////// BLOG CONTROL
/////////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
error_reporting(E_ALL);
ini_set('display_errors', 1);
require ("../conn.php");
session_start();

if (isset($_POST['addnewdisco'])) {
    $query = "INSERT INTO discos (`disco`, `placa`, `carga`,`modelo`,`nombres`,`apellidos`,`cedula`,`phone`,`gpsphone`,`dispositivo`) "
            . "VALUES ('" . $_POST['disco'] . "','" . $_POST['placa'] . "','" . $_POST['carga'] . "','" . $_POST['modelo'] . "','" . $_POST['nombreconduc'] . "','" . $_POST['apellidoconduc'] . "','" . $_POST['idconduc'] . "','" . $_POST['phone_input'] . "','" . $_POST['gpsphone_input'] . "','" . $_POST['dispositivo'] . "');";
    $result = $conn->query($query);
    if (!$result)
        die($conn->error);
    echo " Se registró correctamente el envío ";
}

if (isset($_POST['addedit'])) {
    $disco = $_POST['disco_edit'];
    $placa = $_POST['placa_edit'];
    $carga = $_POST['carga_edit'];
    $modelo = $_POST['modelo_edit'];
    $nombres = $_POST['nombre_edit'];
    $apellidos = $_POST['apellido_edit'];
    $cedula = $_POST['id_edit'];
    $phone = $_POST['phone'];
    $gpsphone = $_POST['gpsphone'];
    $device = $_POST['dispositivo'];

    $query = '';
    $query = "UPDATE discos SET `carga` = '$carga', `modelo` = '$modelo',`nombres` = '$nombres',`apellidos` = '$apellidos',`cedula` = '$cedula',`phone` = '$phone',`gpsphone` = '$gpsphone',`dispositivo` = '$device'
                 WHERE  idDisco = '".$_POST['editId']."'  ";
    $result = $conn->query($query);

    if (!$result)
        die($conn->error);
    echo "Se actualizó correctamente el envío";
}

if (isset($_POST['deleteDisco'])) {
    $query = "DELETE FROM discos WHERE idDisco = '" . $_POST['deleteId'] . "'";
    $result = $conn->query($query);
    if (!$result)
        die($conn->error);
    echo " Se registró correctamente el envío ";
}

if (isset($_POST['getList'])) {
    $query = "SELECT * FROM discos";
    $result = $conn->query($query);
    if (!$result)
        die($conn->error);
    while ($row_discos_list = $result->fetch_array(MYSQLI_BOTH)) {
        echo "<tr style='cursor:pointer'  class='singleing_row' >
                <td class='disco'>" . $row_discos_list['disco'] . "</td>
                <td class='placa'>" . $row_discos_list['placa'] . "</td>
                <td class='carga'>" . $row_discos_list['carga'] . "</td>	
                <td class='modelo'>" . $row_discos_list['modelo'] . "</td>	
                <td class='nombres'>" . $row_discos_list['nombres'] . "</td>
                <td class='apellidos'>" . $row_discos_list['apellidos'] . "</td>
                <td class='cedula'>" . $row_discos_list['cedula'] . "</td>
                <td class='phone'>" . $row_discos_list['phone'] . "</td>
                <td class='gpsphone'>" . $row_discos_list['gpsphone'] . "</td>
                <td class='devicetype'>" . $row_discos_list['dispositivo'] . "</td>
                <td class='idcontainer displaynone'>" . $row_discos_list['idDisco'] . "</td>
                <td class='delete_disco'><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button></td>
            </tr>";
    }
}
?>