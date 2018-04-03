<?php

/////////////////////////////////////////////////////////////////////////////// BLOG CONTROL
/////////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';


require ("../conn.php");
session_start();

if (isset($_POST['addnewreg'])) {
    $trackingnumber = uniqid('UTN');
    $trackingnumber = strtoupper($trackingnumber);
    $query = "INSERT INTO ingresos (`pesoIngreso`, `placaIngreso`, `origenIngreso`, `destinoIngreso`, `horaIngreso`, `precioIngreso`, `cedulaIngreso`, `nombreIngreso`, `telefonoIngreso`, `emailIngreso`, `statusIngreso`, `reCedula`, `renombre`, `reTelef`, `reEmail`, `observaciones`, `reportIngreso`, `trackingnumber`, `isdom`, `domaddr`) "
            . "VALUES ('" . $_POST['peso'] . "','" . $_POST['placa'] . "','" . $_POST['origen'] . "','" . $_POST['destino'] . "','" . $_POST['horario'] . "','" . $_POST['precio'] . "','" . $_POST['cedula'] . "','" . $_POST['nombre'] . "','" . $_POST['telefono'] . "','" . $_POST['email'] . "','nuevo' , '" . $_POST['recedula'] . "','" . $_POST['renombre'] . "','" . $_POST['retelefono'] . "','" . $_POST['reemail'] . "','" . $_POST['observaciones'] . "','" . $_POST['reportIngreso'] . "','" . $trackingnumber . "','" . $_POST['isdom'] . "','" . $_POST['domaddr'] . "')";
    $result = $conn->query($query);
    $order_id = $conn->insert_id;
    
    if (!$result)
        die($conn->error);

    if ($_POST['reportIngreso'] == '1') {
        $mail = new PHPMailer(true);

        try {
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';

            $mail->Host = "mail.bitecorp.com"; // SMTP server example
            $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
            $mail->SMTPAuth = true;                  // enable SMTP authentication
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Username = "sms@bitecorp.com"; // SMTP account username example
            $mail->Password = "W1nnts3rv3r";        // SMTP account password example
            $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom('sms@bitecorp.com');
            $mail->addAddress($_POST['email']);               // Name is optional
            $mail->addAddress($_POST['reemail']);               // Name is optional
            $mail->addAddress('sms@bitecorp.com');               // Name is optional

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Recepción de Paquete Company Name';
            $mail->Body = '<img class="logo" src="http://commerce-place.com:88/img/logo_rec2.png"> <br />'
                    . 'Hola! <br /> Este mensaje tiene por motivo notificar que se ha ingresado un nuevo env&iacute;o en el sistema <br /> Los datos de la operaci&oacute;n son los siguientes <br /> '
                . 'Persona que envia: ' . $_POST['nombre'] . ' <br /> '
                . 'Telefono de Persona que envia: ' . $_POST['telefono'] . ' <br /> '
                . 'Persona que recibe: ' . $_POST['renombre'] . ' <br /> '
                . 'Telefono de Persona que recibe: ' . $_POST['retelefono'] . ' <br /> '
                . 'Fecha programada de entrega: ' . $_POST['horario'] . ' <br /> '
                . 'Tu paquete ya se encuentra en camino!';
            $mail->send();
            echo $order_id;
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
        }
    } 
    else {
        echo " Se registró correctamente el envío";
    }
}
?>