<?php
// conexion al servidor
$conexion = mysql_connect("localhost","root","");
//seleccionar la base de datos
$db = mysql_select_db("docentes",$conexion);
// leer las variables del formulario
$nac_profe = $_POST["nac_profe"];
$ci_profe = $_POST["ci_profe"];
$nombr_profe = $_POST["nombr_profe"];
$apell_profe =$_POST["apell_profe"];
$cod_area_telef = $_POST["cod_area_telef"];
$telef_profe = $_POST["telef_profe"];
$telef_fijo_profe = $_POST["telef_fijo_profe"];
$email_profe =$_POST["email_profe"];
$direccion_profe = $_POST["direccion_profe"];
$nivel_academico_profe = $_POST["nivel_academico_profe"];
$descripcion = $_POST["descripcion"];


// sentencia sql
$sql = "insert into profesor (nac_profe, ci_profe, nombr_profe, apell_profe, cod_area_telef, telef_profe, telef_fijo_profe, email_profe, direccion_profe, nivel_academico_profe, descripcion, bandera) values
('$nac_profe','$ci_profe','$nombr_profe','$apell_profe', '$cod_area_telef', '$telef_profe', '$telef_fijo_profe', '$email_profe', '$direccion_profe','$nivel_academico_profe','$descripcion', 1);";

$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Docente Guardado'); window.location='menu_asistente.php';</script>";  
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>
