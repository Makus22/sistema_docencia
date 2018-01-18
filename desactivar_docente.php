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

if ((isset($_POST['varced'])) && ($_POST['varced'] != "")) {
  $deleteSQL = sprintf("UPDATE profesor set bandera=0 WHERE ci_profe=%s",
                       GetSQLValueString($_POST['varced'], "text"));

  mysql_select_db($database_conexion_docentes, $conexion_docentes);
  $Result1 = mysql_query($deleteSQL, $conexion_docentes) or die(mysql_error());
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

    Eliminar Docente

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

<script type="text/javascript">
<!--
function confirmation() {
    if(confirm("Realmente desea eliminar?"))
    {
        return true;
    }
    return false;
}
//-->
</script>
<body>

    <header>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <a href="menu_principal.php" ><img src="img/logo2.png" class="img-responsive img-rounded" alt="test"></a>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
            <span class="sr-only">Desplegar / Ocultar Menu</span> 
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand"><!-- aqui texto --></a>
        </div>
        <div class="collapse navbar-collapse" id="navegacion-fm">
          <ul class="nav navbar-nav">
            <li><a href="menu_principal.php"><span class="glyphicon glyphicon-home"></span> INÍCIO</a></li>             
            <li><a href="listado_docentes_busqueda.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> REGRESAR</a></li> 
                      
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li>    
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                              
            </ul>     
        </div>
      </div>
    </nav>
  </header>

 <div class="container">      
        <div class="row">
          <div class="col-xs-12"> 

<form id="form1" name="form1" method="post" action="" onsubmit="return confirmation()">

  <div class="form-group">
  <label for="textfield">
  <label align="center"></label>
  </label>
    <input type="text" name="varced" id="varced" placeholder="INGRESE EL NÚMERO DE CÉDULA DEL DOCENTE A ELIMINAR" class="form-control" />
  </div>
  <label for="Submit"></label>
  <p align="center">
    <input type="submit" name="Submit" value="ELIMINAR" id="Submit" class="btn btn-danger btn-md" />
  </p>
  
  <!--<p align="center"><a class="btn btn-primary" href="opciones_docentes.php">REGRESAR</a></p> -->
  <p>&nbsp; </p>
</form>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="assets/js/docs.min.js"></script>



  </body>
</html>
