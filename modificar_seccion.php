<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
//sentencia SQL
#select prueba.id_asignar, prueba.ci_per, horas.inicio, horas.fin from prueba, horas
$sql = "select * from secciones where id_sec='$_GET[id_sec]';";
// es un puntero
$resultado = mysql_query($sql,$conexion);
// convertir en un array
$prueba = mysql_fetch_assoc($resultado);
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

    | Nueva Seccion

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

      <li class="active"><a href="listado_secciones.php">REGRESAR</a></li>

     

  
      </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>  
      
    
      
</nav>
</header>

  <div class="container">
<form method="post" action="actualizar_seccion.php" name="formulario" id="formulario">
<h4 align="center"> NUEVA SECCIÓN </h4><br>

<div class="row">
<div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="form-group">
<label>ID SECCION:</label>
<input type="text" class="form-control" name="id_sec" id="id_sec"  minlength="4" maxlength="4" required pattern="[A-Za-0-9]+"  placeholder="" title=" Campo de Texto solamente " value="<?php echo $prueba['id_sec']; ?>" ><span class="help-block">EJEMPLO I1MA.</span>
</div></div>


<div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="form-group">
<label>CODIGO SECCIÓN:</label>
<input type="text" class="form-control" name="cod_sec" id="cod_sec" minlength="4" maxlength="4" required pattern="[0-9]+"  placeholder="" title=" Campo Solo númerico " value="<?php echo $prueba['cod_sec']; ?>"><span class="help-block">CODIGO UNICO PARA SECCION EJEMPLO (0202).</span>
</div></div>


<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

<div class="form-group">
<label>DESCRIPCION SECCIÓN:</label>
<input type="text"  class="form-control" name="descripcion" id="descripcion" minlength="1" maxlength="20" required pattern="/^([a-zA-Z0-9_\.\.es\.net\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" placeholder="" title=" - " value="<?php echo $prueba['descripcion']; ?>"><span class="help-block">DESCRIPCIÓN DE LA SECCIÓN.</span>
</div>

</div>

</div>




<br>




    
      <td><input type="submit" value="GUARDAR" class="btn btn-warning btn-md">
        <label for="borrar"></label>
      <input type="reset" name="borrar" value="LIMPIAR" id="RESET" class="btn btn-danger btn-md"  /></td>
    </tr>
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