<?php 
// Se incluye el archivo config que tiene la variables globales y la conexion a la BBDD
include("../../config/config.php");
// Se obtienen los valores de email y password del formulario de la vista usando metodo POST
$email = $_POST["email"];
$password = $_POST["password"];

// Se crea la consulta sql para traer los datos de la tabla
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
// Se prepara el consulta
$query = $pdo->prepare($sql);
// Se ejecuta el consulta
$query->execute();
// Se usa fetchAll para traer los resultados de la consulta en un array asociativo y se almacena en $usuarios (PDO::FETCH_ASSOC accede al metodo estatico de PDO sin instanciar)
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

// Se usa un contador para saber si se ha encontrado resultados
$contador = 0;
// Se recorre el array asociativo buscando "password"
foreach ($usuarios as $usuario){
  // Se alcena "password" en una nueva variable
  $password_tabla = $usuario['password'];
  // Se aumenta el cargador para indicar que hay un resultado
  $contador++;
}
// Se valida el contador y se usa password_verify(contrasena de usuario, contrasena hashed de la tabla) para verificas que ambas contrasenas sean iguales
if($contador>0 && password_verify($password,$password_tabla)){
  // Se redirecciona al dashboard
 header("Location:".APP_URL."/app/views/dashboard");
} else{
  // Se redirecciona al login
  header("Location:".APP_URL."/app/views/login");
}