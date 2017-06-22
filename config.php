<?php
class DBConexion 
{
   private $servidor = "localhost";
   private $usuario = "root";
   private $contrasenya = "";
   private $baseDatos = "estadosmunicipios";
 
   function __construct() 
   {
      $con = $this->connectDB();
      if(!empty($con)) 
      {
          $this->selectDB($con);
      }
    }
 
   function connectDB() 
   {
      $con = mysqli_connect($this->servidor,$this->usuario,$this->contrasenya);
      return $con;
   }
 
   function selectDB($con) 
   {
      mysqli_select_db($con,$this->baseDatos);
   }
 
   function ejecutarQuery($query) 
   {
      $result = mysqli_query($query);
      while($row=mysqli_fetch_assoc($result)) 
      {
         $resultset[] = $row;
      }		
      if(!empty($resultset))
      {
         return $resultset;
      }
   }
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