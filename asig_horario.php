<?php 
// sustituir con los valores reales de 'servidor_mysql', 'usuario', 'clave' y 
//'mi_base_de_datos', según sea necesario 
$cndbx = mysql_connect('localhost', 'root', ''); 
mysql_select_db('sistema_docencia'); 
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

    | Nuevo Pensum

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

      <li class="active"><a href="listado_ahorarios.php">REGRESAR</a></li>

     

  
      </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href='#'><span class='glyphicon glyphicon-user'></span> ADMINISTRADOR</a></li> -->
            <li><a href="salir.php"><span class="glyphicon glyphicon glyphicon-off"></span> SALIR</a></li>                       
            </ul>  
      
    
      
</nav>
</header>

  
<div class="container">
<form method="post" action="insertar_ahorario.php" name="formulario" id="formulario">

<h4 align="center"> NUEVO HORARIO </h4><br>
<div class="row">

<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>LAPSO:
<select name="cod_lapso" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT cod_lapso FROM lapso ORDER BY cod_lapso ASC")or die(mysql_error()); 
while($lapso = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$lapso['cod_lapso']."'>".$lapso['cod_lapso']."</option>";
}
 
?>
</select> 
</label>
</div>
</div>


<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>CARRERA:
<select name="des_carre" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT cod_carre, des_carre FROM carreras ORDER BY  cod_carre, des_carre DESC")or die(mysql_error()); 
while($carreras = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$carreras['cod_carre']."'>".$carreras['des_carre']."</option>";
}
 
?>
</select> 
</label>
</div>
</div>

<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>SECCIÓN:
<select name="id_sec" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT id_sec, cod_sec FROM secciones ORDER BY id_sec, cod_sec ASC")or die(mysql_error()); 
while($secciones = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$secciones['cod_sec']."'>".$secciones['id_sec']."</option>";
}
 
?>
</select> 
</label>
</div>
</div>


<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>HORA INICIO:
<select name="inicio" class="form-control">
<?php


$tabla_asig = mysql_query("SELECT * from horas limit 0,20")or die(mysql_error()); 
while($horas = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$horas['pos']."'>".$horas['inicio']."</option>";

}
 
?>
</select> 
</label>
</div>
</div></div>


<div class="row">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>DIA:
<select name="descripcion" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT descripcion, id_dia FROM dia ORDER BY id_dia, descripcion DESC")or die(mysql_error()); 
while($dia = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$dia['id_dia']."'>".$dia['descripcion']."</option>";
}
 
?>
</select> 
</label>
</div></div>


<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>ASIGNATURA:
<select name="desc_asig" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT desc_asig, cod_asig FROM asignatura ORDER BY cod_asig, desc_asig DESC")or die(mysql_error()); 
while($asignatura = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$asignatura['cod_asig']."'>".$asignatura['desc_asig']."</option>";
}
 
?>
</select> 
</label>
</div>
</div>


<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>AULA:
<select name="n_aula" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT n_aula, cod_aula FROM aula ORDER BY cod_aula, n_aula DESC")or die(mysql_error()); 
while($aula = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$aula['cod_aula']."'>".$aula['n_aula']."</option>";
}
 
?>
</select> 
</label>
</div>
</div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>DOCENTE:
<select name="ci_per" class="form-control">
<?php
 
$tabla_asig = mysql_query("SELECT ci_per FROM personal")or die(mysql_error()); 
while($personal = mysql_fetch_assoc($tabla_asig)) { 
echo "<option value='".$personal['ci_per']."'>".$personal['ci_per']."</option>";
}
 
?>
</select> 
</label>
</div></div></div>

<br/><br/>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-12">
<div class="form-group">
 <td><input type="submit" value="GUARDAR" class="btn btn-warning btn-md">
        <label for="borrar"></label>
      <input type="reset" name="borrar" value="LIMPIAR" id="RESET" class="btn btn-danger btn-md"  /></td>
    </tr>
  </table>
  </table>
</form>



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


  

    
     







<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="assets/js/docs.min.js"></script>

</body>
</html>
     

</body>
</html>