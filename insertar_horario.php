<?php
// conexion al servidor
$conexion = mysql_connect("localhost","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario


$id_hora = $_POST["id_hora"];
$pos = $_POST["pos"];
$inicio = $_POST["inicio"];
$fin = $_POST["fin"];
$turno = $_POST["turno"];



// sentencia sql
$sql = "insert into horas (id_hora, pos, inicio, fin, turno, bandera) values
('$id_hora', '$pos','$inicio','$fin','$turno', 1);";

$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Horario Guardado'); window.location='listado_hora.php';</script>";  
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>