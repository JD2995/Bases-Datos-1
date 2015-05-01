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
    //Función que devuelve en un array las mascotas que se encuentran en adopción
    function getEnAdopcion(){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :cursor:= GET_EN_ADOPCION();end;");
        $p_cursor= oci_new_cursor($conn);
        
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
    function getNombre($idMascota){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :nombre:= PAQUETE_MOSTRAR.GET_NOMBRE_MASCOTA(:idMascota);end;");
        $nombre="";
        
        oci_bind_by_name($stid, "nombre", $nombre,50);
        oci_bind_by_name($stid, "idMascota", $idMascota);
        
        oci_execute($stid);
        return $nombre;
    }
    function getTipo($idMascota){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :tipo:= PAQUETE_MOSTRAR.GET_TIPO_MASCOTA(:idMascota);end;");
        $tipo;
        
        oci_bind_by_name($stid, "tipo", $tipo,50);
        oci_bind_by_name($stid, "idMascota", $idMascota);
        
        oci_execute($stid);
        return $tipo;
    }
    function getRaza($idMascota){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :raza:= PAQUETE_MOSTRAR.GET_RAZA_MASCOTA(:idMascota);end;");
        $raza;
        
        oci_bind_by_name($stid, "raza", $raza,50);
        oci_bind_by_name($stid, "idMascota", $idMascota);
        
        oci_execute($stid);
        return $raza;
    }
    function getColor($idMascota){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :color:= PAQUETE_MOSTRAR.GET_COLOR_MASCOTA(:idMascota);end;");
        $color;
        
        oci_bind_by_name($stid, "color", $color,50);
        oci_bind_by_name($stid, "idMascota", $idMascota);
        
        oci_execute($stid);
        return $color;
    }
    function getSeveridad($idMascota){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :severidad:= PAQUETE_MOSTRAR.GET_SEVERIDAD_MASCOTA(:idMascota);end;");
        $severidad;
        
        oci_bind_by_name($stid, "severidad", $severidad,50);
        oci_bind_by_name($stid, "idMascota", $idMascota);
        
        oci_execute($stid);
        return $severidad;
    }
    function getTamaño($idMascota){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :tamano:= PAQUETE_MOSTRAR.GET_TAMANO_MASCOTA(:idMascota);end;");
        $tamano;
        
        oci_bind_by_name($stid, "tamano", $tamano,8);
        oci_bind_by_name($stid, "idMascota", $idMascota);
        
        oci_execute($stid);
        return $tamano;
    }
    function getEntrenamiento($idMascota){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :entrenamiento:= PAQUETE_MOSTRAR.GET_ENTRENAMIENTO_MASCOTA(:idMascota);end;");
        $entrenamiento;
        
        oci_bind_by_name($stid, "entrenamiento", $entrenamiento,50);
        oci_bind_by_name($stid, "idMascota", $idMascota);
        
        oci_execute($stid);
        return $entrenamiento;
    }
    function getEnergia($idMascota){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :nivelEnergia:= PAQUETE_MOSTRAR.GET_ENERGIA_MASCOTA(:idMascota);end;");
        $nivelEnergia;
        
        oci_bind_by_name($stid, "nivelEnergia", $nivelEnergia,50);
        oci_bind_by_name($stid, "idMascota", $idMascota);
        
        oci_execute($stid);
        return $nivelEnergia;
    }
    function getRescatista($idMascota){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :rescatista:= PAQUETE_MOSTRAR.GET_RESCATISTA_MASCOTA(:idMascota);end;");
        $rescatista;
        
        oci_bind_by_name($stid, "rescatista", $rescatista,50);
        oci_bind_by_name($stid, "idMascota", $idMascota);
        
        oci_execute($stid);
        return $rescatista;
    }
    function getVeterinario($idMascota){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :veterinario:= PAQUETE_MOSTRAR.GET_VETERINARIO_MASCOTA(:idMascota);end;");
        $veterinario;
        
        oci_bind_by_name($stid, "veterinario", $veterinario,50);
        oci_bind_by_name($stid, "idMascota", $idMascota);
        
        oci_execute($stid);
        return $veterinario;
    }
    function getEspacio($idMascota){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :espacio:= PAQUETE_MOSTRAR.GET_ESPACIO_MASCOTA(:idMascota);end;");
        $espacio;
        
        oci_bind_by_name($stid, "espacio", $espacio,50);
        oci_bind_by_name($stid, "idMascota", $idMascota);
        
        oci_execute($stid);
        return $espacio;
    }
    function getEnfermedad($idMascota){
        $conn= $GLOBALS['conn'];
        $stid= oci_parse($conn,"begin :enfermedad:= PAQUETE_MOSTRAR.GET_ENFERMEDAD_MASCOTA(:idMascota);end;");
        $enfermedad;
        
        oci_bind_by_name($stid, "enfermedad", $enfermedad,50);
        oci_bind_by_name($stid, "idMascota", $idMascota);
        
        oci_execute($stid);
        return $enfermedad;
    }
}