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
	

	 <!-- Bootstrap -->
	<link href="../estilos/css/bootstrap.min.css" rel="stylesheet">
    	<link href="../estilos/css/login.css" rel="stylesheet">
    	<link href="../estilos/css/dataTables.bootstrap.min.css" rel="stylesheet">
    	<link href="../estilos/css/datepicker.css" rel="stylesheet">
	<title>Registro Pacientes</title>

	<script >
		 $(function () {
			$('.datepicker').datepicker();
		});
		</script>
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

	<div class="container">
	<h3 style=' color: #22467F;' >Registro de Pacientes</h3>
	<br>
	<table class="table table-bordered" id="table">
	
	<form  action="../controlers/php/registroPaciente.php" method="POST"  class="form-inline"  >
			<!--div para darle borde a los datos personales -->
			<div class="margin-form" style="
			border:1px solid #b0d1e5;
			padding: 1%;			
			">
			<h4> Datos personales</h4>	
				
				<!--para agrupar los componentes del tamaño col-xs-3-->
				<div class="row">
				
				<div class="col-xs-3">
				<div class="form-group">
				<label for="n-documento"> Número de documento</label>				
				<input class="form-control" type="text" id="n-documento" name="n-documento" >
				</div>
				</div>

				<div class="col-xs-3">
				<div class="form-group">
				<label for="sel-tipo-doc"> Tipo de documento</label>
				<select    name="sel-tipo-doc" class="form-control" id="sel-tipo-doc">
					
					<option value="cc">Cédula de ciudadanía</option>
					<option value="tarjeta">Tarjeta de identidad</option>	
					<option value="registro">Registro</option>	
				</select>
				</div>
				</div>

				<div class="col-xs-3">
				<div class="form-group">
				<label for="nombre1"> Primer nombre</label>				
				<input class="form-control" type="text" id="nombre1"  name="nombre1" >
				</div>
				</div>

				<div class="col-xs-3">
				<div class="form-group">			
				<label for="nombre2">Segundo nombre</label>
				<input class="form-control" type="text" id="nombre2" name="nombre2" >
				</div>
				</div>

				<div class="col-xs-3">
				<div class="form-group">
				<label for="apellido1">Primer apellido</label>
				<input class="form-control" type="text" id="apellido1" name="apellido1"  >
				</div>
				</div>




				<div class="col-xs-3">
				<div class="form-group">
				<label for="apellido2">Segundo apellido</label>
				<input class="form-control" type="text" id="apellido2" name="apellido2" >
				</div>
				</div>

				<div class="col-xs-3">
				<div class="form-group">
				<label for="sel-sexo"> Sexo</label>
				<select name="sel-sexo" class="form-control" id="sel-sexo">
					
					<option value="M">Masculino</option>
					<option value="F">Femenino</option>	
				</select>
					
				</div>
				</div>

				<div class="row">
				<div class="form-group">

					<div class="col-xs-3">
					<!--inicia código datepicker https://eonasdan.github.io/bootstrap-datetimepicker/-->
					<div class="input-group-date" >
						<label for="#datepicker">Fecha de nacimiento</label>
						<input type="text" class="datepicker" id="datepicker" placeholder="AAAA/MM/DD/" name="fecha">
						
						 
						
					</div>					
					</div>
				</div>


				 	
        					<!--finaliza código timepicker-->
        				</div>

        				<div class="col-xs-3">
				<div class="form-group">
				<label for="sel-vivo"> Vivo / Muerto </label>				
				<select   name="vivo" class="form-control" id="sel-vivo">
					
					<option value=1>Vivo</option>
					<option value=0>Muerto</option>	
				</select>
				</div>
				</div>

				<div class='col-xs-3'>
				<div class='form-group'>
				<label for='sel-sexo'> EPS</label>
				<select name="eps" class='form-control' id='sel-sexo'>
						
					
					<?php
						
						include("../controlers/php/conexion.php");				

								$conn = mysqli_connect($host, $userdb, $pw,$db);
						                                if (!$conn) 
						                                {
						                                        die("Connection failed: " . mysqli_connect_error());
						                                }

								//query
								$sql = "SELECT * FROM eps ";

								$result = mysqli_query($conn, $sql);			

								//respuesta de la BD				

								if (mysqli_num_rows($result) > 0) 
								{
									

						    		// output data of each row
						    		while($row = mysqli_fetch_array($result))
						    		 {
						    		 	
						    		 	echo "<option value=' ".$row[id_eps]." ' >".$row[nom_eps]."</option>";
						    		 	
						       		 
						    		}				    	
						    		


							}
						    mysqli_free_result($result);
						    mysqli_close($conn);

					?>

					</select>
					</div>
					</div>	
				
							
				

					
				</div>
				


			</div>

			<br><br>

			<!--div para darle borde a los datos clínicos -->
			<div class="margin-form" style="
			border:1px solid #b0d1e5;
			padding: 1%;			
			">
				<h4> Datos socio-demográficos</h4>	
				<!--para agrupar los componentes del tamaño col-xs-3-->

				<div class="row">

				<div class="col-xs-3">
				<div class="form-group">
				<label for="tel"> Teléfono</label>				
				<input class="form-control" type="text" id="tel" name="tel" >
				</div>
				</div>

				<div class="col-xs-3">
				<div class="form-group">
				<label for="dire"> Dirección</label>				
				<input class="form-control" type="text" id="dire" name="dire" >
				</div>
				</div>

				

				</div>
				

			</div>
			<br>

			<!--div para darle borde a los datos personales -->
			<div class="margin-form" style="
			border:1px solid #b0d1e5;
			padding: 1%;			
			">
				<h4> Datos clínicos</h4>	
				<!--para agrupar los componentes del tamaño col-xs-3-->

				<div class="row">

				<div class="col-xs-3">
				<div class="form-group">
				<label for="sel-vivo"> Enfermedades</label>				
				<select   name="enferm" class="form-control" >
					
					<?php

						include("../controlers/php/conexion.php");				

								$conn = mysqli_connect($host, $userdb, $pw,$db);
						                                if (!$conn) 
						                                {
						                                        die("Connection failed: " . mysqli_connect_error());
						                                }

								//query
								$sql = "SELECT * FROM emfermedad ";

								$result = mysqli_query($conn, $sql);			

								//respuesta de la BD				

								if (mysqli_num_rows($result) > 0) 
								{
									

						    		// output data of each row
						    		while($row = mysqli_fetch_array($result))
						    		 {
						    		 	
						    		 	echo "<option>".$row[enf_nom]."</option>";
						    		 	
						       		 
						    		}				    	
						    		


							}
						    mysqli_free_result($result);
						    mysqli_close($conn);

					?>
						
				</select>
				</div>
				</div>

				<div class="col-xs-5">
				<div class="form-group">
				<label for="estado"> Estado enfermedad</label>				
				<textarea class="form-control"  id="dire" name="estado" rows="5" > </textarea>
				</div>
				</div>




				

				

				</div>

				

			</div>
			<br>


			<button type="submit" class="btn btn-primary">Registrar usuario</button>		
			
				
		
		
	</form>
		
	</table>
	</div>
	
	
	


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../controlers/js/jquery.js"></script>
	
	
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../controlers/js/bootstrap.min.js"></script>
	
	<!--<script src="../controlers/js/validar-usuario-ajax.js"></script>-->
	<script src="../controlers/js/jquery.dataTables.min.js"></script>
	<!--moment.js para mostrar calendarios-->
	<script src="../controlers/js/bootstrap-datepicker.js"></script>
	

	<script type="text/javascript">
		$(function ()
		{
			$('.datepicker').datepicker(
				{
					format : 'yyyy-mm-dd'
				});

		});
	</script>
	
		
	
	
			
</body>
</html>