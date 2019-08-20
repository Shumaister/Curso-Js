
<?php
require('conexion.php');
//capturar el nombre del cliente
$nom=$_POST['nombres'];
//seleccionamos los datos del cliente por su nombre
$sql=mysql_query("SELECT * FROM clientes WHERE nombres='".$nom."'",$con);
$row = mysql_fetch_array($sql);
//mostrando el resultado
echo 	"<p><strong>Direccion</strong></p><p>".$row['direccion']."</p>";
echo 	"<p><strong>Telefono</strong></p><p>".$row['telefono']."</p>";
echo 	"<p><strong>Email</strong></p><p>".$row['email']."</p>";
?>



