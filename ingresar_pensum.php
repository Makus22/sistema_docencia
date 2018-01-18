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

      <li class="active"><a href="menu_principal.php">REGRESAR</a></li>

     

  
      </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>  
      
    
      
</nav>
</header>

  
<div class="container">
<form method="post" action="insertar_dmp.php" name="formulario" id="formulario">

<h4 align="center"> NUEVO DETALLE </h4><br>
<div class="row">

<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
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


<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>ASIGNATURA:
<select name="cod_asig" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT cod_asig FROM asignatura ORDER BY cod_asig ASC")or die(mysql_error()); 
while($asignatura = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$asignatura['cod_asig']."'>".$asignatura['cod_asig']."</option>";
}
 
?>
</select> 
</label>
</div>
</div>


<div class=" col-xs-12 col-sm-12 col-md-3 col-lg-3">
<div class="form-group">
<label>HORAS TEORICAS:</label>
<input type="text" class="form-control" name="" id="" minlength="1" maxlength="30"  pattern="[A-Za-0-9]+"  placeholder="INGRESE CARRERA COMPLETA" title=" - SOLO INGRESE LETRAS" >
</div></div>


<div class=" col-xs-12 col-sm-12 col-md-3 col-lg-3">
<div class="form-group">
<label>HORAS PRACTICAS:</label>
<input type="text" class="form-control" name="" id="" minlength="1" maxlength="30" pattern="[A-Za-0-9]+"  placeholder="CAMPO SOLO LETRAS" title=" - SOLO INGRESE LETRAS">
</div></div></div>

<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

<div class="form-group">
<label>HORAS TOTALES:</label>
<input type="tex"  class="form-control" name="hr" id="hr" minlength="1" maxlength="20" required pattern="/^([a-zA-Z0-9_\.\.es\.net\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" placeholder="" title=" - DATOS INCORRECTOS">
</div></div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

<div class="form-group">
<label>UC:</label>
<input type="tex"  class="form-control" name="uc" id="uc" minlength="1" maxlength="20" required pattern="/^([a-zA-Z0-9_\.\.es\.net\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" placeholder="" title=" - DATOS INCORRECTOS">
</div></div>
<br>
    <div class="container">
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <td><input type="submit" value="GUARDAR" class="btn btn-warning btn-md">
        <label for="borrar"></label>
      <input type="reset" name="borrar" value="LIMPIAR" id="RESET" class="btn btn-danger btn-md"  /></td>
    </tr></div></div>
  </table>
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