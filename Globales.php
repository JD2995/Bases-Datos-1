<?php
//Conectar a la base de datos
$conn = oci_connect('progra_1', 'progra_1', 'localhost/dbprueba');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}    
$GLOBALS['conn']=$conn;

//Función que obtiene persona_ID por medio de nombre de Usuario y lo coloca como variable global
function setGlobalPersona_ID($Usuario){
    $stid= oci_parse($GLOBALS['conn'],"begin :persona_id:= PAQUETE_LOGIN.GET_PERSONAID_X_USUARIO(:usuario);end;");
    $Persona_ID;
        
    oci_bind_by_name($stid, ":persona_id", $Persona_ID);
    oci_bind_by_name($stid, ":usuario", $Usuario);
    oci_execute($stid);
    
    //Global de persona_id de la persona con la sesión iniciada
    $GLOBALS['Persona_ID']=$Persona_ID;
}

//Función que retorna 0 si la persona ingresada es rescatista y 1 si no lo es
function validarRescatista($idPersona){
    $stid= oci_parse($GLOBALS['conn'],"begin :resultado:= PAQUETE_LOGIN.VALIDAR_RESCATISTA(:idPersona);end;");
    $resultado;
        
    oci_bind_by_name($stid, ":idPersona", $idPersona);
    oci_bind_by_name($stid, ":resultado", $resultado);
    oci_execute($stid);
    return $resultado;
}
