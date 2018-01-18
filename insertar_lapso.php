<?php
// conexion al servidor
$conexion = mysql_connect("localhost","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario



$cod_lapso = $_POST["cod_lapso"];



// sentencia sql
$sql = "insert into lapso (cod_lapso, bandera) values
('$cod_lapso', 1);";

$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Lapso Guardado'); window.location='listado_lapso.php';</script>";  
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>