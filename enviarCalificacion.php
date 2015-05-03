<?php 
    include_once 'Globales.php';
    include_once 'Consulta.php';
    $conn= $GLOBALS["conn"];
    $consul= new Consulta();
    $modo= $_GET['modo'];
    $idPersona= $_GET['idPersona'];
    print"$idPersona";
    if($modo=="adoptante"){
        $idRescatista=$consul->getRescatistaPersona($idPersona);
    }
    else{
        $idRescatista=$consul->getAdoptantePersona($idPersona);
    }
    
    if($idRescatista == -1){
        print"
        <script type=\"text/javascript\">
          alert(\"Error, no se puede enviar calificacion debido a que no se es una persona autorizada\");
          history.back();
        </script>";
    }
    $puntaje= $_POST['puntaje'];
    $notas= $_POST['notas'];
    $puntaje= intval($puntaje);
    $resultado;
    
    $idMascota= $_GET['mascota_ID'];
    
    if($modo=="adoptante"){
        $stid= oci_parse($conn,"begin :resul:=PAQUETE_CALIFICACION.CALIFICAR_ADOPTANTE(:idRescatista,:idMascota,:pPuntaje,:pNota);end;");
    }
    else{
        $stid= oci_parse($conn,"begin :resul:=PAQUETE_CALIFICACION.CALIFICAR_RESCATISTA(:idRescatista,:idMascota,:pPuntaje,:pNota);end;");
    }

    oci_bind_by_name($stid, "resul", $resultado);
    oci_bind_by_name($stid, "idRescatista", $idRescatista);
    oci_bind_by_name($stid, "idMascota", $idMascota);
    oci_bind_by_name($stid, "pPuntaje", $puntaje);
    oci_bind_by_name($stid, "pNota", $notas);

    oci_execute($stid);
    
    //Si el envió de la calificación tuvo éxito
    if ($resultado == 2){
        print"
        <script type=\"text/javascript\">
          alert(\"La calificacion se realizo con exito\");
          history.back();
        </script>";
    }
    //Si la persona no se está asociada con la mascota
    else if($resultado == 0){
        print"
        <script type=\"text/javascript\">
          alert(\"Error, no se puede enviar calificacion debido a que no se es una persona autorizada\");
          history.back();
        </script>";
    }
    else {
        echo '<script language="javascript">';
        echo 'alert("message successfully sent")';
        echo '</script>';
    }