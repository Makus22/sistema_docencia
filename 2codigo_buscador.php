<?php
require_once("class.php");
$bus = new Buscador();
$buscame = $bus->buscar();
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

    | Busqueda

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

      <li class="active"><a href="2buscador.php">REGRESAR</a></li>

     

  
      </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>  
      
    
      
</nav>
</header>
<!--<style type="text/css">
 table{border:1px solid black; margin: 100px 0px 0px 160px}
 th{background-color:#0000FF; color:#fff;}
 td{background-color:#CCCCCC;}-->
</style>
</head>
<body>
<div class="container">
<div class="row">
<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="table-responsive">

  <div align="center"><h2>HORARIO DOCENTE</h2></div><br />
  <table  class="table table-bordered table-striped table-condensed table-hover">
 <tr>
 <th width="100px">LAPSO</th>
 <th width="100px">INICIO</th>
 <th width="100">CARRERA</th>
 <th width="100">SECCION</th>
 <th width="100px">DIA</th>
 <th width="100px">ASIGNATURA</th>
 <th width="100px">DOCENTE</th>
 <th width="100">AULA</th>
 
 </tr>
<?php
//COMPROBAMOS SI HAY REGISTROS EN LA BUSQUEDA, SI NO LOS HAY, MOSATRAMOS UN MENSAJE DICIENDO QUE NO HAY RESULTADOS, EN OTRO CASO, MOSTRAMOS LOS RESULTADOS
if(count($buscame)==0)
{
echo "<div align='center'><h2>No hay resultados para su búsqueda...</h2>";
}else{
for($i=0;$i<sizeof($buscame);$i++)
{
?>
 <tr>
 <td align="center">
 <?php echo $buscame[$i]["cod_lapso"] ?>
 </td>
 <td align="center">
 <?php echo $buscame[$i]["id_hora"] ?>
 </td>
 <td align="center">
 <?php echo $buscame[$i]["cod_carre"] ?>
 </td>
 <td align="center">
 <?php echo $buscame[$i]["id_sec"] ?>
 </td>
 
 <td align="center">
 <?php echo $buscame[$i]["id_dia"] ?>
 </td>
 <td align="center">
 <?php echo $buscame[$i]["cod_asig"] ?>
 </td>
 <td align="center">
 <?php echo $buscame[$i]["id_per"] ?>
 </td>
 <td align="center">
 <?php echo $buscame[$i]["id_aula"] ?>
 </td>
 </tr>
<?php
}
}
?>

<!--<td><a href='reportes/repo_completo.php?ci_per=$buscame[$i]' class='btn btn-info btn-xs'>IMPRIMIR</a>-->


</table>
<br>
<dvi align="center"> <h4>PARA REALIZAR LA IMPRESIÓN DEBE INGRESAR NUEVAMENTE SU NÚMERO DE CÉDULA</h4>
<form name="form" action="reportes/repo_completo.php" method="get">
<input class="form-control" type="text" name="s" /><br/ >
<input type="submit" value="IMPRIMIR" title="Buscar" class="btn btn-danger btn-md" />
</body>
</html>