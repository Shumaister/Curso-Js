<?php
    
    // Para simular el orgen, este array deberia ser ordenado por el numero de orden que viene de base de datos.
    $photos=array('photos/thumb_01.jpg','photos/thumb_02.jpg','photos/thumb_03.jpg');

    $idContador = 0;

    echo '<ul id="sortable">';
    foreach($photos as $path){ 
        // con este contador simulo el ID que vendría de base
        $idContador += 1;

        echo'<li id="renglon" class="clearAfter" text="'.$idContador.'">
            <span class="photo" style="background: url('.$path.')"></span>
            <a href="#" class="delete">Eliminar</a>
            <a href="#" class="sort">Ordenar</a>
        </li>';	
    }
    echo '</ul>';

?>

<!-- Por incompatibilidades con MySQL, devuelvo el HTML de las imagnes que se hubieran guardado en base de datos -->