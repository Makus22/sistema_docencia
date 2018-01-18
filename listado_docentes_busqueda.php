<?php require_once('Connections/conexion_docentes.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conexion_docentes, $conexion_docentes);
$query_Recordset1 = "SELECT * FROM profesor where bandera=1";
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

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
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

    Listado Docentes

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
          <div class="clearfix visibe-xs"></div>
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
            <li><a href="guardar_docente.php"><span class="glyphicon glyphicon-plus-sign" ></span> AGREGAR</a></li> 
             <li><a href="buscar_docente.php"><span class="glyphicon glyphicon-zoom-in"></span> BUSCAR</a></li>  
             <li><a href="modificar_docente.php"><span class="glyphicon glyphicon-pencil"></span> MODIFICAR</a></li>  
             <li><a href="desactivar_docente.php"><span class="glyphicon glyphicon-trash"></span> ELIMINAR</a></li>           
            <!--<li><a href="opciones_docentes.php"><span class="glyphicon glyphicon-arrow-left"></span> REGRESAR AL MENÚ ANTERIOR</a>--></li> 
                    
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>     
        
      
    </nav>
  </header>

<div class="container">
  <!--<div class="container" style="margin-top:200px">-->

 
  <!--<h4>Escriba algo en el campo de entrada para buscar nombres, apellidos o correos electrónicos en la tabla:</h4> -->
  <input class="form-control" id="myInput" type="text" placeholder="INGRESE: NOMBRES, APELLIDOS, CORREO O C.I PARA REALIZAR LA BUSQUEDA">
  <br>
  <div class="table-responsive">
  <table  class="table table-bordered table-striped table-condensed table-hover">
    <thead>
        <tr>
            <th>N°</th>
            <th>NAC</th>
            <th>CÉDULA</th>
            <th>NOMBRE</th> 
            <th>APELLIDO</th>
            <th>AREA</th>
            <th>CELULAR</th>
            <th>TELÉFONO</th>
            <th>EMAIL</th>
            <!--<th>DIRECCIÓN</th>
            <th>NIVEL</th>
            <th>DESCRICCIÓN</th>-->
            <th><span class="glyphicon glyphicon-wrench"></th>
            <th></th>
            <th></th>


            
            
          </tr>
        </thead>
      <tbody>
          <?php do { ?>
          <tbody id="myTable">
      <tr>

        <td><?php echo $row_Recordset1['id_profe']; ?></td>
        <td><?php echo $row_Recordset1['nac_profe']; ?></td>
        <td><?php echo $row_Recordset1['ci_profe']; ?></td>
        <td><?php echo $row_Recordset1['nombr_profe']; ?></td>
        <td><?php echo $row_Recordset1['apell_profe']; ?></td>
        <td><?php echo $row_Recordset1['cod_area_telef']; ?></td>
        <td><?php echo $row_Recordset1['telef_profe']; ?></td>
        <td><?php echo $row_Recordset1['telef_fijo_profe']; ?></td>
        <td><?php echo $row_Recordset1['email_profe']; ?></td>
        <!--<td><?php echo $row_Recordset1['direccion_profe']; ?></td>
        <td><?php echo $row_Recordset1['nivel_academico_profe']; ?></td>
        <td><?php echo $row_Recordset1['descripcion']; ?></td>-->

        
         <td><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">DETALLES</td></button>

         <!-- Modal1 -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EDITAR</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- -->

        <!--<form action="modificar_docente.php" method="post">-->
        <td><button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal2">MODIFICAR</td></button>

         <!-- Modal2 -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">MODIFICAR</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- -->


        <!--<form action="desactivar_docente.php" method="post">-->
        <td><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal3">ELIMINAR</td></button>

<!-- Modal3 -->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ELIMINAR</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- -->

<!-- Modal3 -->
<div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ELIMINAR</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- -->



      </tr>


      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>

  </table>
  </div>
  <p>&nbsp;</p>
  <p>
  <table border="0" width="50%" align="center">
    <tr>
      <td width="23%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><img src="First.gif" border=0></a>
            <?php } // Show if not first page ?>
      </td>
      <td width="31%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><img src="Previous.gif" border=0></a>
            <?php } // Show if not first page ?>
      </td>
      <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><img src="Next.gif" border=0></a>
            <?php } // Show if not last page ?>
      </td>
      <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><img src="Last.gif" border=0></a>
            <?php } // Show if not last page ?>
      </td>
    </tr>


    
     </table>
    </tbody>
  </table>
  
  <p><!--texto aqui--></p>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="assets/js/docs.min.js"></script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>





  </body>
</html>

<?php
mysql_free_result($Recordset1);
?>