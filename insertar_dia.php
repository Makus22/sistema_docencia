<?php
// conexion al servidor
$conexion = mysql_connect("localhost","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario


$id_dia = $_POST["id_dia"];
$pos = $_POST["pos"];
$descripcion = $_POST["descripcion"];
$acronimo = $_POST["acronimo"];




// sentencia sql
$sql = "insert into dia (id_dia, pos, descripcion, acronimo, bandera) values
('$id_dia', '$pos','$descripcion','$acronimo', 1);";

$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Dia Guardado'); window.location='listado_dia.php';</script>";  
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>