<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario

$id_hora = $_POST["id_hora"];
$pos = $_POST["pos"];
$inicio = $_POST["inicio"];
$fin = $_POST["fin"];
$turno = $_POST["turno"];



// sentencia sql
$sql = "update horas set pos='$pos', turno='$turno',fin='$fin',inicio='$inicio' where id_hora = '$id_hora';";


$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Hora Modificada'); window.location='listado_pensum.php';</script>";
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>