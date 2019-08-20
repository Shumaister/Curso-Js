<?php   
  
  $ing = $_GET['codigoCarrera'];

  if ($ing==0)
  {
      echo json_encode(["materias"=> ["Programacion I","Analisis Matematico","Estructura de las Organizaciones","Etica Profesional"]]); exit;
  }
  if ($ing==1)
  {
      echo json_encode(["materias"=> ["Fundamentos de Fisica","Analisis Matematico 1","Ingles Tecnico I","Sistemas de Comunicaciones I"]]); exit;
  }
  if ($ing==2)
  {
      echo json_encode(["materias"=>["Informatica I","Multimedia I","Bases de Datos"]]); exit;
  }
  if ($ing==3)
  {
      echo json_encode(["materias"=> ["Circuitos","Analisis Matematico","Estructura de los procesadores",]]); exit;
  }

  echo json_encode([]); exit;
?>

