<?php
// conexion al servidor
$conexion = mysql_connect("localhost","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
// leer las variables del formulario


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
$sql = "INSERT INTO asig_horario (cod_lapso, cod_carre, id_sec, id_hora, id_hora2, id_dia, cod_asig, id_aula, id_per, bandera)  VALUES ('$cod_lapso', '$cod_carre','$id_sec','$id_hora','$id_hora2','$id_dia','$cod_asig','$id_aula','$id_per', 1) ON DUPLICATE KEY UPDATE id_per = 'id_hora' AND id_per = 'di_hora' ";


#$sql = "insert into asig_horario (cod_lapso, cod_carre, id_sec, id_hora, id_hora2, id_dia, cod_asig, id_aula, id_per, bandera)values
#('$cod_lapso', '$cod_carre','$id_sec','$id_hora','$id_hora2','$id_dia','$cod_asig','$id_aula','$id_per', 1);";

$resultado = mysql_query($sql,$conexion);
if($resultado)
{
echo"<script type=\"text/javascript\">alert('Horario Guardado'); window.location='listado_ahorarios.php';</script>";
}else{
echo mysql_error($conexion);
}
//cerrar la conexion
mysql_close($conexion);
?>