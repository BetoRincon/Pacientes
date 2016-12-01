<?php
include("conexion.php");
include("login.php");

if($_POST["usuario"])
{
$usuario = $_POST["usuario"];
$contraseña=$_POST["contra"];

// Here, you can also perform some database query operations with above values.
echo  $usuario; // Success Message

}

?>