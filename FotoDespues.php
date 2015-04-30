<?php   
 $db ="(DESCRIPTION =
 (ADDRESS =
     (PROTOCOL = TCP)
     (HOST = localhost)
     (PORT = 1521)
  )
   (CONNECT_DATA = (SID = dbprueba))
   )";

$odbc = ocilogon ('progra_1', 'progra_1', $db) or die( "Could not connect to Oracle database!") or die (ocierror());

$sql = "SELECT FOTO_DESPUES FROM MASCOTA WHERE MASCOTA_ID =". (int) $_GET['id'];  
$stid = ociparse($odbc, $sql);

ociexecute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
$nrows = oci_num_rows($stid);

/*if ($nrows==0) {
    $im = imagecreatefrompng("Imagenes\No_disponible.png");
    header('Content-Type: image/png');
    imagepng($im);
    imagedestroy($im);
    exit;
}*/
if ($row == NULL) {
     $im = imagecreatefrompng("Imagenes\No_disponible.png");
    header('Content-Type: image/png');
    imagepng($im);
    imagedestroy($im);
} else {
    $img = $row['FOTO_DESPUES']->load();
    header("Content-type: image/png");
    print $img;
}

?>