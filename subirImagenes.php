<?php

 $nombre_archivo =  $_FILES['userfile']['name'];
 $tipo_archivo = $_FILES['userfile']['type'];
 $tamano_archivo = $_FILES['userfile']['size'];
 $uploads_dir = 'photos';

 
//compruebo si las características del archivo son las que deseo
if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 100000))) 
{
    echo "La extensi&oacute;n o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg</li><li>se permiten archivos de 100 Kb m&aacute;ximo.</li></td></tr></table>";
}
else
{
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], "$uploads_dir/$nombre_archivo"))
    {
        // Dentro de este if haría el insert SLQ guardando el nuevo path y los ids necesarios.

       echo "<div id='imagenSubida'><br><h3>El archivo ha sido cargado correctamente.<h3><br/><img src='".$uploads_dir."/".$_FILES['userfile']['name']."'/><br/><hr></div>";
    }
    else
    {
       echo "Ocurri&oacute; alg&uacute;n error al subir el fichero. No pudo guardarse.";
    }
}

?> 
