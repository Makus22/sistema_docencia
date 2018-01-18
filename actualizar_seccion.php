<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario

$id_sec = $_POST["id_sec"];
$cod_sec = $_POST["cod_sec"];
$descripcion = $_POST["descripcion"];




// sentencia sql
$sql = "update secciones set cod_sec='$cod_sec',descripcion='$descripcion' where id_sec = '$id_sec';";


$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Seccion Modificada'); window.location='listado_secciones.php';</script>";
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>