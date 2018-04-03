<?php

/////////////////////////////////////////////////////////////////////////////// BLOG CONTROL
/////////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
//error_reporting(E_ALL);
//ini_set('display_errors', 1);


require ("../conn.php");
session_start();

if (isset($_POST['leercedula'])) {
    $json = array();
    $query = "SELECT * FROM ingresos WHERE recedula = '" . $_POST['valorcedula'] . "'";
    $result = $conn->query($query);

    if (!$result)
        die($conn->error);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($row['isdom'] == '0') {
            $isdom = 'Oficina';
            $labeldom = 'default';
            $destino = $row['destinoIngreso'];
        } elseif ($row['isdom'] == '1') {
            $isdom = 'Domicilio';
            $labeldom = 'warning';
            $destino = $row['domaddr'];
        }
        if ($row['statusIngreso'] == 'nuevo') {
            $statuspedido = 'En origen';
            $labelpedido = 'primary';
            $readonly = "";
        } elseif ($row['statusIngreso'] == 'recibido') {
            $statuspedido = 'En destino';
            $labelpedido = 'info';
            $readonly = "";
        } elseif ($row['statusIngreso'] == 'despachado') {
            $statuspedido = 'Despachado';
            $labelpedido = 'success';
            $readonly = "disabled";
        }
        $row['view'] = '<tr class="sigle_pedido">
                            <td class="text-center trackingnumber_container">' . $row['trackingnumber'] . '</td>
                            <td><strong>' . $row['nombreIngreso'] . '</strong></td>
                            <td>' . $row['origenIngreso'] . '</td>
                            <td><span class="label label-' . $labelpedido . ' fontx120">' . $statuspedido . '</span></td>
                            <td class="nombrerecibe_container">' . $row['renombre'] . '</td>
                            <td>' . $destino . '</td>
                            <td class="cedularecibe_container">' . $row['reCedula'] . '</td>
                            <td><span class="label label-' . $labeldom . ' fontx120">' . $isdom . '</span></td>
                            <td>
                                <label class="switch">
                                    <input ' . $readonly . ' type="checkbox" value="1"/>
                                    <span></span>
                                </label>     
                            </td>
                            <td class="displaynone telefonorecibecontainer">' . $row['reTelef'] . '</td>
                            <td class="displaynone emailrecibecontainer">' . $row['reEmail'] . '</td>
                        </tr>';
        $json[] = $row;
    }
    if (empty($json)) {
        $query = "SELECT * FROM ingresos WHERE trackingnumber = '" . $_POST['valorcedula'] . "' LIMIT 1";
        $result = $conn->query($query);
        if (!$result)
            die($conn->error);
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            if ($row['isdom'] == '0') {
                $isdom = 'Oficina';
                $labeldom = 'default';
                $destino = $row['destinoIngreso'];
            } elseif ($row['isdom'] == '1') {
                $isdom = 'Domicilio';
                $labeldom = 'warning';
                $destino = $row['domaddr'];
            }
            if ($row['statusIngreso'] == 'nuevo') {
                $statuspedido = 'En origen';
                $labelpedido = 'primary';
                $readonly = "";
            } elseif ($row['statusIngreso'] == 'recibido') {
                $statuspedido = 'En destino';
                $labelpedido = 'info';
                $readonly = "";
            } elseif ($row['statusIngreso'] == 'despachado') {
                $statuspedido = 'Despachado';
                $labelpedido = 'success';
                $readonly = "disabled";
            }
            $row['view'] = '<tr class="sigle_pedido">
                            <td class="text-center trackingnumber_container">' . $row['trackingnumber'] . '</td>
                            <td><strong>' . $row['nombreIngreso'] . '</strong></td>
                            <td>' . $row['origenIngreso'] . '</td>
                            <td><span class="label label-' . $labelpedido . ' fontx120">' . $statuspedido . '</span></td>
                            <td class="nombrerecibe_container">' . $row['renombre'] . '</td>
                            <td>' . $destino . '</td>
                            <td class="cedularecibe_container">' . $row['reCedula'] . '</td>
                            <td><span class="label label-' . $labeldom . ' fontx120">' . $isdom . '</span></td>
                            <td>
                                <label class="switch">
                                    <input ' . $readonly . ' type="checkbox" value="1"/>
                                    <span></span>
                                </label>     
                            </td>
                            <td class="displaynone telefonorecibecontainer">' . $row['reTelef'] . '</td>
                            <td class="displaynone emailrecibecontainer">' . $row['reEmail'] . '</td>
                        </tr>';
            $json[] = $row;
        }
        if (empty($json)) {
            echo json_encode("error");
        } else {

            echo json_encode($json);
        }
    } else {
        echo json_encode($json);
    }
}


if (isset($_POST['addnewcheckout'])) {
    $trackinglist = json_decode($_POST['trackingCheckout'], true);
    foreach ($trackinglist as $sigletracking) {
        $query = "INSERT INTO checkout (nombreCheckout, cedulaCheckout, telefonoCheckout, emailCheckout, comentarioCheckout, trackingCheckout, dateCheckout)"
                . "VALUES ('" . $_POST['nombreCheckout'] . "','" . $_POST['cedulaCheckout'] . "','" . $_POST['telefonoCheckout'] . "','" . $_POST['emailCheckout'] . "','" . $_POST['comentarioCheckout'] . "','" . $sigletracking . "','" . date("Y-m-d") . "');";
        $query2 = "UPDATE ingresos SET statusIngreso = 'despachado' WHERE trackingnumber = '" . $sigletracking . "';";
        $result = $conn->query($query);
        if (!$result)
            die($conn->error);
        $result2 = $conn->query($query2);
        if (!$result2)
            die($conn->error);
    }
    echo "Todos los paquetes fueron actualizados exitosamente";
}
?>