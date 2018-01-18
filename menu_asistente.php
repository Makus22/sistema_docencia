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

    Listado Docentes

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
setInterval( "window.location.reload()" ,110000);
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
          <li class="disabled"><a href="en_proceso_de_construccion2.php"></a></li>
          <li class="disabled"><a href="en_proceso_de_construccion2.php">PENSUM</a></li>
          <li class="disabled"><a href="en_proceso_de_construccion2.php">SECCIONES</a></li>
          <li class="disabled"><a href="en_proceso_de_construccion2.php">AULAS</a></li>
          <li class="disabled"><a href="en_proceso_de_construccion2.php">MATERIA</a></li>
          <li class="disabled"><a href="en_proceso_de_construccion2.php">PERIODO</a></li>
          <li class="disabled"><a href="en_proceso_de_construccion2.php">HORARIOS</a></li>
          <li class="disabled"><a href="en_proceso_de_construccion2.php">CARRERAS</a></li>
          <li role="presentation" class="divider"></li>
        </ul>
      </li>
      <li class="disabled"><a href="en_proceso_de_construccion2.php">PROCESOS</a></li>
      <li class="disabled"><a href="en_proceso_de_construccion2.php">REPORTES</a></li>
     <!-- <li><button class="btn btn-success navbar-btn">NUEVO</button></li>-->


  
      </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <?php               
              echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> ".$_SESSION['MM_Username']."</a></li>";
            ?>   
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>    
  
        
</nav>
</header>

<div class="container">
<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-6 col-lg-6"><a href="docentes_asistente.html" class="btn btn-success">NUEVO <span class="glyphicon glyphicon-plus-sign"></a></span></div>
  <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6"><input class="form-control" id="myInput" type="text" placeholder="INGRESE: NOMBRES, APELLIDOS O C.I."></div>
</div><br>


  <!--<div class="container" style="margin-top:200px">-->

 
  <!--<h4>Escriba algo en el campo de entrada para buscar nombres, apellidos o correos electrónicos en la tabla:</h4> -->
  <!--<input class="form-control" id="myInput" type="text" placeholder="INGRESE: NOMBRES, APELLIDOS, CORREO O C.I PARA REALIZAR LA BUSQUEDA">
  <br>-->
  <div class="table-responsive">
  
  <table  class="table table-bordered table-striped table-condensed table-hover">

  <!--<div class="container" style="margin-top:200px">-->

 
  <!--<h4>Escriba algo en el campo de entrada para buscar nombres, apellidos o correos electrónicos en la tabla:</h4> -->
  <!--<input class="form-control" id="myInput" type="text" placeholder="INGRESE: NOMBRES, APELLIDOS, CORREO O C.I PARA REALIZAR LA BUSQUEDA">
  <br>-->
  <!--<div class="table-responsive">
  <table  class="table table-bordered table-striped table-condensed table-hover">-->

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
$sql="SELECT * FROM personal where bandera=1";
// es un puntero
$resultado=mysql_query($sql,$conexion);
//IMPRIMIR EL ENCABEZADO DEL REPORTE Y DE LA TABLA
//echo "<center><h1></h1><center>";

echo "<div class='table-responsive'>";
echo "<table class='table table-condensed table-responsive table-hover' >";
echo "<tr>";
echo "<th>N°<th/>";
echo "<th>CÉDULA<th/>";
//echo "<th>CÉDULA<th/>";
echo "<th>NOMBRE<th/>";
echo "<th>APELLIDO<th/>";
echo "<th>CELULAR<th/>";
//echo "<th>CELULAR<th/>";
echo "<th>FIJO<th/>";
//echo "<th>correo<th/>";
//echo "<th>DIRECCIÓN<th/>";
//echo "<th>NIVEL<th/>";
//echo "<th>DESCRIPCIÓN<th/>";
echo "<th><span class='glyphicon glyphicon-wrench'></th></span>";

echo "</tr>";
//convertir resultado en un array o vector
//vector o arreglo numerico, con indice numerico
//$profesor=mysql_fetch_row($resultado)
//CICLO PARA MOSTRAR LOS DATOS EN TABLA
while($profesor=mysql_fetch_array($resultado))
{

  
echo "<tbody id='myTable'>";
echo "<tr>";
//pase de parametros url get

echo "<td>$profesor[0]<td/>";
echo "<td>$profesor[1] $profesor[2]<td/>";
//echo "<td>$profesor[2]<td/>";
echo "<td>$profesor[3]<td/>";
echo "<td>$profesor[4]<td/>";
echo "<td>$profesor[5]<td/>";
echo "<td>$profesor[6]<td/>";
//echo "<td>$profesor[7]<td/>";
//echo "<td>$profesor[8]<td/>";
//echo "<td>$profesor[9]<td/>";
//echo "<td>$profesor[10]<td/>";
//echo "<td>$profesor[11]<td/>";


echo "<td><a href='detalles_2.php?ci_per=$profesor[2]' class='btn btn-success btn-xs'>DETALLES</a> <a href='modificar_docente1.php?ci_per=$profesor[2]' class=''></a>
<a href='borrar_docente.php?ci_per=$profesor[2]' onclick='return confirmar()class=''></a><td/>";
echo "</tr>";

}
echo '</table>';
//cerrar la conexion
mysql_close($conexion);
?>

</table>
    </tbody>
  </table>
  
  <p><!--texto aqui--></p>
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
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=menu_asistente.php">
     <?php
  }
?>