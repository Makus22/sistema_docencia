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

    | Listado Docentes

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
          <li role="presentation"><a href="listado_usuarios.php">USUARIOS</a></li>
          <li role="presentation" class="divider"></li>
          <li role="presentation"><a href="listado_aulas.php">AULAS</a></li>
          <li role="presentation"><a href="listado_carreras.php">CARRERAS</a></li>
          <li role="presentation"><a href="listado_pensum.php">DETALLE PENSUM</a></li>
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
      <!--<li class="disabled"><a href="#">PROCESOS</a></li>-->
      <li class="disabled"><a href="#">REPORTES</a></li>
     <!-- <li><button class="btn btn-success navbar-btn">NUEVO</button></li>-->


	
      </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>    
  
        
</nav>
</header>

<div class="container">
<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-6 col-lg-6"><a href="docentes.html" class="btn btn-success">NUEVO <span class="glyphicon glyphicon-plus-sign"></a></span></div>
  <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6"><input class="form-control" id="myInput" type="text" placeholder="INGRESE: NOMBRES, APELLIDOS O C.I."></div>
</div><br>


  <!--<div class="container" style="margin-top:200px">-->

 
  <!--<h4>Escriba algo en el campo de entrada para buscar nombres, apellidos o correos electrónicos en la tabla:</h4> -->
  <!--<input class="form-control" id="myInput" type="text" placeholder="INGRESE: NOMBRES, APELLIDOS, CORREO O C.I PARA REALIZAR LA BUSQUEDA">
  <br>-->

<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>LAPSO:
<select name="cod_lapso" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT cod_lapso FROM lapso ORDER BY cod_lapso ASC")or die(mysql_error()); 
while($lapso = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$lapso['cod_lapso']."'>".$lapso['cod_lapso']."</option>";
}
 
?>
</select></label></div></div>

<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>DOCENTE:
<select name="id_per" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT ci_per FROM personal")or die(mysql_error()); 
while($personal = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$personal['ci_per']."'>".$personal['ci_per']."</option>";
}
 
?></select>
</div></div>

<form name="form" action="0_buscar.php" method="get" >
<input type="submit" title="Buscar" name="s" class="btn btn-success btn-md" />
</form>
</div>

  <div class="row file-b">
  <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="table-responsive">

  
  <table  class="table table-bordered table-striped table-condensed table-hover">



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