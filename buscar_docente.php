<?php require_once('Connections/conexion_docentes.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_POST['varced'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_POST['varced'] : addslashes($_POST['varced']);
}
mysql_select_db($database_conexion_docentes, $conexion_docentes);
$query_Recordset1 = sprintf("SELECT * FROM profesor WHERE ci_profe = '%s'", $colname_Recordset1);
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexion_docentes) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
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

    Buscar Docente

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
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container" responsive>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="menu_principal.php" ><img src="img/logo2.png" class="img-responsive img-rounded" alt="test"></a>
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

<div class="form-group">
<label for="textfield"></label>
<form name="form1" method="post" action="">
<input type="text" name="varced" id="varced" placeholder="INGRESE EL NÚMERO DE CÉDULA DEL DOCENTE A CONSULTAR" class="form-control" />
</div>
<label for="Submit"></label>
<p align="center">
<input type="submit" name="Submit" value="BUSCAR" id="Submit" class="btn btn-warning btn-md" />
</form>




</p><BR>

<div class="row-file-a">
<div class="col-xs-12 ">
<h1>  </h1>
<?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
  <form name="form2" method="post" action="">
<div class="table-responsive">
<table class="table table-bordered table-striped table-condensed table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>CÉDULA</th>
            <th>NOMBRE</th> 
            <th>APELLIDO</th>
            <th>AREA</th>
            <th>CELULAR</th>
            <th>TELÉFONO</th>
            <th>EMAIL</th>
            <th>DIRECCIÓN</th>
            <th>NIVEL</th>
            <th>DESCRICCIÓN</th>
            
          </tr>
        </thead>
      <tbody>
          <?php do { ?>
          <tbody id="myTable">
      <tr>
        <td><?php echo $row_Recordset1['id_profe']; ?></td>
        <td><?php echo $row_Recordset1['ci_profe']; ?></td>
        <td><?php echo $row_Recordset1['nombr_profe']; ?></td>
        <td><?php echo $row_Recordset1['apell_profe']; ?></td>
        <td><?php echo $row_Recordset1['cod_area_telef']; ?></td>
        <td><?php echo $row_Recordset1['telef_profe']; ?></td>
        <td><?php echo $row_Recordset1['telef_fijo_profe']; ?></td>
        <td><?php echo $row_Recordset1['email_profe']; ?></td>
        <td><?php echo $row_Recordset1['direccion_profe']; ?></td>
        <td><?php echo $row_Recordset1['nivel_academico_profe']; ?></td>
        <td><?php echo $row_Recordset1['descripcion']; ?></td>
      </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table>
    </div>
  </form>
  <?php } // Show if recordset not empty ?><p>&nbsp;</p>
<?php
mysql_free_result($Recordset1);
?>

  <!--<p align="center"><a  class="btn btn-danger" href="opciones_docentes.php">REGRESAR </a></p> -->


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
