<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// sentencia sql

//$sql = "delete from personal where ci_per = '$_GET[ci_per]';";
$sql = "update aula set bandera=0 where id_aula = '$_GET[id_aula]';";


$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\"> window.location='listado_aulas.php';</script>";

//echo"<script type=\"text/javascript\">alert('Recargando Pagina'); window.location='listado_docentes.php';</script>";



}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>