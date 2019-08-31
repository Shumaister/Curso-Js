<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />


<title>Admin Propiedades</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/fonts.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="scripts/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.9.2.custom.js"></script>


<script>

	$(document).ready(function(){ 
		cargar_all();	
	
		$("#imagen").submit(function(e) {
 
			var formObj = $(this);
			var formURL = formObj.attr("action");
			var formData = new FormData(this);
			$.ajax({
				url: formURL,
				type: 'POST',
				data:  formData,
				mimeType:"multipart/form-data",
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					$('#mensajeRespuesta').append(data);
				}         
			});
			e.preventDefault(); //Prevent Default action.
		});		
	})
	
	function guardar(){
		var renglones = [];
		$('li#renglon.clearAfter').each(function (index, value) {
			var bloqueRenglon = '{ "id": "' + $(this).attr('text') + '", "position": "' + index + '"}';
			renglones.push(bloqueRenglon);
		});
	 	var jsonArrayRenglones = JSON.parse(JSON.stringify(renglones));

		$.ajax({
		   type: "POST",		
		   url: "guardarImagenes.php",
		   data: jsonArrayRenglones,
		   "success":function(data){
				$('#secondaryContent').html(data);	
				console.log(jsonArrayRenglones);
		 		// Aca debería cargar nuevamente las lineas, pero como no persisto el orden debido a que no tengo base de datos, dejo la linea comentada
		 		//	cargar_all();	
		   }
		});
	}		

	function cargar_all(){
		$.ajax({
		  type: "POST",
		  url: "consultarImagenes.php",
		  "success":function(data){
		   		$('#imagenesObtenidas').html(data);	
		   		do_sorteable();
			}
		});
	}

	function do_sorteable(){
		$(function() {
       		$( "#sortable" ).sortable({
            	placeholder: "ui-state-highlight",
				handle: "a.sort",
	 			axis: "y"
        	});
        	$( "#sortable" ).disableSelection();
    	});
	}

</script>

</head>
<body id="propiedad">
	<?php
		session_start();
		$_SESSION['seccion']= "propiedades";
	?>
	  
	<?php  
	  include ('includes/admin_header.php');
	?>

	<div id="page" class="admin">
		<div class="pageWidth clearAfter">
		
			<ul id="subNav" class="clearAfter">
				<li class="active"><a href="#">Alquiler</a></li>
				<li><a href="#">Venta</a></li>
			</ul>
			
					
			<div id="ubicacion" class="clearAfter">
				<div class="titulo">
					<input type="text" class="title" placeholder="Calle y altura"/>
					<input type="text" class="entreCalles" placeholder="Entre calle y calle"/>
				</div>
				<input type="text" class="localidad" placeholder="Barrio - Localidad"/>
			</div>
						
			<div id="primaryContent">

				<div id="photoList">

					<!-- Aca al cargar la página se hace el get de todas las imagenes que existan en el servidor -->
					<div id="imagenesObtenidas">
					</div>

				<form id="imagen" action="subirImagenes.php" method="post" enctype="multipart/form-data">
					<h2>Agregar imagen</h2>
					
					<input  name="userfile" type="file">

					<input type="submit" id="addImage" value="Cargar"/>
				</form> 

				</div>

				<input type="submit" id="mainAction" value="Guardar" onclick="guardar();"/>
				
			</div>
		
			<br>

			<div id="mensajeRespuesta">
			</div>

			<div id="secondaryContent" >			
	    	</div>

		</div>
	</div>
	
	<?php  
    	include ('includes/footer.php');
	?>

</body>
</html>
