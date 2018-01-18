<?php 
// sustituir con los valores reales de 'servidor_mysql', 'usuario', 'clave' y 
//'mi_base_de_datos', según sea necesario 
$cndbx = mysql_connect('localhost', 'root', ''); 
mysql_select_db('sistema_docencia'); 
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

    | Nuevo Pensum

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
setInterval( "window.location.reload()" ,310000);
</script>
</head>
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

      <li class="active"><a href="listado_docentes.php">REGRESAR</a></li>

     

  
      </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>  
      
    
      
</nav>
</header>

</nav>
</header>

  
<div class="container">
<form method="post" action="insertar_dmp.php" name="formulario" id="formulario">

<h4 align="center"> NUEVO DETALLE </h4><br>
<div class="row">

<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-inline">
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


<div class="col-xs-12 col-sm-3 col-md-3 col-lg-5">
<div class="form-inline">
<label>CARRERA:
<select name="des_carre" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT des_carre FROM carreras ORDER BY des_carre ASC")or die(mysql_error()); 
while($carreras = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$carreras['des_carre']."'>".$carreras['des_carre']."</option>";
}
 
?>
</select> 
</label>
</div>
</div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-inline">
<label>SECCIÓN:
<select name="id_sec" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT id_sec FROM secciones ORDER BY id_sec ASC")or die(mysql_error()); 
while($secciones = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$secciones['id_sec']."'>".$secciones['id_sec']."</option>";
}
 
?>
</select> 
</label>
</div>
</div></div>

<br/>

<div class="container">

<table align="center" width="800" border="1">

  <tr>
    <td>HORAS</td>
    <td>LUNES</td>
    <td>MARTES</td>
    <td>MIERCOLES</td>
    <td>JUEVES</td>
    <td>VIERNES</td>
    <td>SÁBADO</td>
  </tr>
  <tr>
    <td>7:00AM <br> 7:45AM</td>
    <td><div class="form-inline">
<label>MATERIA:
<select name="desc_asig" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT desc_asig FROM asignatura ORDER BY desc_asig ASC")or die(mysql_error()); 
while($asignatura = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$asignatura['desc_asig']."'>".$asignatura['desc_asig']."</option>";
}
 
?>
</select> 
</label>
</div><div class="form-inline">
<label>AULA:
<select name="n_aula" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT n_aula FROM aula ORDER BY n_aula ASC")or die(mysql_error()); 
while($aula = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$aula['n_aula']."'>".$aula['n_aula']."</option>";
}
 
?>
</select> 
</label>
</div><div class="form-inline">
<label>DOCENTE:
<select name="ci_per" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT ci_per FROM personal ORDER BY ci_per ASC")or die(mysql_error()); 
while($personal = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$personal['ci_per']."'>".$personal['ci_per']."</option>";
}
 
?>
</select> 
</label>
</div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</div>

</form>
     

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="assets/js/docs.min.js"></script>

</body>
</html>


<div class="container">

<h4 align="center"> ASIGNACIÓN DE MATERIAS </h4><br>

<div class="row">
<div class="col-xs-6">
<div class="form-inline">
    <label for="textfield"> HORA:</label> <br>
    <select name="nac_per" id="nac_per" class="form-control" title=" - SELECCIONE SU NACIONALIDAD">
      <?php
 
$tabla_asig = mysql_query("SELECT inicio,fin FROM horas ORDER BY inicio, fin ASC")or die(mysql_error()); 
while($horas = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$horas['inicio']."'>".$horas['inicio']."</option>";
}
 
?>
      </select>
    </div><br></div>


<div class="col-xs-6">
<div class="form-group">
<label>DIA:
<select name="descripcion" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT descripcion FROM dia ")or die(mysql_error()); 
while($dia = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$dia['descripcion']."'>".$dia['descripcion']."</option>";
}
 
?>
</select> 
</label>
</div></div>



</div>



<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
//sentencia SQL
$sql="SELECT * FROM horas where bandera=1";

// es un puntero
$resultado=mysql_query($sql,$conexion);
//IMPRIMIR EL ENCABEZADO DEL REPORTE Y DE LA TABLA
//echo "<center><h1></h1><center>";

echo "<div class='table-responsive'>";
echo "<table class='table table-condensed table-responsive table-hover' >";
echo "<tr>";
echo "<th>HORA<th/>";
echo "<th>LUNES<th/>";
echo "<th>MARTES<th/>";
echo "<th>MIÉRCOLES<th/>";
echo "<th>JUEVES<th/>";
echo "<th>VIERNES<th/>";
echo "<th>SÁBADO<th/>";
//echo "<th>CÉDULA<th/>";
//echo "<th>NOMBRE<th/>";
//echo "<th>APELLIDO<th/>";
//echo "<th>CÉLULAR<th/>";
//echo "<th>CORREO<th/>";
//echo "<th>CELULAR<th/>";
//echo "<th>FIJO<th/>";
//echo "<th>correo<th/>";
//echo "<th>DIRECCIÓN<th/>";
//echo "<th>NIVEL<th/>";
//echo "<th>DESCRIPCIÓN<th/>";
//echo "<th><span class='glyphicon glyphicon-wrench'></th></span>";

echo "</tr>";
//convertir resultado en un array o vector
//vector o arreglo numerico, con indice numerico
//$personal=mysql_fetch_row($resultado)
//CICLO PARA MOSTRAR LOS DATOS EN TABLA
while($horas=mysql_fetch_array($resultado))
{

  
echo "<tbody id='myTable'>";
echo "<tr>";
//pase de parametros url get

//echo "<td>$horas[0]<td/>";
//echo "<td>$horas[1]<td/>";
//echo "<td>$horas[2]<td/>";
echo "<td><form action='insertar_dmp'> $horas[2] - $horas[3]<td/>";
echo "<td><select><option>MATERIA</option></select><br><select><option>AULA</option></select><br><select><option>DOCENTE</option></select><td/>";
//echo "<td>$horas[5]<td/>";
//echo "<td>$personal[6]<td/>";
//echo "<td>$horas[7]<td/>";
//echo "<td>$personal[7]<td/>";
//echo "<td>$personal[8]<td/>";
//echo "<td>$personal[9]<td/>";
//echo "<td>$personal[10]<td/>";
//echo "<td>$personal[11]<td/>";


//echo "<td><a href='detalles.php?ci_per=$horas[2]' class='btn btn-success btn-xs'>DETALLES</a> <a href='modificar_docente1.php?ci_per=$horas[2]' class='btn btn-warning btn-xs'>MODIFICAR</a>
//<a href='borrar_docente.php?ci_per=$horas[2]' onclick='return confirmar()' class='btn btn-danger btn-xs'>ELIMINAR</a><td/>";
//echo "</tr>";

}
echo '</table>';
//cerrar la conexion
mysql_close($conexion);
?>

</table>
    </tbody>
  </table>
  
  <p><!--texto aqui--></p>






    <?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
//sentencia SQL
$sql="SELECT * FROM horas where bandera=1";

// es un puntero
$resultado=mysql_query($sql,$conexion);
//IMPRIMIR EL ENCABEZADO DEL REPORTE Y DE LA TABLA
//echo "<center><h1></h1><center>";

echo "<div class='table-responsive'>";
echo "<table class='table table-condensed table-responsive table-hover' >";
echo "<tr>";
echo "<th>HORA<th/>";
echo "<th>LUNES<th/>";
echo "<th>MARTES<th/>";
echo "<th>MIÉRCOLES<th/>";
echo "<th>JUEVES<th/>";
echo "<th>VIERNES<th/>";
echo "<th>SÁBADO<th/>";
//echo "<th>CÉDULA<th/>";
//echo "<th>NOMBRE<th/>";
//echo "<th>APELLIDO<th/>";
//echo "<th>CÉLULAR<th/>";
//echo "<th>CORREO<th/>";
//echo "<th>CELULAR<th/>";
//echo "<th>FIJO<th/>";
//echo "<th>correo<th/>";
//echo "<th>DIRECCIÓN<th/>";
//echo "<th>NIVEL<th/>";
//echo "<th>DESCRIPCIÓN<th/>";
//echo "<th><span class='glyphicon glyphicon-wrench'></th></span>";

echo "</tr>";
//convertir resultado en un array o vector
//vector o arreglo numerico, con indice numerico
//$personal=mysql_fetch_row($resultado)
//CICLO PARA MOSTRAR LOS DATOS EN TABLA
while($horas=mysql_fetch_array($resultado))
{

  
echo "<tbody id='myTable'>";
echo "<tr>";
//pase de parametros url get

//echo "<td>$horas[0]<td/>";
//echo "<td>$horas[1]<td/>";
//echo "<td>$horas[2]<td/>";
echo "<td><form action='insertar_dmp'> $horas[2] - $horas[3]<td/>";
echo "<td><select><option>MATERIA</option></select><br><select><option>AULA</option></select><br><select><option>DOCENTE</option></select><td/>";
//echo "<td>$horas[5]<td/>";
//echo "<td>$personal[6]<td/>";
//echo "<td>$horas[7]<td/>";
//echo "<td>$personal[7]<td/>";
//echo "<td>$personal[8]<td/>";
//echo "<td>$personal[9]<td/>";
//echo "<td>$personal[10]<td/>";
//echo "<td>$personal[11]<td/>";


//echo "<td><a href='detalles.php?ci_per=$horas[2]' class='btn btn-success btn-xs'>DETALLES</a> <a href='modificar_docente1.php?ci_per=$horas[2]' class='btn btn-warning btn-xs'>MODIFICAR</a>
//<a href='borrar_docente.php?ci_per=$horas[2]' onclick='return confirmar()' class='btn btn-danger btn-xs'>ELIMINAR</a><td/>";
//echo "</tr>";

}
echo '</table>';
//cerrar la conexion
mysql_close($conexion);
?>
