<?php
	session_start();//para los inicio de sesión
	include("conexion.php");
	$conn = mysqli_connect($host, $userdb, $pw,$db);
                                if (!$conn) 
                                {
                                        die("Connection failed: " . mysqli_connect_error());
                                }

             echo $altura=$_POST['altura'];
             echo $peso=$_POST['peso'];
             echo $riesgo=$_POST['riesgo'];
             echo $altura=$_POST['altura'];
             echo $tfg=$_POST['tfg'];
             echo $tas=$_POST['tas'];
             echo $tad=$_POST['tad'];
             echo $clarificacion=$_POST['clarificacion'];
             echo $observaciones	=$_POST['observaciones'];

            echo  $doc_num=$_GET['doc_num'];

             $alturam=($altura/100)*2;           
             $imc=$peso/$alturam;


           //$sql="INSERT INTO `visita`( `fecha_visita`, `clari`, `talla`, `peso`, `imc`, `riesgo`, `tension_sis`, `tension_dia`, `observaciones`, `usuario_id_usu`) VALUES (CURDATE(),'".$clarificacion."',".$talla.",".$peso.",".$imc.",'".$riesgo."',".$tas.",".$tad.",'".$observaciones."',(SELECT id_usu FROM user WHERE doc_num LIKE '%97086732%'))";

             $sql="INSERT INTO `visita`( `fecha_visita`, `clari`, `talla`, `peso`, `imc`, `riesgo`, `tension_sis`, `tension_dia`, `observaciones`, `usuario_id_usu`) VALUES (CURDATE(),'asd',175,".$peso.",25,'".$riesgo."',".$tas.",".$tad.",'".$observaciones."',(SELECT id_usu FROM user WHERE doc_num LIKE '%".$doc_num."%'))";

             if  (mysqli_query($conn, $sql)) {
                     echo "<h1>Registro exitoso </h1>";
                     header("Location: ../../templates/usuario.php?doc_num=".$doc_num."");
                    
                }
                else 
                {
                    echo "Error 2 : " . $sql2 . "<br>" . mysqli_error($conn);
                }
                
mysqli_close($conn);
mysqli_free_result($result);



?>