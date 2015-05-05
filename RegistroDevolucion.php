<!--Para correr el php se necesita dar la id de la mascota, por ejemplo
"RegistroDevolucion.php?mascota_ID=1-->
<?php
	require_once("funcionesGenerales.php");
	
?>
<!DOCTYPE html>
 	<html>
 		<title>Registro de devolucion</title>
	  		<head lang="en">
			    <meta charset="utf-8">
			    <meta http-equiv="X-UA-Compatible" content="IE=edge">
			    <meta name="viewport" content="width=device-width, initial-scale=1">
			    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
			    <meta name="description" content="">
			    <meta name="author" content="">
			    <link rel="icon" href="../../favicon.ico">

			    <!-- Bootstrap core CSS -->
			    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
			    <!-- Custom styles for this template -->
			    <link href="css/mainPage.css" rel="stylesheet">
			    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
			    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
			    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
	  		</head>
	  		<body>
			    <?php
                            include "Globales.php";
                              //Observa si existe una sesión iniciada
                              if(session_start() && isset($_SESSION['usuario'])){
                                  $usuario= $_SESSION['usuario'];
                                  print "<nav class=\"navbar navbar-fixed-top navbar-inverse\">
                                      <div class=\"container\">
                                        <div class=\"navbar-header\">
                                          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
                                            <span class=\"sr-only\">Toggle navigation</span>
                                            <span class=\"icon-bar\"></span>
                                            <span class=\"icon-bar\"></span>
                                            <span class=\"icon-bar\"></span>
                                          </button>
                                          <img class = \"nav navbar-nav\"src = \"Imagenes/logo.png\" height=\"42\" width=\"42\"/>
                                          <a class=\"navbar-brand\" href=\"index.php\">Buscando mi hogar</a>
                                          <ul class=\"nav navbar-nav\">
                                            <li><a href=\"index.php\">Inicio</a></li>";
                                            setGlobalPersona_ID($usuario);
                                            if(validarRescatista($GLOBALS['Persona_ID'])=='0'){
                                                print "<li><a href=\"#\">Ingresar Mascota</a></li>";
                                            }
                                            print "<li><a href=\"Adopciones.php\">Adopciones</a></li>
                                                <li>
                                                  <div class=\"btn-group\">
                                                      <button type=\"button\" class=\"btn btn-default dropdown-toggle\"
                                                              data-toggle=\"dropdown\" style=\"margin-top:9px;background:#2E2E2E;color:#F2F2F2;border:none;\">
                                                        Consulta <span class=\"caret\"></span>
                                                      </button>
                                                      <ul class=\"dropdown-menu\" role=\"menu\">
                                                        <li><a href=\"#\">Persona</a></li>
                                                        <li><a href=\"#\">Mascota</a></li>
                                                        <li><a href=\"#\">Estadisticas</a></li>
                                                      </ul>
                                                  </div>	
                                              </li>
                                                <li><a href=\"#about\">Acerca de</a></li>
                                          </ul>
                                          <form class=\"navbar-form navbar-right\" method=\"POST\" action=\"salir.php\">
                                            <small class = \"btn btn-success\">$usuario<small>   </small></small>
                                            <button type=\"submit\" class=\"btn btn-success\">Cerrar Sesion</button>
                                            <button class = \"btn btn-primary\"><a href=\"perfil.php\" style = \"color:white;float: right;\">Mi perfil</a></button>
                                          </form>


                                        </div> <!-- fin div navbar-header --> 
                                      </div><!-- /.container -->
                                    </nav><!-- /.navbar -->";
                              }
                            ?>

			    <div class="container">
			    	<div class="row row-offcanvas row-offcanvas-right">
			        </div><!--/.sidebar-offcanvas-->
			    </div> <!--/.row row-offcanvas row-offcanvas-right-->
                                
                            <div class="container">
	<div class="page-header">
       <center><h2>Devolver una mascota</h2></center>
    </div>
 </div>
                                <BR>
<BR>
      <BR>
<BR>
      <BR>
<BR>
      
    <div
    class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <?php $id=$GLOBALS['Persona_ID']; $mascota=$_GET['mascota_ID']; print "<form role=\"form\" method=\"post\" enctype=\"multipart/form-data\" action=\"enviarDevolucion.php?idPersona=$id&mascota_ID=$mascota\">";?>        
          <div class="form-group">
<label class="col-lg-2 control-label">Motivo de devolución: </label>
<div class="col-lg-10">
<select class="form-control" name= "motivo">

<?php
$conexion= $GLOBALS['conn'];
$resultado;
$statement = oci_parse($conexion, "begin :ret :=paquete_mostrar.mostrarMotivos(); end;");
oci_bind_by_name($statement, ':ret', $resultado, 1000);
oci_execute($statement);				// Tambien el catalogo de enfermedades se muestra en la aplicacion
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
            echo "<option value = ".$i.">";	// datos que se encuentren en la BD	
            echo "<label>".$enfermedadSeparado[0]."</label>";
            echo "</option>";
        }	
      
}
?>
</select>
</div>
<BR>
<BR>
          </div>
             
<center><button type="submit" class="btn btn-default">Realizar devolución</button<center>
 </div> 
</form>
        <BR>
<BR>
      <BR>
<BR>
      <BR>
<BR>
      <BR>
<BR>
      <BR>

     <!--/.container-->
          <!-- <div class="row">
            <div class="panel panel-default">
              < Default panel contents >
              <div class="panel-heading">Mascotas</div>
              <div class="panel-body">
                <p>Esta es la lista de mascotas disponibles para adopción</p>
             

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="offcanvas.js"></script>
       
  </body>
</html>



 <div class="container">

			    	
			        <footer>
					    <div>
			                <p>SIGUENOS: </p><a href="#"><img src="Imagenes/facebook.png" /></a> <img  src="Imagenes/twitter-bird.png"> <img src="Imagenes/skype.png">
			            </div>
			            <div>
			                <p>CONTACTENOS: T: (+506)12 34 56 78</p>
			            </div>
			            <div>
			            	<p>&copy; Company 2015</p>	
			            </div>
			      	</footer>

			    </div><!--/.container-->
			    <!-- Bootstrap core JavaScript
			    ================================================== -->
			    <!-- Placed at the end of the document so the pages load faster -->
			    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
			    <script src="../../dist/js/bootstrap.min.js"></script>
			    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
			    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

			    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

			    <script src="offcanvas.js"></script>
			  </body>
			</html>

				