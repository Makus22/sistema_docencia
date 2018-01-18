<?php
// conexion al servidor
$conexion = mysql_connect("localhost","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario

$cod_carre = $_POST["cod_carre"];
$des_carre = $_POST["des_carre"];
$titulo_carre = $_POST["titulo_carre"];
$fech_ini =$_POST["fech_ini"];
$fech_fin = $_POST["fech_fin"];



// sentencia sql
$sql = "insert into carreras (cod_carre, des_carre, titulo_carre, fech_ini, fech_fin, bandera) values
('$cod_carre','$des_carre','$titulo_carre', '$fech_ini', '$fech_fin', 1);";

$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Carrera Guardada'); window.location='listado_carreras.php';</script>";  
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>