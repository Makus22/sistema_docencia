<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario

$id_dia = $_POST["id_dia"];
$pos = $_POST["pos"];
$descripcion = $_POST["descripcion"];
$acronimo = $_POST["acronimo"];



// sentencia sql
$sql = "update dia set pos='$pos',descripcion='$descripcion',descripcion='$descripcion',acronimo='$acronimo' where id_dia = '$id_dia';";


$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Dia Modificado'); window.location='listado_dia.php';</script>";
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>