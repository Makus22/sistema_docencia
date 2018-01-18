<?php
// conexion al servidor
$conexion = mysql_connect("localhost","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario


$cod_pen = $_POST["cod_pen"];
$cod_asig = $_POST["cod_asig"];
$hr = $_POST["hr"];
$uc = $_POST["uc"];



// sentencia sql
$sql = "insert into dmp (cod_pen, cod_asig, hr, uc, bandera) values
('$cod_pen', '$cod_asig','$hr','$uc', 1);";

$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Dmp Guardado'); window.location='listado_pensum.php';</script>";  
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>