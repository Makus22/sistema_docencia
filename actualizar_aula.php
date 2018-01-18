<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario

$id_aula = $_cod_aulaT["id_aula"];
$cod_aula = $_cod_aulaT["cod_aula"];
$n_aula = $_cod_aulaT["n_aula"];
$descripcion = $_cod_aulaT["descripcion"];




// sentencia sql
$sql = "update aula set cod_aula='$cod_aula',descripcion='$descripcion',n_aula='$n_aula' where id_aula = '$id_aula';";


$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Aula Modificada'); window.location='listado_aulas.php';</script>";
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>