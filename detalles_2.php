<?php
// conexion al servidor
$conexion = mysql_connect("127.0.0.1","root","");
//seleccionar la base de datos
$db = mysql_select_db("sistema_docencia",$conexion);
//sentencia SQL
$sql = "select * from personal where ci_per='$_GET[ci_per]';";
// es un puntero
$resultado = mysql_query($sql,$conexion);
// convertir en un array
$profesor = mysql_fetch_assoc($resultado);
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

    Información Completa

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

      <li class="active"><a href="menu_asistente.php">REGRESAR</a></li>

     

	
      </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>  
      
    
      
</nav>
</header>

  <div class="container">
<form method="post" action="actualizar_docente.php" name="formulario" id="formulario">
<h4 align="center"> INFORMACIÓN COMPLETA DEL DOCENTE </h4><br>

<div class="form-group">
<label>NACIONALIDAD:</label>
<input type="text" class="form-control" name="nac_per" id="nac_per" readonly="readonly" maxlength="35" size="35" value="<?php echo $profesor['nac_per']; ?>"/></input>
</div>

<div class="form-group">
<label>CEDULA:</label>
<input type="text" class="form-control" name="ci_per" id="ci_per" maxlength="10" size="10"
readonly="readonly" value="<?php echo $profesor['ci_per']; ?>"/>
</div>

<div class="form-group">
<label>NOMBRES:</label>
<input type="text" readonly="readonly" class="form-control" name="nom_per" id="nom_per" minlength="3" maxlength="30" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚüÜ ]+" placeholder="CAMPO SOLO LETRAS" title=" - SOLO INGRESE LETRAS" value="<?php echo $profesor['nom_per']; ?>"/>
</div>

<div class="form-group">
<label>APELLIDO:</label>
<input type="text" readonly="readonly" class="form-control" name="ape_per" id="ape_per" minlength="3" maxlength="30" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚüÜ ]+" placeholder="CAMPO SOLO LETRAS" title=" - SOLO INGRESE LETRAS" value="<?php echo $profesor['ape_per']; ?>"/>
</div>

<!--<div class="form-group">
<label>CODIGO AREA:</label><input type="text" name="cod_area_telef" id="cod_area_telef" class="form-control" minlength="3" maxlength="4" required pattern="[0-9]+" placeholder="AREA EJEMPLO (0412 - 0424 - 0426)" title=" - INGRESE CORRECTAMENTE EL CODIGO DE AREA" value="<?php echo $profesor['cod_area_telef']; ?>"/>
</div>-->

<div class="form-group">
<label>CÉLULAR:</label>
<input type="text" readonly="readonly" name="tel_per" id="tel_per" class="form-control" minlength="7" maxlength="7" required pattern="[0-9]+" placeholder="NÚMERO CELULAR 7 DIGITOS" title=" - INGRESE NÚMERO DE CÉLULAR CORRECTAMENTE" value="<?php echo $profesor['tel_per']; ?>"/>
</div>

<div class="form-group">
<label>TELÉFONO FIJO:</label><input type="text" name="telfijo_per" id="telfijo_per" class="form-control" minlength="10" maxlength="12" required pattern="[0-9\-]+" placeholder="CAMPO SOLO NÚMERICO EJEMPLO (0276-1234567)" title=" - INGRESE SU NÚMERO DE TELÉFONO FIJO CORRECTAMENTE" readonly="readonly" value="<?php echo $profesor['telfijo_per']; ?>"/>
</div>

<div class="form-group">
<label>CORREO:</label>
<input type="email" readonly="readonly" name="correo_per" id="correo_per" class="form-control" minlength="10" maxlength="30" required pattern="^[\w._%-]+@[\w.-]+\.[a-zA-Z]{2,4}$" placeholder="EJEMPLO (abcd@gmail.com)" title=" - CORREO INCORRECTO RECUERDO AGREGAR (@ y .com)" value="<?php echo $profesor['correo_per']; ?>"/>
</div>

<div class="form-group">
<label>FECHA INICIO:</label>
<input type="text" readonly="readonly" name="fech_ini" id="fech_ini" class="form-control" minlength="4" maxlength="70" required pattern="[A-Za-z0-9ñÑáéíóúÁÉÍÓÚüÜ\,\.\- ]+" placeholder="INGRESE COMPLETA SU DIRECCIÓN" title=" - DIRECCIÓN MUY CORTA" value="<?php echo $profesor['fech_ini']; ?>"/>
</div>

<div class="form-group">
<label>FECHA FIN:</label>
<input type="text" readonly="readonly" name="fech_fin" id="fech_fin" class="form-control" minlength="4" maxlength="70" required pattern="[A-Za-z0-9ñÑáéíóúÁÉÍÓÚüÜ\,\.\- ]+" placeholder="INGRESE COMPLETA SU DIRECCIÓN" title=" - DIRECCIÓN MUY CORTA" value="<?php echo $profesor['fech_fin']; ?>"/>
</div>

<div class="form-group">
<label>ESTATUS:</label>
<input type="text" readonly="readonly" name="estatus_per" id="estatus_per" class="form-control" minlength="4" maxlength="70" required pattern="[A-Za-z0-9ñÑáéíóúÁÉÍÓÚüÜ\,\.\- ]+" placeholder="INGRESE COMPLETA SU DIRECCIÓN" title=" - DIRECCIÓN MUY CORTA" value="<?php echo $profesor['estatus_per']; ?>"/>
</div>

<div class="form-group">
<label>DIRECCIÓN:</label>
<input type="text" readonly="readonly" name="direc_per" id="direc_per" class="form-control" minlength="4" maxlength="70" required pattern="[A-Za-z0-9ñÑáéíóúÁÉÍÓÚüÜ\,\.\- ]+" placeholder="INGRESE COMPLETA SU DIRECCIÓN" title=" - DIRECCIÓN MUY CORTA" value="<?php echo $profesor['direc_per']; ?>"/>
</div>

<!--<div class="form-group">
<label>NIVEL:</label>
<input type="text" class="form-control" name="nivel_academico_profe" id="nivel_academico_profe" minlength="3" maxlength="30" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\. ]+" placeholder="EJEMPLO (Ing. - Tsu. - Lcdo. - Lcda )" title=" - DATOS INCORRECTOS" value="<?php echo $profesor['nivel_academico_profe']; ?>"/>
</div>

<div class="form-group">
<label>DESCRIPCIÓN:</label>
<input type="text" class="form-control" name="descripcion" id="descripcion" minlength="3" maxlength="30" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚüÜ ]+" placeholder="EJEMPLO (MATEMATICA - INFORMATICA - SISTEMAS )" title=" - DATOS INCORRECTOS" value="<?php echo $profesor['descripcion']; ?>"/>
</div><br>-->


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