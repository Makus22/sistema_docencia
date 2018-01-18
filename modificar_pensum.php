<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
//sentencia SQL
$sql = "select * from dmp where id_dm='$_GET[id_dm]';";
// es un puntero
$resultado = mysql_query($sql,$conexion);
// convertir en un array
$personal = mysql_fetch_assoc($resultado);
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

    Modificar Docentes

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

      <li class="active"><a href="listado_pensum.php">REGRESAR</a></li>

     

	
      </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>  
      
    

</nav>
</header>

  <div class="container">
<form method="post" action="actualizar_dmp.php" name="formulario" id="formulario">

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
<input type="text" class="form-control" name="" id="" minlength="1" maxlength="1" required  pattern="[0-9]+"  placeholder="" title=" - SOLO INGRESE NÚMEROS" />
</div></div>


<div class=" col-xs-12 col-sm-3 col-md-12 col-lg-6">
<div class="form-group">
<label>HORAS PRACTICAS:</label>
<input type="text" class="form-control" name="" id="" minlength="1" maxlength="1"  required pattern="[0-9]+"  placeholder="" title=" - SOLO INGRESE MÚMEROS"/>
</div></div></div>

<div class="row">
<div class="col-xs-12 col-sm-3 col-md-12 col-lg-6">

<div class="form-group">
<label>HORAS TOTALES:</label>
<input type="text"  class="form-control" name="hr" id="hr" minlength="1" maxlength="1" required pattern="[0-9]+" placeholder="" title=" - DATOS INCORRECTOS"/>
</div></div>

<div class="col-xs-12 col-sm-3 col-md-12 col-lg-6">

<div class="form-group">
<label>UC:</label>
<input type="text"  class="form-control" name="uc" id="uc" minlength="1" maxlength="1" required pattern="[0-9]+" placeholder="" title=" - SOLO INGRESE NÚMEROS"/>
</div></div>




<BR />


<div class="col-xs-12">
<button class="btn btn-warning" type="submit" value="Grabar">GUARDAR</button>
<!--<button class="btn btn-danger" type="reset" value="Limpiar"/> LIMPIAR</button>-->
</tr>
</table>
</form>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="assets/js/docs.min.js"></script>



  </body>
</html>