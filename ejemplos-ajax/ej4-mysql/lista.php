<?php
require('conexion.php');

//seleccionamos solo el nombre de los clientes
$sql=mysql_query("SELECT nombres FROM clientes",$con);

?>
<select name="lista" onchange="pedirDatos()" >
  <option selected="selected">seleccionar...</option>
<?php
while($row = mysql_fetch_array($sql)){
	echo "<option value=\"".$row['nombres']."\">".$row['nombres']."</option> \n";
}
?>
</select>
