<?php
class Conectar
{
 public static function con()
 {
 $conexion = mysql_connect("localhost","root","");
 mysql_query("SET NAMES 'UTF-8'");
 mysql_select_db("sistema_docencia");
 return $conexion;
 }
}
 
class Buscador
{
 private $busqueda=array();
 
 public function buscar()
 {
        $busqueda = mysql_real_escape_string(addslashes($_GET['s']));
        /*consulta fulltext con el motor myisam
        $query = "SELECT *  MATCH(id_lapso, id_per) AGAINST ('$busqueda') as buscado
              FROM asig_horario
              WHERE MATCH(titulo, cuerpo)
              AGAINST ('$busqueda')
              ORDER BY buscado DESC";
        */
            //consulta con like y el motor innodb
     //$query = "SELECT * FROM personal WHERE ci_per like '%".$busqueda."%' OR id_per like '%".$busqueda."%';";
      $query = "SELECT * FROM asig_horario WHERE id_per like'".$busqueda."' OR id_per like'".$busqueda."';";
     $res = mysql_query($query,Conectar::con());
     while ($reg=mysql_fetch_assoc($res))
     {
         $this->busqueda[] = $reg;
            }
                return $this->busqueda;
     }
    }
?>