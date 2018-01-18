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
  $insertSQL = sprintf("INSERT INTO usuarios (nivel_usu, desc_usu, cont_usu) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['nivel_usu'], "int"),
                       GetSQLValueString($_POST['desc_usu'], "text"),
                       GetSQLValueString($_POST['cont_usu'], "text"));

  mysql_select_db($database_conexion_docentes, $conexion_docentes);
  $Result1 = mysql_query($insertSQL, $conexion_docentes) or die(mysql_error());

  $insertGoTo = "menu_principal.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_conexion_docentes, $conexion_docentes);
$query_Recordset1 = "SELECT * FROM usuarios";
$Recordset1 = mysql_query($query_Recordset1, $conexion_docentes) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "menu_principal_visitante.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
<meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

<title>

    Menú Principal Admin

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
           <!--<li><a><span class="glyphicon glyphicon-plus-sign" data-toggle="modal" data-target="#myModal"></span> CREAR USUARIO</a></li>  -->
                     
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                         
            </ul>
        </div>
      </div>
    </nav>
  </header>

   
    <div class="row">
      <div class="col-xs-12"> 

<div class="container">
  <!--<div class="container" style="margin-top:200px">-->

  <ul class="nav nav-tabs nav-justified">
    <li class="active"><a data-toggle="tab" href="#home">DOCENTES</a></li>
    <li><a data-toggle="tab" href="#menu1">PROCESOS</a></li>
    <li><a data-toggle="tab" href="#menu2">REPORTES</a></li>
    <!--<li><a data-toggle="tab" href="#menu3">CREAR USUARIO</a></li>-->
  </ul>
<br>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <ul class="list-group">
          <li class="list-group-item btn-default"><a href="listado_docentes.php">PROFESORES</li></a>
          <li class="list-group-item btn-default"><a href="listado_usuarios.php">USUARIOS</li></a>
          <li class="list-group-item btn-default"><a href="listado_pensum.php">DETALLE PENSUM</li></a>
          <li class="list-group-item btn-default"><a href="listado_dia.php">DIA</li></a>
          <li class="list-group-item btn-default"><a href="listado_hora.php">HORARIO</li></a>
          <li class="list-group-item btn-default"><a href="pensum.php">PENSUM</li></a>
          <li class="list-group-item btn-default"><a href="listado_secciones.php">SECCIONES</li></a>
          <li class="list-group-item btn-default"><a href="listado_aulas.php">AULAS</li></a>
          <li class="list-group-item btn-default"><a href="listado_asignatura.php">ASIGNATURA</li></a>
          <li class="list-group-item btn-default"><a href="listado_lapso.php">PERIODO (LAPSO)</li></a>
          <!--<li class="list-group-item btn-default"><a href="en_proceso_de_construccion.php">MATERIA A DICTAR</li></a>-->
          <!--<li class="list-group-item btn-default"><a href="horario.html">HORARIOS</li></a>-->
          <li class="list-group-item btn-default"><a href="listado_carreras.php">CARRERAS</li></a>

        </ul>
    </div>
    <div id="menu1" class="tab-pane fade">
          <li class="list-group-item btn-default"><a href="listado_ahorarios.php">HORARIO</li></a></li>
        

    </div>

    <div id="menu2" class="tab-pane fade">
     <!-- <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p> -->

       <li class="list-group-item btn-default"><a href="2buscador.php">VER HORARIO</li></a>
    </div>

  </div>
</div>

        </ul>

      </div>

      </div>
    </div>
    </div> 



    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-md">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">NUEVO USUARIO</h4>
        </div>
        <div class="modal-body">
          <p></p>
        

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
 
    <div class="form-group">
    <label nowrap align="right">USUARIO:</label>
    <input type="text" name="usuario" value="" size="32" class="form-control"></input>
    </div>

    <div class="form-group">
    <label nowrap align="right">CLAVE:</label>
    <input type="password" name="contrasena" value="" size="32" class="form-control"></input>
    </div>
<br>
    <div class="radio-inline">
                <label>
                  <input type="radio" name="id" id="id" value="1" checked>
                  ADMINISTRADOR
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="id" id="id" value="2">
                  ASISTENTE
                </label>
              </div><br>
 
    <!--<div align="center">
    <label nowrap align="center">&nbsp;</label>
    
    <input type="reset" align="center" value="BORRAR" class="btn btn-danger btn-md"></input>-->
    <div class="modal-footer" align="center">
      <div align="center"> <input type="submit" value="GUARDAR" class="btn btn-warning btn-md"></input>
          <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
        </div>
    </div>


  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="assets/js/docs.min.js"></script>



  </body>
</html>

<?php
mysql_free_result($Recordset1);
?>
