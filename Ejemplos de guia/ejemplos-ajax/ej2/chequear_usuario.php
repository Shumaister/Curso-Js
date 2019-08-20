<?php

sleep(1); //el retardo lo utilizo para que puedan ver la imagen .gif 

$con = mysql_connect('localhost', 'root', '') or die (mysql_error()); 
mysql_select_db('usuarios2', $con) or die (mysql_error()); 

$sql = "select * from claves where user = '".$_POST['usuario']."'";

$result = mysql_query($sql);
mysql_fetch_array($result);

if (mysql_num_rows($result)!=0){
	echo 'nodisp';
}
else{
	echo 'disp';
}



?>