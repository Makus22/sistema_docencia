<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario

$id_asignar = $_POST["id_asignar"];
$cod_lapso = $_POST["cod_lapso"];
$cod_carre = $_POST["cod_carre"];
$id_sec = $_POST["id_sec"];
$id_hora = $_POST["id_hora"];
$id_hora2 = $_POST["id_hora2"];
$id_dia = $_POST["id_dia"];
$cod_asig = $_POST["cod_asig"];
$id_aula = $_POST["id_aula"];
$id_per = $_POST["id_per"];


// sentencia sql
$sql = "update asig_horario set cod_lapso='$cod_lapso', cod_carre='$cod_carre',id_sec='$id_sec',id_hora='$id_hora',id_hora2='$id_hora2',id_dia='$id_dia',cod_asig='$cod_asig',id_aula='$id_aula',id_per='$id_per' where id_asignar = '$id_asignar';";


$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Horario Docente Modificado'); window.location='listado_ahorarios.php';</script>";
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>