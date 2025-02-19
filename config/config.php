<?php

define("SERVIDOR", "localhost");
define("USUARIO", "root");
define("PASSWORD", "");
define("DB", "acuafit");

define("APP_NAME", "ADMINISTRACIÓN ACUAFIT");
define("APP_URL", "http://localhost/acuafit");
define("KEY_API_MAPS", "");

$servidor = "mysql:dbname=" . DB . ";host=" . SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    echo "Conexión exitosa a la base de datos";
} catch (PDOException $e) {
    echo "Error, no se pudo conectar a la base de datos: " . $e->getMessage();
}

date_default_timezone_set("America/Bogota");
$fechaHora = date("Y-m-d H:i:s");
$fecha_ctual = date("Y-m-d");
$dia_actual = date("d");
$mes_actual = date("m");
$anno_domini = date("Y");

