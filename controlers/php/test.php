<?php

session_start();//para los inicio de sesión
include("conexion.php");

	

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
    		while($row = mysqli_fetch_assoc($result))
    		 {
    		 	echo "<option>".$row['nom_eps']."</option>";
    		 	
       		 
    		}

    	
    		


	}
    mysqli_free_result($result);
    mysqli_close($conn);

?>