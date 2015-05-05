<?php
require_once("funcionesGenerales.php");
include "Globales.php";
$conexion= $GLOBALS['conn'];
$resultado;
$statement = oci_parse($conexion, "begin :ret :=paquete_mostrar.mostrarMotivos(); end;");
oci_bind_by_name($statement, ':ret', $resultado, 1000);
oci_execute($statement);		
//print $resultado;
if(count($resultado)==0)
{
// deberia alertar sobre el error
}
else
{
    $enfermedades = getCSVValues($resultado,";");
    $motivos= array();
    //print count($enfermedades);
        for($i = 0; $i<count($enfermedades)-1;$i++)
        { 			// aqui lo que hacemos es crear la lista de tipos, para que aparezca en la interfaz, según los
            $enfermedadSeparado = getCSVValues($enfermedades[$i],",");
            array_push($motivos, $enfermedadSeparado[0]);
        }	
}
$i=$_POST['motivo'];
//Obtiene el id del motivo seleccionado
$statement = oci_parse($conexion, "SELECT MOTIVO_ID FROM MOTIVO WHERE detalle= :pdetalle");
oci_bind_by_name($statement, ':pdetalle', $motivos[$i], 1000);
print $motivos[$i];
oci_execute($statement);		
oci_fetch($statement);
$idMotivo= oci_result($statement, 'MOTIVO_ID');
//Obtiene el id adoptante de la persona con sesion iniciada
include_once 'Consulta.php';
$consul= new Consulta();
$idPersona= $_GET['idPersona'];
$idAdoptante=$consul->getAdoptantePersona($idPersona);
//Obtiene el id de la mascota a devolver
$idMascota= $_GET['mascota_ID'];
//Ejecuta la devolución
$statement = oci_parse($conexion, "Begin Paquete_registro_devol.registro_devolucion(:idAdoptante,:idMascota,:idMotivo); end;");
oci_bind_by_name($statement, ':idAdoptante', $idAdoptante, 1000);
oci_bind_by_name($statement, ':idMascota', $idMascota, 1000);
oci_bind_by_name($statement, ':idMotivo', $idMotivo, 1000);
oci_execute($statement);

print"
        <script type=\"text/javascript\">
          alert(\"La mascota fue devuelta con exito\");
          history.back();
        </script>";