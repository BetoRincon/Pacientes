<?php
include("conexion.php");

$conn=mysqli_connect($host,$userdb,$pw,$db);
if (!$conn) 
           {
                   die("Connection failed: " . mysqli_connect_error());
           }

$sql="SELECT user.doc_num,user.doc_tipo,user.nom_1,user.ape_1, eps.nom_eps, emfermedad.enf_nom, user.activo, usuario_enfermedad.estado_enf 
FROM
user, 
usuario_enfermedad,
emfermedad,
eps
WHERE
user.id_usu=usuario_enfermedad.usuario_id_usuario
AND eps.id_eps=user.eps_id_eps
AND emfermedad.id_enf=usuario_enfermedad.enfermedad_id_enf;";

$result=mysqli_query($conn,$sql);

if (!$result) 
{
	die("Error");
}
else
 {
	while ($data=mysqli_fetch_assoc($result) )
	{
		$arreglo["data"][]=array_map("utf8_encode", $data);
		//la función arraymap se usa para problemas cargando los datos
		
	}
	echo json_encode($arreglo);
}
//libera espacio y cierra la conexion
mysqli_free_result($result);
mysqli_close($conn);

?>