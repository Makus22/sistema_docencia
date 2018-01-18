<?php require_once('Connections/conexion_docentes.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO profesor (nac_profe, ci_profe, nombr_profe, apell_profe, cod_area_telef, telef_profe, telef_fijo_profe, email_profe, direccion_profe, nivel_academico_profe, descripcion, bandera) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, 1)",
                       GetSQLValueString($_POST['nac_profe'], "text"),
                       GetSQLValueString($_POST['ci_profe'], "int"),
                       GetSQLValueString($_POST['nombr_profe'], "text"),
                       GetSQLValueString($_POST['apell_profe'], "text"),
                       GetSQLValueString($_POST['cod_area_telef'], "int"),
                       GetSQLValueString($_POST['telef_profe'], "text"),
                       GetSQLValueString($_POST['telef_fijo_profe'], "text"),
                       GetSQLValueString($_POST['email_profe'], "text"),
                       GetSQLValueString($_POST['direccion_profe'], "text"),
                       GetSQLValueString($_POST['nivel_academico_profe'], "text"),
                       GetSQLValueString($_POST['descripcion'], "text"));

  mysql_select_db($database_conexion_docentes, $conexion_docentes);
  $Result1 = mysql_query($insertSQL, $conexion_docentes) or die(mysql_error());

  echo '<script language="javascript">alert("Docente Guardado");</script>';

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Victor Soto">

<title>

    Guardar Docente

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
            <li><a href="menu_principal_asistente.php"><span class="glyphicon glyphicon-home"></span> INÍCIO</a></li>             
            <li><a href="menu_asistente.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> REGRESAR</a></li>
  
                        
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href='#'><span class='glyphicon glyphicon-user'></span> ASISTENTE</a></li>
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                              
            </ul>     
        </div>
      </div>
    </nav>
  </header>

  <div class="container">      
        <div class="row">
          <div class="col-xs-12">  



<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <p align="center"><strong>INGRESE DATOS DEL DOCENTE</strong></p>
    
    <div class="form-inline">
    <label for="textfield">CÉDULA:</label> <br>
    <select name="nac_profe" id="nac_profe" class="form-control" title=" - SELECCIONES SU NACIONALIDAD">
      <option>V -</option>
      <option>E -</option>
      </select>
    <input type="text" name="ci_profe" value="" class="form-control" minlength="7" maxlength="8" required pattern="[0-9]+" placeholder="CEDULA COMPLETA" title=" - INGRESE LA CEDULA SIN (.) NI SEPARACIONES"  />
    </div><br>
    
    <div class="form-group">
    <label for="textfield">NOMBRE:</label>
    <input type="text" name="nombr_profe" value="" class="form-control" minlength="3" maxlength="30" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚüÜ ]+" placeholder="NOMBRES COMPLETOS" title=" - SOLO INGRESE LETRAS">
    </div>
    <div class="form-group">
    <label for="textfield">APELLIDO:</label>
    <input type="text" name="apell_profe" value="" class="form-control" minlength="3" maxlength="30" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚüÜ ]+" placeholder="APELLIDOS COMPLETOS" title=" - SOLO INGRESE LETRAS">
    </div>

    <div class="form-inline">
    <label for="textfield">TELEFONO CELULAR:</label> <br>
    <select name="cod_area_telef" id="cod_area_telef" class="form-control">
      <option>0412</option>
      <option>0414</option>
      <option>0424</option>
      <option>0416</option>
      <option>0426</option>
      </select>
    <input type="text" name="telef_profe" value="" class="form-control" minlength="7" maxlength="7" required pattern="[0-9]+" placeholder="NÚMERO CELULAR" title=" - INGRESE NÚMERO DE TELÉFONO FIJO CORRECTAMENTE"  />
    </div><br>

    <div class="form-group">
    <label for="textfield">TELÉFONO FIJO:</label>
    <input type="text" name="telef_fijo_profe" value="" class="form-control" minlength="10" maxlength="12" required pattern="[0-9\-]+" placeholder="CAMPO SOLO NÚMERICO EJEMPLO (0276-1234567)" title=" - INGRESE NÚMERO DE TELÉFONO CORRECTAMENTE" >
    </div>

   <div class="form-group">
    <label for="textfield">EMAIL:</label>
    <input type="email" name="email_profe" value="" class="form-control" minlength="11" maxlength="30" required pattern="/^([a-zA-Z0-9_\.\.es\.net\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" placeholder="EJEMPLO (abcd@gmail.com)" title=" - CORREO INCORRECTO RECUERDE AGREGAR (@ y .com)">
    </div>

    <div class="form-group">
    <label for="textfield">DIRECCIÓN:</label>
    <input type="text" name="direccion_profe" value="" class="form-control" minlength="6" maxlength="70" required pattern="[A-Za-z0-9ñÑáéíóúÁÉÍÓÚüÜ\,\.\- ]+" placeholder="INGRESE COMPLETA LA DIRECCIÓN" title=" - DIRECCIÓN MUY CORTA">
    </div>

    <div class="form-inline">
    <label for="textfield">DESCRIPCIÓN:</label> <br>
        <select name="nivel_academico_profe" id="nivel_academico_profe" class="form-control">
          <option>ING.</option>
          <option>LCD.</option>
          <option>DR.</option>
          <option>TSU.</option>
          <option>POSTGRADO.</option>
          <option>PREGRADO.</option>
        </select>
        <input type="text" name="descripcion" value="" class="form-control" minlength="2" maxlength="20" required pattern="[A-Za-z0-9ñÑáéíóúÁÉÍÓÚüÜ\,\.\- ]+" placeholder="INGRESE CARRERA" title=" - DESCRIPCIÓN MUY CORTA" />
    </div><br>

    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="GUARDAR" class="btn btn-warning btn-md" onclick="ConfirmDemo()" value="Click para ver un mensaje de confirmación">
        <label for="borrar"></label>
      <input type="reset" name="borrar" value="LIMPIAR" id="RESET" class="btn btn-danger btn-md"  /></td>
    </tr>
  </table>
  </table>
  <p>&nbsp;  </p>
  <p>&nbsp;</p>
  <p align="center">
    <input type="hidden" name="MM_insert" value="form1">
      <!--<a class="btn btn-danger" href="opciones_docentes.php">REGRESAR</a> -->
</p>
</form>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="assets/js/docs.min.js"></script>



  </body>
</html>
