<?php
// conexion al servidor
$conexion = mysql_connect("localhost","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario


$id_aula = $_POST["id_aula"];
$cod_aula = $_POST["cod_aula"];
$n_aula = $_POST["n_aula"];
$descripcion = $_POST["descripcion"];





// sentencia sql
$sql = "insert into aula (id_aula, cod_aula, n_aula, descripcion, bandera) values
('$id_aula', '$cod_aula','$n_aula','$descripcion', 1);";

$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Aula Guardada'); window.location='listado_aulas.php';</script>";  
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>