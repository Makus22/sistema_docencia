<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario


$id_pen = $_POST["id_pen"];
$cod_pen = $_POST["cod_pen"];
$cod_carre = $_POST["cod_carre"];
$des_pen = $_POST["des_pen"];
$uc_totales =$_POST["uc_totales"];
$num_semestre = $_POST["num_semestre"];
$fech_ini =$_POST["fech_ini"];
$fech_fin = $_POST["fech_fin"];
$estatus = $_POST["estatus"];




// sentencia sql
$sql = "update pensum set cod_pen='$cod_pen',cod_carre='$cod_carre', des_pen='$des_pen', uc_totales='$uc_totales', num_semestre='$num_semestre',fech_ini='$fech_ini', fech_fin='$fech_fin', estatus='$estatus' where id_pen = '$id_pen';";


$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Pensum Modificado'); window.location='pensum.php';</script>";
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>