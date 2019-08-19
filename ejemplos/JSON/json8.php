<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consumir JSON desde PHP generado por la API de Panoramio</title>
</head>

<body>
<?php
/*
Panoramio es un popular servicio de Google, que permite subir imágenes localizadas geográficamente en los mapas de Google. Panoramio dispone de un API para la integración de las fotografías de su base de datos en otras aplicaciones web, de manera que cualquier persona puede presentar fotos de lugares del mundo subidas por los usuarios de Panoramio, en su propio sitio web.

El API de Panoramio utiliza JSON como formato de intercambio de la información de las fotos. Por medio de este API podemos construir URL, que solicitadas al sitio de Panoramio, nos devuelven un JSON con los datos de las fotografías, es decir, su título, autor, URL del archivo gráfico, etc. Gracias a la integración de JSON en la mayoría de los lenguajes de programación de aplicaciones web, desde casi todas las plataformas de programación para el desarrollo, se pueden obtener fácilmente las fotos y presentarlas en un sitio web. 
*/

function leer_contenido_completo($url){
   $fichero_url = fopen ($url, "r");
   $texto = "";
   while ($trozo = fgets($fichero_url, 1024)){
      $texto .= $trozo;
   }
   return $texto;
}

$URL_API_PANORAMIO = "http://www.panoramio.com/map/get_panoramas.php?order=popularity&set=full&from=0&to=5&minx=-0.35&miny=39.44&maxx=-0.34&maxy=39.46&size=medium";

$contenido_url = leer_contenido_completo($URL_API_PANORAMIO);

echo $contenido_url;

$JSON_PANORAMIO_PHP = json_decode($contenido_url);

echo '<br /><br /><pre>';
print_r($JSON_PANORAMIO_PHP);
echo '</pre>';

echo "<hr>";

//echo $JSON_PANORAMIO_PHP->count; //esto muestra el número de fotos totales que existen en Panoramio en esa localización
for ($i=0; $i<count($JSON_PANORAMIO_PHP->photos); $i++){
   $foto_actual = $JSON_PANORAMIO_PHP->photos[$i];
   echo "<p>";
   echo "<img src='" . $foto_actual->photo_file_url . "' width='" . $foto_actual->width . "' height='" . $foto_actual->height . "'>";
   echo "<br>";
   echo "<small>" . $foto_actual->photo_title . ", por " . $foto_actual->owner_name . "</small>";
   echo "</p>";
}
?>

</body>
</html>
