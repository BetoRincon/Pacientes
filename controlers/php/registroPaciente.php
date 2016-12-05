<?php

session_start();//para los inicio de sesión
include("conexion.php");

$conn = mysqli_connect($host, $userdb, $pw,$db);
                                if (!$conn) 
                                {
                                        die("Connection failed: " . mysqli_connect_error());
                                }


        echo $doc_num=$_POST['n-documento'];
      echo  $doc_tipo=$_POST['sel-tipo-doc'];
      echo  $nom_1=$_POST['nombre1'];
      echo  $nom_2=$_POST['nombre2'];
      echo  $ape_1=$_POST['apellido1'];
      echo  $ape_2=$_POST['apellido2'];
     echo   $sexo=$_POST['sel-sexo'];
      echo  $fecha_nac=$_POST['fecha'];
      echo  $tel=$_POST['tel'];
      echo  $dir=$_POST['dire'];
      echo  $vivo=$_POST['vivo'];
      echo  $eps_id_eps=$_POST['eps'];
      echo  $estado_enf=$_POST['estado'];
      echo $enf_nom=$_POST['enferm'];
      echo "------";

       
   
     
        //query
        $sql = "INSERT INTO user (doc_num, doc_tipo, nom_1, nom_2, ape_1, ape_2, sexo, fecha_nac, tel, dir, vivo, eps_id_eps,fecha_ing,fecha_eg,activo) VALUES  (' ".$doc_num. " ' ,' " .$doc_tipo. " ' , '" .$nom_1. "'  ,'" .$nom_2. "', '" .$ape_1. "' , '" .$ape_2. "'  , '" .$sexo. " ' , ' " .$fecha_nac. " ', ' " .$tel. " ', '" .$dir. "', " .$vivo. ", " .$eps_id_eps. ",CURDATE(),NULL,'1')";

       // $sql2 ="INSERT INTO `programa` (`id_prog`, `fecha_ing`, `fecha_eg`, `activo`) VALUES (NULL, CURDATE(), NULL, '1')";

        $sql2="INSERT INTO usuario_enfermedad (estado_enf,usuario_id_usuario,enfermedad_id_enf) VALUES(' ".$estado_enf." ',(SELECT id_usu FROM user WHERE nom_1='".$nom_1."'),( SELECT id_enf FROM emfermedad WHERE enf_nom ='".trim($enf_nom)."'))";

        //trim() se uso en sql2 para cortar espacios en blanco en la consulta

         



     if (mysqli_query($conn, $sql)) 
            {
                echo "<h1>Registro exitoso</h1>";
                // header('Location: ../../templates/principal.php');
               
            }
                   
            else 
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
       
        if  (mysqli_query($conn, $sql2)) {
                     echo "<h1>Registro exitoso 2</h1>";
                     header('Location: ../../templates/principal.php');
                    
                }
                else 
                {
                    echo "Error 2 : " . $sql2 . "<br>" . mysqli_error($conn);
                }
                
                    
        

       
          





   
    mysqli_close($conn);
mysqli_free_result($result);



?>