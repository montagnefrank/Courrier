<?php
// Conexion a la base de datos LOCAL
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'vagrant');
define('DB_DATABASE', 'transportes');

// Conexion a la base de datos CLOUD
//define('DB_HOST', 'localhost');
//define('DB_USER', 'root');
//define('DB_PASSWORD', 'W1nnts3rv3r');
//define('DB_DATABASE', 'transportes');

$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
if($conn->connect_error)
{
    echo "No se puede establecer la conexión con la BASE DE DATOS Master";
} 