<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario

$id_dm = $_POST["id_dm"];
$cod_pen = $_POST["cod_pen"];
$cod_asig = $_POST["cod_asig"];
$hr = $_POST["hr"];
$uc = $_POST["uc"];
$descripcion = $_POST["descripcion"];
$desc_asig = $_POST["desc_asig"];
$n_aula = $_POST["n_aula"];
$ci_per = $_POST["ci_per"];


// sentencia sql
$sql = "update dmp set cod_pen='$cod_pen', des_carre='$des_carre',hr='$hr',uc='$uc' where id_dm = '$id_dm';";


$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Detalle Materia Modificado'); window.location='listado_pensum.php';</script>";
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>