<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
//sentencia SQL
#select prueba.id_asignar, prueba.ci_per, horas.inicio, horas.fin from prueba, horas
$sql = "select * from asig_horario where id_asignar='$_GET[id_asignar]';";
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

    Modificar Horario

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

      <li class="active"><a href="listado_ahorarios.php">REGRESAR</a></li>

     

	
      </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>  
      
    

</nav>
</header>


  <div class="container">
<form method="post" action="actualizar_docente.php" name="formulario" id="formulario">
<h4 align="center"> MODIFICAR HORARIO DOCENTE </h4><br>

<div class="form-group">
<label>N°:</label>
<input type="text" class="form-control" name="id_asignar" id="id_asignar" readonly="readonly" maxlength="35" size="35" value="<?php echo $prueba['id_asignar']; ?>"/></input>
</div>

<div class="row">
<div class="col-xs-2">
 <div class="form-group">
<label>LAPSO:</label>
<input type="text" class="form-control" name="nac_per" id="nac_per" readonly="readonly" maxlength="35" size="35" value="<?php echo $prueba['cod_lapso']; ?>"/></input>
</div></div>


<div class="col-xs-2">
<div class="form-group">
<label>CARRERA:</label>
<input type="text" class="form-control" name="ci_per" id="ci_per" maxlength="10" size="10"
readonly="readonly" value="<?php echo $prueba['cod_carre']; ?>"/>
</div>
</div>

<div class="col-xs-4">
<div class="form-group">
<label>SECCIÓN:</label>
<input type="text" class="form-control" name="nom_per" id="nom_per" minlength="3" maxlength="30" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚüÜ ]+" readonly="readonly"  placeholder="CAMPO SOLO LETRAS" title=" - SOLO INGRESE LETRAS" value="<?php echo $prueba['id_sec']; ?>"/>
</div></div>


<div class="col-xs-4">
<div class="form-group">
<label>HORA:</label>
<input type="text" class="form-control" name="ape_per" id="ape_per" minlength="3" maxlength="30" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚüÜ ]+"  readonly="readonly" placeholder="CAMPO SOLO LETRAS" title=" - SOLO INGRESE LETRAS" value="<?php echo $prueba['id_hora']; ?>"/>
</div></div></div>

<div class="row">
<div class="col-xs-4">

<div class="form-group">
<label>DIA:</label>
<input type="text" readonly="readonly" name="tel_per" id="tel_per" class="form-control" minlength="10" maxlength="11" required pattern="[0-9]+" placeholder="NÚMERO CELULAR 7 DIGITOS" title=" - INGRESE NÚMERO DE CÉLULAR CORRECTAMENTE" value="<?php echo $prueba['id_dia']; ?>"/>
</div>
</div>

<div class="col-xs-4">
<div class="form-group">
<label>ASIGNATURA:</label><input type="text" readonly="readonly" name="telfijo_per" id="telfijo_per" class="form-control" minlength="10" maxlength="12" required pattern="[0-9\-]+" placeholder="CAMPO SOLO NÚMERICO EJEMPLO (0276-1234567)" title=" - INGRESE SU NÚMERO DE TELÉFONO FIJO CORRECTAMENTE" value="<?php echo $prueba['cod_asig']; ?>"/>
</div>
</div>

<div class="col-xs-4">
<div class="form-group">
<label>AULA:</label>
<input type="email"  name="correo_per" readonly="readonly" id="correo_per" class="form-control" minlength="11" maxlength="30" required pattern="/^([a-zA-Z0-9_\.\.es\.net\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" placeholder="EJEMPLO (abcd@gmail.com)" title=" - CORREO INCORRECTO RECUERDO AGREGAR (@ y .com)" value="<?php echo $prueba['id_aula']; ?>"/>
</div>
</div>
</div>


<div class="form-group">
<label>DOCENTE:</label>
<input type="text" readonly="readonly" name="direc_per" id="direc_per" class="form-control" minlength="4" maxlength="100" required pattern="[A-Za-z0-9ñÑáéíóúÁÉÍÓÚüÜ\,\.\- ]+" placeholder="INGRESE COMPLETA SU DIRECCIÓN" title=" - DIRECCIÓN MUY CORTA" value="<?php echo $prueba['id_per']; ?>"/>
</div>


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