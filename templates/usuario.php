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
						<li><a style=' color: #22467F;'  href='principal.php'>Inicio</a></li>
						<li><a style=' color: #22467F;'  href='registro-paciente.php'>Registrar Paciente</a></li>
						
						
					</ul>
					<p class='navbar-text navbar-right'> | Tratamiento de Pacientes Crónicos</p>
					</div>
					</div>
					</nav>";
				
	?>
	</div>
	<br><br>

	<?php
		echo "<div class='container'>";
		$doc_num=$_GET['doc_num'];
		$nombre=$_GET['Nombre'];
		echo "<h1>Información  de ".$nombre."</h1>";
			echo "<div class='container'>";
						
			echo "</div>";
		echo "<div >";

	?>


	<div class="container" style="
			border:1px solid #b0d1e5;
			padding: 1%;			
			">
		
		
		 <?php 
		 echo "<h3>Datos del Paciente</h3>
			<p> Número de documento: ".$doc_num."</p>";
		?>

	</div>
	<br> 

	<div class='container' style="
			border:1px solid #b0d1e5;
			padding: 1%;			
			">
	<h3>Citas </h3>

	<br>
	<table class="table table-bordered table-hover table-stripe table-cell-border table-row-border " id="table" >
	<thead>
		<tr>
			<th style="text-align: center;">Fecha</th>
			<th style="text-align: center;">Clarificación</th>
			<th style="text-align: center;">Talla</th>
			<th style="text-align: center;">Peso</th>
			<th style="text-align: center;">IMC</th>
			<th style="text-align: center;">TAD</th>
			<th style="text-align: center;">TAS</th>
			<th style="text-align: center;">Observaciones</th>
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



	</script>

</body>
</html>