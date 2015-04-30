<?php
/**
 * Description of Mascota
 *
 * @author Javier Rivas
 */
class Mascota {
    var $mascota_ID;
    var $nombre;
    
    function getNombre(){
        return $this->nombre;
    }
    function getMascota_ID(){
        return $this->mascota_ID;
    }
    function setNombre($pnombre){
        $this->nombre= $pnombre;
    }
    function setMascota_ID($pID){
        $this->mascota_ID=$pID;
    }
}
