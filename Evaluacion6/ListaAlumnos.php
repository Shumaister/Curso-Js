<!doctype html>
 
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Evaluacion 6</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />

    <style>
    #draggable { list-style-type: none; margin: 0; padding: 0; width: 20%; }
    #draggable li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 15px; width: 150px; } }
    html>body #draggable li { height: 1.5em; line-height: 1.2em; }
    .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
    div.desde {
        position: absolute;
        left: 100px;
        top: 150px;
        border: 3px solid #9C9C9C;
        padding-top: 18px;
        padding-right: 15px;
        padding-bottom: 15px;
        padding-left: 18px;
    }

    div.hasta {
        position: absolute;
        left: 800px;
        top: 150px;
        border: 3px solid #9C9C9C;
        height: 100px; 
        width: 180px;
        padding-top: 18px;
        padding-right: 15px;
        padding-bottom: 15px;
        padding-left: 18px;
    }
    </style>
    <script>

    $(document).ready(function()
        {
            $("#draggable li" ).draggable({grid: [20,20]});
            $("#divDestino").droppable( {accept:"#draggable li", tolerance:"fit", grid: [20,20], drop:elementoSoltado });
        });

    var count = 0;
    function elementoSoltado( event, ui ){
        count+=1;
        if(count==3)
        {
            alert("Ha llegado al máximo. Solo se pueden seleccionar tres alumnos!");
            $("#divDestino").droppable('disable');
            return;
        }
        $("#"+this.id).css( "height", "+=30" );
    }

    </script>
</head>
<body>

<div class="desde">
    <h4>Lista de Alumnos</h4>
    <?php
    include ('conect.php');

    $result = mysqli_query($conexion,"select * from personas order by orden");

    if (mysqli_num_rows($result) != 0){
        echo '<form action="ordenar.php" method="post">';
	    echo '<ul id="draggable">';
	    while ($row=mysqli_fetch_array($result)){
            echo '<li class="ui-state-default"><input type="hidden" value="'.$row['id_persona'].'" name="idpersona[]" />'.$row['nombre'].'</li>';
	    }
	    echo '</ul>';
	    echo '</form>';
    }
    else{
        echo 'Aun no hay datos';
    }       
    ?>
</div>


<div id="divDestino" class="hasta">
    <h4>Alumnos Seleccionados</h4>
</div>

</body>
</html>