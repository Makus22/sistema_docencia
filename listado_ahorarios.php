<?php 
// sustituir con los valores reales de 'servidor_mysql', 'usuario', 'clave' y 
//'mi_base_de_datos', según sea necesario 
$cndbx = mysql_connect('localhost', 'root', ''); 
mysql_select_db('sistema_docencia'); 
?>

<?php
  session_start();
  if(isset($_SESSION['MM_Username']))
  {
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
<meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
<meta name="author" content="Victor Soto">

<title>

    | Listado Horarios

</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Documentation extras -->
<link href="assets/css/docs.min.css" rel="stylesheet">
<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="assets/js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
<link rel="icon" href="favicon.ico">


  <script type="text/javascript">
setInterval( "window.location.reload()" ,1110000);
</script>
</head>

<script>
function confirmar()
{
	if(confirm('¿Realmente Desea Eliminar?'))
		return true;
	else
		return false;
}
</script>
<body>

  <header>
   <!--<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container" responsive>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img src="img/logo2.png" class="img-responsive img-rounded" alt="test">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm" >
            <span class="sr-only">Desplegar / Ocultar Menu</span> 
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

         <!-- <a href="#" class="navbar-brand"></a> -->
        </div>
        <div class="collapse navbar-collapse " id="navegacion-fm">
          <ul class="nav navbar-nav"> 

      <li class="active"><a href="menu_principal.php">INICIO</a></li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">DOCENTES
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li role="presentation" class="divider"></li>
          <li role="presentation"><a href="listado_usuarios.php">USUARIOS</a></li>
          <li role="presentation"><a href="listado_docentes.php">PROFESOR</a></li>
          <li role="presentation" class="divider"></li>
          <li role="presentation"><a href="listado_aulas.php">AULAS</a></li>
          <li role="presentation"><a href="listado_carreras.php">CARRERAS</a></li>
          <li role="presentation"><a href="listado_pensum.php">DETALLE PENSUM</a></li>
          <li role="presentation"><a href="listado_asignatura.php">ASIGNATURA</a></li>
          <li role="presentation"><a href="pensum.php">PENSUM</a></li>
          <li role="presentation"><a href="listado_lapso.php">PERIODO</a></li>
          <li role="presentation"><a href="listado_secciones.php">SECCIONES</a></li>
          <li role="presentation" class="divider"></li>
          
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">PROCESOS
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li role="presentation" class="divider"></li>
          <li role="presentation"><a href="listado_ahorarios.php">HORARIOS</a></li>
          <li role="presentation" class="divider"></li>
          <li role="presentation"><a href="listado_aulas.php"></a></li>
          
        </ul>
      </li>
       <li class="dropdown">
      <li class=""><a href="2buscador.php">REPORTES</a></li>


	
      </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>    
  
        
</nav>
</header>

<div class="container">
<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-6 col-lg-6"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">NUEVO HORARIO <span class="glyphicon glyphicon-plus-sign"></a></span></div>
  <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6"><input class="form-control" id="myInput" type="text" placeholder="BUSQUEDA INTELIGENTE DE LISTA"></div>
</div><br>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-md">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ASIGNACIÓN DEL HORARIO</h4>
        </div>
        <div class="modal-body">
          <p></p>

<form method="post" action="insertar_ahorario.php" name="formulario" id="formulario">

<h4 align="center"> NUEVO HORARIO </h4><br>
<div class="row">

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="form-group">
<label>LAPSO:
<select name="cod_lapso" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT cod_lapso FROM lapso ORDER BY cod_lapso ASC")or die(mysql_error()); 
while($lapso = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$lapso['cod_lapso']."'>".$lapso['cod_lapso']."</option>";
}
 
?>
</select> 
</label>
</div>
</div>


<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="form-group">
<label>CARRERA:
<select name="cod_carre" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT cod_carre, des_carre FROM carreras ORDER BY  cod_carre, des_carre DESC")or die(mysql_error()); 
while($carreras = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$carreras['des_carre']."'>".$carreras['des_carre']."</option>";
}
 
?>
</select> 
</label>
</div>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="form-group">
<label>SECCIÓN:
<select name="id_sec" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT id_sec, cod_sec FROM secciones ORDER BY id_sec, cod_sec ASC")or die(mysql_error()); 
while($secciones = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$secciones['id_sec']."'>".$secciones['id_sec']."</option>";
}
 
?>
</select> 
</label>
</div>
</div>
</div>

<div class="row"> 
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="form-group">
<label>INICIO:
<select name="id_hora" class="form-control">
<?php


$tabla_asig = mysql_query("SELECT * from horas limit 0,20")or die(mysql_error()); 
while($horas = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$horas['inicio']."'>".$horas['inicio']."</option>";

}
 
?>
</select> 
</label>
</div>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="form-group">
<label>FIN:
<select name="id_hora2" class="form-control">
<?php


$tabla_asig = mysql_query("SELECT * from horas limit 0,20")or die(mysql_error()); 
while($horas = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$horas['fin']."'>".$horas['fin']."</option>";

}
 
?>
</select> 
</label>
</div>
</div>


<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="form-group">
<label>DIA:
<select name="id_dia" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT descripcion, id_dia FROM dia ORDER BY id_dia, descripcion DESC")or die(mysql_error()); 
while($dia = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$dia['descripcion']."'>".$dia['descripcion']."</option>";
}
 
?>
</select> 
</label>
</div></div></div>


<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
<div class="form-group">
<label>ASIGNATURA:
<select name="cod_asig" class="form-control">
<?php
$tabla_asig = mysql_query("SELECT desc_asig, cod_asig FROM asignatura ORDER BY cod_asig, desc_asig DESC")or die(mysql_error()); 
while($asignatura = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$asignatura['desc_asig']."'>".$asignatura['desc_asig']."</option>";
}
 
?>
</select> 
</label>
</div>
</div>


<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>AULA:
<select name="id_aula" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT n_aula, cod_aula FROM aula ORDER BY cod_aula, n_aula DESC")or die(mysql_error()); 
while($aula = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$aula['n_aula']."'>".$aula['n_aula']."</option>";
}
 
?>
</select> 
</label>
</div>
</div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>DOCENTE:
<select name="id_per" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT ci_per FROM personal")or die(mysql_error()); 
while($personal = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$personal['ci_per']."'>".$personal['ci_per']."</option>";
}
 
?>
</select> 
</label>
</div></div></div>

<br/><br/>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-12">
<div class="form-group">
 <td><input type="submit" value="GUARDAR" class="btn btn-warning btn-md">
        <label for="borrar"></label>
      <input type="reset" name="borrar" value="LIMPIAR" id="RESET" class="btn btn-danger btn-md"  /></td>
    </tr>
  </table>
  </table>
</form></div></div></div></div></div></div></div>



</div><br>


  <!--<div class="container" style="margin-top:200px">-->

 
  <!--<h4>Escriba algo en el campo de entrada para buscar nombres, apellidos o correos electrónicos en la tabla:</h4> -->
  <!--<input class="form-control" id="myInput" type="text" placeholder="INGRESE: NOMBRES, APELLIDOS, CORREO O C.I PARA REALIZAR LA BUSQUEDA">
  <br>-->
  <div class="container">
  <div class="row file-b">
  <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="table-responsive">

  
  <table  class="table table-bordered table-striped table-condensed table-hover">


<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);

//sentencia SQL
$sql="SELECT * FROM asig_horario where bandera=1";
// es un puntero
$resultado=mysql_query($sql,$conexion);
//IMPRIMIR EL ENCABEZADO DEL REPORTE Y DE LA TABLA
//echo "<center><h1></h1><center>";

echo "<div class='table-responsive'>";
echo "<table class='table table-condensed table-responsive table-hover' >";
echo "<tr>";
//echo "<th>N°<th/>";
echo "<th>LAP.<th/>";
echo "<th>CARRERA<th/>";
echo "<th>SECCION<th/>";
echo "<th>HORA<th/>";
echo "<th>DIA<th/>";
echo "<th>ASIGNATURA<th/>";
echo "<th>AULA<th/>";
echo "<th>DOCENTE<th/>";

//echo "<th>DIRECCIÓN<th/>";
//echo "<th>NIVEL<th/>";
//echo "<th>DESCRIPCIÓN<th/>";
echo "<th><span class='glyphicon glyphicon-wrench'></th></span>";

echo "</tr>";
//convertir resultado en un array o vector
//vector o arreglo numerico, con indice numerico
//$prueba=mysql_fetch_row($resultado)
//CICLO PARA MOSTRAR LOS DATOS EN TABLA
while($prueba=mysql_fetch_array($resultado))
{

	
echo "<tbody id='myTable'>";
echo "<tr>";
//pase de parametros url get

//echo "<td>$prueba[0]<td/>";
echo "<td>$prueba[1]<td/>";
echo "<td>$prueba[2]<td/>";
echo "<td>$prueba[3]<td/>";
echo "<td>$prueba[4]<td/>";
//echo "<td>$prueba[5]<td/>";
echo "<td>$prueba[6]<td/>";
echo "<td>$prueba[7]<td/>";
echo "<td>$prueba[8]<td/>";
echo "<td>$prueba[9]<td/>";
//echo "<td>$prueba[9]<td/>";
//echo "<td>$prueba[9]<td/>";
//echo "<td>$prueba[10]<td/>";
//echo "<td>$prueba[11]<td/>";
##<a href='reportes/reporte_ahorario.php?id_asignar=$prueba[0]' class='btn btn-info btn-xs'></a>

echo "<td>  <a href='modificar_ahorarios.php?id_asignar=$prueba[0]' class='btn btn-warning btn-xs'>MODIFICAR</a>
<a href='borrar_ahorario.php?id_asignar=$prueba[0]' onclick='return confirmar()' class='btn btn-danger btn-xs'>ELIMINAR</a><td/>";
echo "</tr>";

}
echo '</table>';
//cerrar la conexion
mysql_close($conexion);
?>



</table>
    </tbody>
  </table>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="assets/js/docs.min.js"></script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>





  </body>
</html>
<?php
  }
  else
  {
    ?>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=login.php">
     <?php
  }
?>