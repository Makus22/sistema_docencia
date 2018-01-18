<?php
// conexion al servidor
$conexion = mysql_connect("localhost","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario
$nac_per = $_POST["nac_per"];
$ci_per = $_POST["ci_per"];
$nom_per = $_POST["nom_per"];
$ape_per =$_POST["ape_per"];
$tel_per = $_POST["tel_per"];
$telfijo_per = $_POST["telfijo_per"];
$correo_per = $_POST["correo_per"];
$fech_ini =$_POST["fech_ini"];
$fech_fin = $_POST["fech_fin"];
$estatus_per = $_POST["estatus_per"];
$formacion = $_POST["formacion"];
$direc_per = $_POST["direc_per"];


// sentencia sql
$sql = "insert into personal (nac_per, ci_per, nom_per, ape_per, tel_per, telfijo_per, correo_per, fech_ini, fech_fin, estatus_per, formacion, direc_per, bandera) values
('$nac_per','$ci_per','$nom_per','$ape_per', '$tel_per', '$telfijo_per', '$correo_per', '$fech_ini', '$fech_fin','$estatus_per','$formacion','$direc_per', 1);";

$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Docente Guardado'); window.location='listado_docentes.php';</script>";  
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>
