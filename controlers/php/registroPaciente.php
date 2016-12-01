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
       
   
     
        //query
        $sql = "INSERT INTO usuario (doc_num, doc_tipo, nom_1, nom_2, ape_1, ape_2, sexo, fecha_nac, tel, dir, vivo, eps_id_eps) VALUES  (' ".$doc_num. " ' ,' " .$doc_tipo. " ' , '" .$nom_1. "'  ,'" .$nom_2. "', '" .$ape_1. "' , '" .$ape_2. "'  , '" .$sexo. " ' , ' " .$fecha_nac. " ', ' " .$tel. " ', '" .$dir. "', " .$vivo. ", " .$eps_id_eps. ");




        ";

       // $sql2 ="INSERT INTO programa (fecha_ing,fecha_eg,activo)VALUES(1)";

       // $slq3="INSERT INTO usuario_enfermedad (estado_enf) VALUES(' ".$estado_enf." ')"



       

        if (mysqli_query($conn, $sql)/*&&mysqli_query($conn, $sql2)&&mysqli_query($conn, $sql3)*/) 
        {
            echo "<h1>Registro exitoso</h1>";
            // header('Location: ../../templates/principal.php');

        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


   
    mysqli_close($conn);




?>