<?php
// conexion al servidor
$conexion = mysql_connect("localhost","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario

$cod_asig = $_POST["cod_asig"];
$desc_asig = $_POST["desc_asig"];



// sentencia sql
$sql = "insert into asignatura (cod_asig, desc_asig, bandera) values
('$cod_asig','$desc_asig', 1);";

$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Carrera Guardada'); window.location='listado_asignatura.php';</script>";  
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>