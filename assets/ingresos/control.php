<?php

/////////////////////////////////////////////////////////////////////////////// BLOG CONTROL
/////////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
//error_reporting(E_ALL);
//ini_set('display_errors', 1);


require ("../conn.php");
session_start();

if (isset($_POST['addnewreg'])) {
    $ii = '0';
    while ($ii < $_POST["boletos"]) {
        $query = "INSERT INTO ingresos (asientoIngreso,coopIngreso,placaIngreso,rutaIngreso,horaIngreso,precioIngreso,cedulaIngreso,nombreIngreso,telefonoIngreso,emailIngreso,statusIngreso) "
                . "VALUES ('999','999','999','999','999','999','" . $_POST['cedula'] . "','999','999','999','nuevo');";
        $result = $conn->query($query);
        if (!$result)
            die($conn->error);
        $ii++;
    }
    echo "Todos los registros fueron cargados exitosamente, La cantidad de boletos son: " . $_POST["boletos"];
}
?>