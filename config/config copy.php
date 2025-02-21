<?php

define("DB_HOST", "localhost");
define("DB_NAME", "acuafit");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("APP_NAME", "ADMINISTRACIÓN ACUAFIT");
define("APP_URL", "/public/");
define("KEY_API_MAPS", "");
define("ENV", 'development'); // O 'production' dependiendo del entorno

$servidor = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST;

try {
    $pdo = new PDO($servidor, DB_USER, DB_PASSWORD, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Habilitar excepciones
    ));
    if (ENV == 'development') {
        echo "Conexión exitosa a la base de datos";
    }
} catch (PDOException $e) {
    if (ENV == 'development') {
        echo "Error, no se pudo conectar a la base de datos: " . $e->getMessage();
    } else {
        echo "Error, no se pudo conectar a la base de datos";
    }
}

date_default_timezone_set("America/Bogota");
$fechaHora = date("Y-m-d H:i:s");
$fecha_ctual = date("Y-m-d");
$dia_actual = date("d");
$mes_actual = date("m");
$anno_domini = date("Y");

?>
