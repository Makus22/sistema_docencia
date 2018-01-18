<?php
  session_start();
  if(isset($_SESSION['MM_Username']))
  {
?>

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

    | Nuevo DMP

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
setInterval( "window.location.reload()" ,3110000);
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
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">DETALLE PENSUM
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li role="presentation" class="divider"></li>
          <li role="presentation"><a href="listado_usuarios.php">USUARIOS</a></li>
          <li role="presentation"><a href="listado_docentes.php">PROFESOR</a></li>
          <li role="presentation" class="divider"></li>
          <li role="presentation"><a href="listado_aulas.php">AULAS</a></li>
          <li role="presentation"><a href="listado_carreras.php">CARRERAS</a></li>
          <li role="presentation"><a href="listado_hora.php">HORARIOS</a></li>
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
  <div class="col-xs-4 col-sm-4 col-md-6 col-lg-6"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">NUEVO <span class="glyphicon glyphicon-plus-sign"></a></span></div>
  <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6"><input class="form-control" id="myInput" type="text" placeholder="BUSQUEDA INTELIGENTE"></div>
</div><br>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-md">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">NUEVO DETALLE MATERIA PENSUM</h4>
        </div>
        <div class="modal-body">
          <p></p>

         
      
<form method="post" action="insertar_dmp.php" name="formulario" id="formulario">

<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
<div class="form-group">
<label>PENSUM:
<select name="cod_pen" class="form-control" >
<?php
 
$tabla_pensum = mysql_query("SELECT des_pen FROM pensum ORDER BY des_pen ASC")or die(mysql_error()); 
while($pensum = mysql_fetch_assoc($tabla_pensum)) { 
echo "<option value='",$pensum['des_pen'],"'>",$pensum['des_pen'],"</option>";
}
 
?>

</select> 
</label> 
</div>
</div> 


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
<div class="form-group">
<label>ASIGNATURA:
<select name="cod_asig" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT desc_asig, cod_asig FROM asignatura ORDER BY desc_asig, cod_asig ASC")or die(mysql_error()); 
while($asignatura = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$asignatura['cod_asig']."'>".$asignatura['desc_asig']."</option>";
}
 
?>
</select> 
</label>
</div>
</div></div>

<div class="row">
<div class=" col-xs-12 col-sm-3 col-md-12 col-lg-6">
<div class="form-group">
<label>HORAS TEÓRICAS:</label>
<input type="text" class="form-control" name="" id="" minlength="1" maxlength="1" required  pattern="[0-9]+"  placeholder="INGRESE CARRERA COMPLETA" title=" - SOLO INGRESE LETRAS" >
</div></div>


<div class=" col-xs-12 col-sm-3 col-md-12 col-lg-6">
<div class="form-group">
<label>HORAS PRACTICAS:</label>
<input type="text" class="form-control" name="" id="" minlength="1" maxlength="1"  required pattern="[0-9]+"  placeholder="CAMPO SOLO LETRAS" title=" - SOLO INGRESE LETRAS">
</div></div></div>

<div class="row">
<div class="col-xs-12 col-sm-3 col-md-12 col-lg-6">

<div class="form-group">
<label>HORAS TOTALES:</label>
<input type="text"  class="form-control" name="hr" id="hr" minlength="1" maxlength="1" required pattern="[0-9]+" placeholder="" title=" - DATOS INCORRECTOS">
</div></div>

<div class="col-xs-12 col-sm-3 col-md-12 col-lg-6">

<div class="form-group">
<label>UC:</label>
<input type="text"  class="form-control" name="uc" id="uc" minlength="1" maxlength="1" required pattern="[0-9]+" placeholder="" title=" - SOLO INGRESE NÚMEROS">
</div></div>


              </div><br>
              <div class="modal-footer" align="center">
      <div align="center"> <input type="submit" value="GUARDAR" class="btn btn-warning btn-md"></input>
          <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
        </div>
    </div></form></div></div></div></div></a>


      
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
$sql="SELECT * FROM dmp where bandera=1";
// es un puntero
$resultado=mysql_query($sql,$conexion);
//IMPRIMIR EL ENCABEZADO DEL REPORTE Y DE LA TABLA
//echo "<center><h1></h1><center>";

echo "<div class='table-responsive'>";
echo "<table class='table table-condensed table-responsive table-hover' >";
echo "<tr>";
echo "<th>N°<th/>";
echo "<th>COD PENSUM<th/>";
echo "<th>COD ASIGNATURA<th/>";
echo "<th>HR<th/>";
echo "<th>UC<th/>";
//echo "<th>SEMESTRE<th/>";
//echo "<th>INICIO<th/>";
//echo "<th>FIN<th/>";
//echo "<th>ESTATUS<th/>";
//echo "<th>DOCENTE<th/>";
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

echo "<td>$prueba[0]<td/>";
echo "<td>$prueba[1]<td/>";
echo "<td>$prueba[2]<td/>";
echo "<td>$prueba[3]<td/>";
echo "<td>$prueba[4]<td/>";
//echo "<td>$prueba[5]<td/>";
//echo "<td>$prueba[6]<td/>";
//echo "<td>$prueba[7]<td/>";
//echo "<td>$prueba[8]<td/>";
//echo "<td>$prueba[9]<td/>";
//echo "<td>$prueba[9]<td/>";
//echo "<td>$prueba[10]<td/>";
//echo "<td>$prueba[11]<td/>";


echo "<td> <a href='modificar_pensum.php?id_dm=$prueba[0]' class='btn btn-warning btn-xs'>MODIFICAR</a>
<a href='borrar_dmp.php?id_dm=$prueba[0]' onclick='return confirmar()' class='btn btn-danger btn-xs'>ELIMINAR</a><td/>";
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
</div></div>

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

