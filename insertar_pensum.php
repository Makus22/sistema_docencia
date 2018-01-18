<?php
// conexion al servidor
$conexion = mysql_connect("localhost","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario

$cod_pen = $_POST["cod_pen"];
$des_pen = $_POST["des_pen"];
$cod_carre = $_POST["cod_carre"];
$uc_totales =$_POST["uc_totales"];
$num_semestre = $_POST["num_semestre"];
$fech_ini =$_POST["fech_ini"];
$fech_fin = $_POST["fech_fin"];
$estatus = $_POST["estatus"];


// sentencia sql
$sql = "insert into pensum (cod_pen, des_pen, cod_carre, uc_totales, num_semestre, fech_ini, fech_fin, estatus, bandera) values
('$cod_pen','$des_pen','$cod_carre','$uc_totales', '$num_semestre', '$fech_ini', '$fech_fin','$estatus', 1);";

$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Pensum Guardado'); window.location='pensum.php';</script>";  
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>