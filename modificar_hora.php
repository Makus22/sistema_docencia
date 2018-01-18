<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
//sentencia SQL
$sql = "select * from horas where id_hora='$_GET[id_hora]';";
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

    | Nuevo Horario

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
setInterval( "window.location.reload()" ,610000);
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

      <li class="active"><a href="listado_hora.php">REGRESAR</a></li>

     

  
      </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>  
      
    
     
</nav>
</header>

  <div class="container">
        <form method="post" action="actualizar_hora.php" name="formulario" id="formulario">

<div class="row">
<div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="form-group">
<label>ID HORA:</label>
<input type="text" class="form-control" name="id_hora" id="id_hora" minlength="3" maxlength="3" required pattern="[0-9]+"  placeholder="" title=" INGRESE SOLO NÚMEROS " value="<?php echo $prueba['id_hora']; ?>"><span class="help-block"  >EJEMPLO 001.</span>
</div></div> 


<div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="form-group">
<label>POSICIÓN:</label>
<input type="text" class="form-control" name="pos" id="pos" minlength="1" maxlength="2" required pattern="[0-9]+"  placeholder="" title=" SOLO NÚMERICO " value="<?php echo $prueba['pos']; ?>"><span class="help-block"  >POSICIÓN DE LA HORA (1 AL 20).</span>
</div></div></div>

<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

<div class="form-group">
<label>HORA INICIO:</label>
<input type="time"  class="form-control" name="inicio" id="inicio" minlength="1" maxlength="20" required pattern="/^([a-zA-Z0-9_\.\.es\.net\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" placeholder="" title=" - SELECCIONE LA HORA " value="<?php echo $prueba['inicio']; ?>" >
</div>

</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

<div class="form-group">
<label>HORA FINAL:</label>
<input type="time"  class="form-control" name="fin" id="fin" minlength="1" maxlength="20" required pattern="/^([a-zA-Z0-9_\.\.es\.net\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" placeholder="" title=" - SELECCIONE LA HORA  " value="<?php echo $prueba['final']; ?>" >
</div>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

<div class="form-group">
<label>TURNO:</label><select type="text" name="turno" id="turno" class="form-control" minlength="1" maxlength="2" required pattern="/^([a-zA-Z0-9_\.\.es\.net\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" placeholder=""  title=" - SELECCIONE EL TURNO " value="<?php echo $prueba['turno']; ?>" >
<option>M </option>
<option>T </option>
<option>N </option>
      </select><span class="help-block">MAÑANA(TARDE)NOCHE</span>
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
</div></div></div></div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="assets/js/docs.min.js"></script>

</body>
</html>