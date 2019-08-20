<!doctype html>
 
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Evaluacion 7</title>
    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script src="ajax_lib.js" language="JavaScript"></script>
    <script src="funciones.js" language="JavaScript"></script>

    <style>
    </style>

    <script>
        $(document).ready(function(){
            cargarCarreras();
        });
    </script>

</head>
<body>

    <h2>Carreras y Materias!</h2>
    <br>

    Seleccione la carrera:
    <select id="carreras" name="carreras" onchange="cargarMaterias();">
    </select>
    
    <br>
    <br>
    
    Materias de la carrera:
    <select id="materias" name="materias">
    </select><span id="espera"></span>
<br>
</body>
</html>