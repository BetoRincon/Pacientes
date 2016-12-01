<?php

session_start();//para los inicio de sesión
include("conexion.php");

//-----------capruta de datos--------------
//----------------------------------------
$usuario = $_POST['user'];
$contra = $_POST['password'];



//----------------conexión base de datos-----------------
//----------------------------------------------------------

if(isset($_POST['user'])&& !empty($_POST['user'])&&
	isset($_POST['password']) && !empty($_POST['password']) )
	{

		$conn = mysqli_connect($host, $userdb, $pw,$db);
                                if (!$conn) 
                                {
                                        die("Connection failed: " . mysqli_connect_error());
                                }


		$encode= md5($_POST['password']);
		//echo $encode;


		//query
		$sql = "SELECT * FROM login WHERE contra LIKE '%$encode%'
		";

		$result = mysqli_query($conn, $sql);

		

		//respuesta de la BD
		

		if (mysqli_num_rows($result) > 0) 
		{
			

    		// output data of each row
    		while($row = mysqli_fetch_assoc($result))
    		 {
    		 	if($row["contra"]==$encode)
    		 	{

    		 		
    		 		$_SESSION['login_id']=$row['login_id'];
    		 		$_SESSION['usuario']=$row['usuario'];
                                            $_SESSION['rol']=$row['rol'];
                                           // $_SESSION['row'][]=$row;
                                            $arreglo['row'][]=$row;

                                            echo json_encode($arreglo);
    		 		//echo $_SESSION['usuario'];

                                    
                                    header('Location: ../../templates/principal.php');
    		 		
    		 		
    		 	}
    		 	else
    		 	{
    		 		echo "<h1>INCORRECTO!</h1>";
    		 	}
       		 
    		}

    	}
    		


	}
    mysqli_free_result($result);
    mysqli_close($conn);

?>