<?php
 session_start();			
 include("../controlers/php/conexion.php");
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
				 echo utf8_decode("<nav class='navbar  navbar-default navbar-fixed-top' style='background: white;'>
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
					</nav>");
				
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
		
		<div class="row">

			<div class="col-sm-12">

				<div class="row">

					<div class="col-sm-5">
						<?php 

						$conn=mysqli_connect($host, $userdb, $pw,$db);
						if (!$conn) 
						{
							die("error: ".mysqli_connect_error());
						}

						$sql="SELECT TIMESTAMPDIFF(YEAR,`fecha_nac`,CURDATE()) AS edad,
							sexo as sexo,
					        emfermedad.enf_nom AS enfermedad
					        FROM user,emfermedad
					        WHERE
					      	user.id_usu=(SELECT user.id_usu FROM user WHERE user.doc_num=".$doc_num." )
					        AND emfermedad.id_enf=(SELECT usuario_enfermedad.enfermedad_id_enf FROM usuario_enfermedad
					                               WHERE usuario_enfermedad.usuario_id_usuario=(SELECT user.id_usu FROM user WHERE 									user.doc_num=".$doc_num."))";

					             $result=mysqli_query($conn,$sql);
					             if (!$result)
					              {
					             	die("error en consulta: ");
					             }
					             else
					             {
					             	while ($data=mysqli_fetch_assoc($result) )
							{
		
								$edad=$data['edad'];
								$sexo=$data['sexo'];
					              		$enfermedad=$data['enfermedad'];
							}
					              	
					             }
					             mysqli_free_result($result);
						mysqli_close($conn);


						 echo "<h3>Datos del Paciente</h3>
							<p> Número de documento: ".$doc_num."</p>
							<p>Edad: ".$edad."</p>
							<p>Sexo: ".$sexo."</p>
							<p>Enfermedad: ".$enfermedad."</p>";
						?>							
					</div>	
					<div class="col-sm-7">
						<h3>Seguimiento del Paciente</h3>

						<?php
							echo "<p>Fecha actual: ".date('d-m-Y')."</p>";
							echo "<form action='../controlers/php/usuarioVisita.php?doc_num=".$doc_num."' method='POST'  >";
							//meto el form para poder enviar el número de documento al UsuarioVisita
						?>
						
							
							<div class="col-xs-3">
								<div class="form-group">
								<label for="altura" >Altura [cm]</label>				   
								<input type="text" class="form-control" id="altura" name="altura">			
								</div>
							</div>

							<div class="col-xs-3">
								<div class="form-group">
								<label for="peso" >Peso [Kg]</label>				   
								<input type="text" class="form-control" id="peso" name="peso">			
								</div>
							</div>


							<div class="col-xs-3">
								<div class="form-group">
								<label for="riesgo" >Grado de Riesgo</label>				   
								<input type="text" class="form-control" id="riesgo" name="riesgo">			
								</div>
							</div>

							<div class="col-xs-3">
								<div class="form-group">
								<label for="tfg" >TFG</label>				   
								<input type="text" class="form-control" id="tfg" name="tfg">			
								</div>
							</div>

							<div class="col-xs-3">
								<div class="form-group">
								<label for="tas" >TAS</label>				   
								<input type="text" class="form-control" id="tas" name="tas">			
								</div>
							</div>

							<div class="col-xs-3">
								<div class="form-group">
								<label for="tad" >TAD</label>				   
								<input type="text" class="form-control" id="tad" name="tad">			
								</div>
							</div>

							<div class="col-xs-6">
								<div class="form-group">
								<label for="clarificacion" >Clarificación</label>				   
								<input type="text" class="form-control" id="clarificacion" name="clarificacion">			
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
								<label for="observaciones" >Observaciones</label>			   
								<textarea class="form-control" id="observaciones" name="observaciones"></textarea>			
								</div>
							<button type="submit" class="btn btn-primary">Ingresar</button><br><br>	

							</div>					

						</form>
						<h3>Agregar Enfermedad</h3>
						
						<form>
						<div class="col-xs-12">
						<div class="form-group">
						<label for="sel-vivo"> Enfermedades</label>				
						<select   name="enferm" class="form-control" id="sel-vivo">
							
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
								    		 	
								    		 	echo "<option value=' ".$row[enf_cod]." ' >".$row[enf_nom]."</option>";
								    		 	
								       		 
								    		}				    	
								    		


									}
								    mysqli_free_result($result);
								    mysqli_close($conn);

							?>
						
						</select>
						</div>
						<button type="submit" class="btn btn-primary">Agregar</button><br><br>
						</div>
						</form>
						


					</div>				

				</div>

			</div>
		</div>

		

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