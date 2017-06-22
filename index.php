<script src="jquery-1.10.2.min.js"></script>
  <script>
   function obtenerCiudades(val) 
   {
     $.ajax
     ({
        type: "POST",
        url: "get_ciudad.php",
        data:'id_pais='+val,
        success: function(data)
        {
           $("#lista_ciudades").html(data);
        }
     });
   }
</script>
<?php
require_once("config.php");
$variable_Consulta = "0";
if (isset($VARIABLE)) {
  $variable_Consulta = $VARIABLE;
}
$hostname_con = "localhost";
$database_con = "estadosmunicipios";
$username_con = "root";
$password_con = "";
$con = mysqli_connect($hostname_con, $username_con, $password_con, $database_con);
mysqli_set_charset($con, 'utf8');
$consulta_paises = mysqli_query($con,("select id as 'valor', descripcion as 'descripcion' from pais order by descripcion")) or die(mysqli_error($con));
$consulta_ciudades = mysqli_query($con,"select id_pais as 'valor', descripcion as 'descripcion' from ciudad order by descripcion");
?>
<div class="form-group col-md-3">
  <label>Paises:</label>
  <select name="pais" class="form-control" id="lista_paises" onChange="obtenerCiudades(this.value);">
    <option value="">Seleccionar Pais</option>
    <?php
     while($row= mysqli_fetch_assoc($consulta_paises))
     { ?>
     <option value="<?php echo $row['valor']?>"> <?php echo $row['descripcion'];?> </option><?php } ?>
  </select>
</div>
<div class="form-group col-md-6">
  <label>Ciudades:</label>					
   <select name="ciudad" id="lista_ciudades" class="form-control">
      <option value=''>Seleccionar Ciudad</option>
      <?php
       while($row= mysqli_fetch_array($consulta_ciudades))
       {
          echo "<option value='".$row['valor']."'>".$row['descripcion']."</option>";
       }
      ?>
   </select>
</div>