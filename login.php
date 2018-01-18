<?php require_once('Connections/conexion_docentes.php'); ?>
<?php
mysql_select_db($database_conexion_docentes, $conexion_docentes);
$query_Recordset1 = "SELECT * FROM usuarios";
$Recordset1 = mysql_query($query_Recordset1, $conexion_docentes) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['textfield'])) {
  $loginUsername=$_POST['textfield'];
  $password=$_POST['textfield2'];
  $MM_fldUserAuthorization = "nivel_usu";
  $MM_redirectLoginSuccess = "menu_principal.php";
  $MM_redirectLoginFailed = "error.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conexion_docentes, $conexion_docentes);
  	
  $LoginRS__query=sprintf("SELECT desc_usu, cont_usu, nivel_usu FROM usuarios WHERE desc_usu='%s' AND cont_usu='%s'",
  get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexion_docentes) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'nivel_usu');
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    //header("Location: ". $MM_redirectLoginFailed );
    echo"<script type=\"text/javascript\">alert('Usuario o Contraseña Incorrecta'); window.location='login.php';</script>";
  }
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

    Login

</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Documentation extras -->
<link href="assets/css/docs.min.css" rel="stylesheet">
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="assets/js/ie-emulation-modes-warning.js"></script>


<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
<link rel="icon" href="favicon.ico">


  </head>

<header>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
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
           <!-- <li><a href="login.php"><span class="glyphicon glyphicon-home"></span> INICIO</a></li>           
            <li><a><span class="glyphicon glyphicon-plus-sign" data-toggle="modal" data-target="#myModal"></span> REGISTRATE </a></li> 
 -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <!--<li><a href="#"><span class="glyphicon glyphicon-user" data-toggle="modal" data-target="#myModal"> REGISTRATE</span></a></li>-->
          <li><a href='#'><span class="glyphicon glyphicon-log-in" data-toggle="modal" data-target="#myModal2"> INICIAR</span></a></li>                  
            </ul>     
        </div>
      </div>
    </nav>
  </header>



<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">



  <div class="container"> 
        <div class="row" style="padding-left: 1px">
          <div class="col-xs-9 col-ms-8 col-md-8 col-lg-4 ">




<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input type="text" name="textfield" class="form-control" id="textfield" class="form-control" minlength="1" maxlength="20" placeholder="USUARIO" required />
  </div> <br>
  <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input type="password" class="form-control" name="textfield2" id="label" class="form-control" minlength="2" maxlength="20" placeholder="CONTRASEÑA" required />
  </div> <br>

  <!--<div class="form-group ">        
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Recordar</label>
        </div> -->

  <label for="Submit"></label>
  <input type="submit" name="Submit" value="ENTRAR" id="Submit" class="btn btn-warning btn-md" />
  <input type="reset" name="reset" value="BORRAR" id="reset" class="btn btn-danger btn-md" />
</form>
</div></div></div>

<!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content modal-md">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BIENVENIDO(A)</h4>
        </div>
        <div class="modal-body">
          <!--<p ALIGN="CENTER"></p>-->
        </div>
        <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input type="text" name="textfield" class="form-control" id="textfield" class="form-control" minlength="1" maxlength="20" placeholder="USUARIO" required />
  </div> <br>
  <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input type="password" class="form-control" name="textfield2" id="label" class="form-control" minlength="2" maxlength="20" placeholder="CONTRASEÑA" required />
  </div>

  <!--<div class="form-group ">        
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Recordar</label>
        </div> --> <br>

<div class="modal-footer">
  <label for="Submit"></label>
  <div align="center"><input type="submit" name="Submit" value="ENTRAR" id="Submit" class="btn btn-warning btn-md" />
  <!--<input type="reset" name="reset" value="BORRAR" id="reset" class="btn btn-danger btn-md" /> -->
  <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
</form>

        <!--<div class="modal-footer">
  <input type="reset" name="reset" value="BORRAR" id="reset" class="btn btn-danger btn-md" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button> -->
        </div>
      </div>
      </div></div></div>
    </div>
  </div>
  
</div>

<!-- =================================================-->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-xs">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">EN PROCESO DE CONSTRUCCIÓN</h4>
        </div>
        <div class="modal-body">

          <p><!--aqui se ingresa texto--></p>
           <img class="img-responsive" src="img/construccion5.jpg" alt="test">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


  

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