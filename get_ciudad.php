<?php
require_once("config.php");
//creamos conexión
$conexion = new DBConexion();
 
//pasamos id del país
if(!empty($_POST["id_pais"])) 
{
   $query ="SELECT id, descripcion FROM ciudad WHERE id_pais = '" . $_POST["id_pais"] . "'";
   $results = $conexion->ejecutarQuery($query);
 
   //construimos lista nueva dependiente
   ?>
     <option value="">Seleccionar Ciudad</option>
   <?php
   foreach($results as $ciudad) 
   {
   ?>
      <option value="<?php echo $ciudad['id']?>"> <?php echo $ciudad['descripcion']; ?></option>
   <?php
   }
}
?>