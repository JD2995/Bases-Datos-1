<?php
/**
 * Clase que realiza consulta de mascotas
 * @author Javier Rivas
 */
class Consulta {
    function getNoAdoptados($cantMeses){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :cursor:= PAQUETE_MOSTRAR.GET_NO_ADOPTADOS(:cantMeses);end;");
        $p_cursor= oci_new_cursor($conn);
        
        oci_bind_by_name($stid, ":cantMeses", $cantMeses);
        
        oci_bind_by_name($stid, ':cursor', $p_cursor, -1, OCI_B_CURSOR);
        
        oci_execute($stid);
        oci_execute($p_cursor, OCI_DEFAULT);
        
        //Creacion del array con las mascotas
        include_once('Mascota.php');
        $arrayMascotas= array();
        while (($row = oci_fetch_array($p_cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            $mascota= new Mascota();
            $mascota->setMascota_ID($row['MASCOTA_ID']);
            $mascota->setNombre($row['NOMBRE']);
            $arrayMascotas[]= $mascota;
        }
        
        return $arrayMascotas;
    }
}