<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario

$desc_usu = $_POST["desc_usu"];
$cont_usu = $_POST["cont_usu"];
$nivel_usu = $_POST["nivel_usu"];
$estatus_usu = $_POST["estatus_usu"];

// sentencia sql
$sql = "insert into usuarios (desc_usu,cont_usu,nivel_usu, estatus_usu) values
('$desc_usu','$cont_usu','$nivel_usu','$estatus_usu');";
$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Usuario Guardado'); window.location='listado_usuarios.php';</script>"; 
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>