<?php
//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//La "p" antes de localhost indica que la conexión es persistente (http://blog.ayzweb.com/tutorial/conexion-php-a-mysql-mysql_connect-o-mysql_pconnect-persistente)
//Copyright Jorge Vila 2015

if (!isset($_SESSION)) {
  session_start();
}

$hostname_con = "p:localhost";
$database_con = "pagina2017";
$username_con = "root";
$password_con = "";
$con = mysqli_connect($hostname_con, $username_con, $password_con, $database_con);
mysqli_set_charset($con, 'utf8');
if (!$con) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
echo "Información del host: " . mysqli_get_host_info($con) . PHP_EOL;
?>