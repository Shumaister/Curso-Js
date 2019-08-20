var canal;
	function cargarMaterias() {
		var codigoCarrera = $("#carreras option:selected").index();
		$.ajax({
			url: 'cargarMaterias.php',
			type: 'GET',
			data: "codigoCarrera="+codigoCarrera,
			dataType:"json",
			success:  function(data) {
		
				var selectMaterias=document.getElementById('materias');
				selectMaterias.options.length=0;
				for(var i=0; i<data.materias.length ;i++)
				{
					var op=document.createElement('option');
					var texto=document.createTextNode(data.materias[i]);
					op.appendChild(texto);
					selectMaterias.appendChild(op);
				}

			},
			error: function(er) {
				console.log(er);
				alert("Fallo la conexión con db.");
				}
		});

	}

	function cargarCarreras(){
		$.ajax({
			url: 'cargarCarreras.php',
			type: 'GET',
			dataType:"json",
			success:  function(data) {
				var selectCarreras=document.getElementById('carreras');
				selectCarreras.options.length=0;
				for(f=0;f<data.length;f++)
				{
					var op=document.createElement('option');
					var texto=document.createTextNode(data[f]);
					op.appendChild(texto);
					selectCarreras.appendChild(op);
				}
				cargarMaterias();
			},
			error: function(er) {
				
				var d=document.getElementById('espera');
				d.innerHTML = '<img src="loader.gif">';  

				alert("Fallo la conexión con db.");
				}
		});
	}
