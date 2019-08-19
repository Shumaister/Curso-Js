<?php

if (!isset($_POST['foto']) ) exit;
if (!ctype_digit($_POST['foto']) ) exit;


$cn=mysql_connect("localhost","root","");

$epigrafe=mysql_real_escape_string($_POST['epigrafe']);


$res=mysql_query('update frba.fotos_ajax set 
				epigrafe="'.$epigrafe.'" 
				where id_foto='.$_POST['foto']);

if (!mysql_error() ) echo 'ok';
else echo 'err';

?>