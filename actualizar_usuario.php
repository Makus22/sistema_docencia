<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("docentes",$conexion);
// leer las variables del formulario
$id = $_POST["id"];
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
//$telefono =$_POST["telefono"];
// sentencia sql
$sql = "update administrador set usuario='$usuario',contrasena='$contrasena'  where id = '$id';";
$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Usuario Modificado'); window.location='listado_usuarios.php';</script>";
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>