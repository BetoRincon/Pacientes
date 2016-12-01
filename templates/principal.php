<?php
 session_start();			
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags-->
	<title>Home</title>

	 <!-- Bootstrap -->
	<link href="../estilos/css/bootstrap.min.css" rel="stylesheet">
    	<link href="../estilos/css/login.css" rel="stylesheet">
    	<link href="../estilos/css/dataTables.bootstrap.min.css" rel="stylesheet">


	<title>Primera</title>
</head>
<body>
	<div class="container"> 
	<!--Nav-->
	<?php
				 echo "<nav class='navbar  navbar-default navbar-fixed-top' style='background: white;'>
					<div class='container'>
				 <p class='navbar-brand' style=' color: #22467F;' >Usuario: ".strtoupper($_SESSION['usuario'])."</p>
					<div class='collapse navbar-collapse'>
					<ul class='nav navbar-nav'>
						<li><a style=' color: #22467F;'  href='#'>Inicio</a></li>
						<li><a style=' color: #22467F;'  href='registro-paciente.php'>Registrar Paciente</a></li>
						
						
					</ul>
					<p class='navbar-text navbar-right'> | Tratamiento de Pacientes Crónicos</p>
					</div>
					</div>
					</nav>";
				
	?>
	</div>
	<br><br>

	<div class="container">
	<h3>Lista de Pacientes</h3>
	<br>
	<table class="table table-bordered table-hover table-stripe table-cell-border table-row-border " id="table" >
	<thead>
		<tr>
			<th style="text-align: center;">Identificación</th>
			<th style="text-align: center;">Tipo</th>
			<th style="text-align: center;">Nombre</th>
			<th style="text-align: center;">Apellido</th>
			<th style="text-align: center;">EPS</th>
			<th style="text-align: center;">Enfermedades</th>
			<th style="text-align: center;">Estado programa</th>
			<th style="text-align: center;">Ver usuario</th>
		</tr>
	</thead>
		
	</table>
	</div>

	
	


	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../controlers/js/jquery.js"></script>
	
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../controlers/js/bootstrap.min.js"></script>
	<!--<script src="../controlers/js/validar-usuario-ajax.js"></script>-->
	<script src="../controlers/js/jquery.dataTables.min.js"></script>

    	<script >

    		//usar DataTables
    		//-->https://www.youtube.com/watch?v=RInf8KPptO0&index=3&list=PLBZpL77Yun3rAHYeYH_NMUga3H8rarN3e

		$(document).ready(function(){

			
			listar();

		});

		var listar= function()
		{
			var table =$("#table").DataTable({
				"ajax":
				{
					"method": "POST",
					"url": "../controlers/php/listarPrincipal.php"
				},
				"columns":[
					{"data":"doc_num"},
					{"data":"doc_tipo"},
					{"data":"nom_1"},
					{"data":"ape_1"},
					{"data":"nom_eps"},
					{"data":"enf_nom"},
					{"data":"activo"},
					{"defaultContent":"<button class=' informacion btn '>Información</button>"}
				],


				});
			obtenerDatos("#table tbody",table);
		}

		//obtener datos de tabla
		//-->https://www.youtube.com/watch?v=mV6L4_Mwh3U&list=PLBZpL77Yun3rAHYeYH_NMUga3H8rarN3e&index=6
		var obtenerDatos = function(tbody,table)
		{
			$(tbody).on("click","button.informacion",function()
			{
				 var data = table.row($(this).parents("tr") ).data();
				 //la información se obtiene del objeto columns de la DataTable por eso se
				 //escribnem data.nombre_de_la_columna_de_la_BD
				 var nombre1=data.nom_1;
				
				 var apellido1=data.ape_1;

				 var doc_num=data.doc_num;
				 //alert(doc_num);
				
				 
				 var prueba="prueba";
				  console.log(prueba);
				  //usamos   window.location.href para enviar vaolers a usuario.php por el método GET
				  //http://stackoverflow.com/questions/8191124/send-javascript-variable-to-php-variable
				  window.location.href = "usuario.php?Nombre=" + nombre1+" "+apellido1+"&doc_num="+doc_num;

				  //ajax sirve para mostrar la respuesta del servidor en la misma página web

				/*$.ajax({
					type:"POST",					
					url:"usuario.php",
					data: {Nombre:prueba},
					success: function(response){
						alert("todo bien");
						 
					},
					error: function(e){
						console.log(e.message);
						
					}
				});
				window.location.href = "usuario.php";*/
				

			});


		}


	</script>

</body>
</html>