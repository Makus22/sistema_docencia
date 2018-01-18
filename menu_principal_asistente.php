<?php
  session_start();
  if(isset($_SESSION['MM_Username']))
  {
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

    Menu Principal Asistente

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
           <!-- <li><a><span class="glyphicon glyphicon-plus-sign" data-toggle="modal" data-target="#myModal"></span> CREAR USUARIO</a></li>  -->
                     
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ASISTENTE</a></li> 
            <ul class="nav navbar-nav navbar-right">-->
            <?php               
              echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> ".$_SESSION['MM_Username']."</a></li>";
            ?>              
            
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                         
            </ul>
        </div>
      </div>
    </nav>
  </header>

   
    <div class="row">
      <div class="col-xs-12"> 

<div class="container">
  
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
          <li class="list-group-item btn-default"><a href="menu_asistente.php">PROFESORES</li></a>
          <!--<li class="list-group-item btn-default"><a href="en_proceso_de_construccion2.php">USUARIOS</li></a>-->
          <li class="list-group-item btn-default"><a href="en_proceso_de_construccion2.php">PENSUM</li></a>
          <li class="list-group-item btn-default"><a href="en_proceso_de_construccion2.php">SECCIONES</li></a>
          <li class="list-group-item btn-default"><a href="en_proceso_de_construccion2.php">AULAS</li></a>
          <li class="list-group-item btn-default"><a href="en_proceso_de_construccion2.php">MATERIA</li></a>
          <li class="list-group-item btn-default"><a href="en_proceso_de_construccion2.php">PERIODO</li></a> 
          <li class="list-group-item btn-default"><a href="en_proceso_de_construccion2.php">HORARIOS</li></a>
          <li class="list-group-item btn-default"><a href="en_proceso_de_construccion2.php">CARRERAS</li></a>

        </ul>
    </div>
    <div id="menu1" class="tab-pane fade">
      <!--<h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div> -->
    <div align="center"><img class="img-responsive" src="img/construccion5.jpg" alt="test"></div>

    </div>

    <div id="menu2" class="tab-pane fade">
     <!-- <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p> -->

      <div align="center"><img class="img-responsive" src="img/construccion5.jpg" alt="test"></div>
    </div>


    
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
  }
  else
  {
    ?>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=menu_principal_asistente.php">
     <?php
  }
?>