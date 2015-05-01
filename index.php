<?php
include 'Globales.php';
//Función que crear el modal con la información de cada mascota
function crearModalMascota($mascota_id){
    include_once('Consulta.php');
    $consul= new Consulta();
    $nombre= $consul->getNombre($mascota_id);
    $tipo= $consul->getTipo($mascota_id);
    $raza= $consul->getRaza($mascota_id);
    $color= $consul->getColor($mascota_id);
    $severidad= $consul->getColor($mascota_id);
    $tamaño= $consul->getTamaño($mascota_id);
    $entrenamiento= $consul->getEntrenamiento($mascota_id);
    $nivelEnergia= $consul->getEnergia($mascota_id);
    $rescatista= $consul->getRescatista($mascota_id);
    $veterinario= $consul->getVeterinario($mascota_id);
    $espacio= $consul->getEntrenamiento($mascota_id);
    $Enfermedad= $consul->getEnfermedad($mascota_id);
    print "<div id=\"Mascota$mascota_id\" class=\"modal fade\" >
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" arial-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <h4 class=\"modal-title\" id=\"myModalLabel\">$nombre</h4>
                        </div>
                        <div class=\"modal-body\">
                            <div class=\"row\">
                                <div class=\"col-sm-1\"></div>
                                <div class=\"col-xs-5 col-md-5\">
                                    <div class=\"thumbnail\">
                                        <img src=\"http://localhost/Adopciones/FotoDespues.php?id=$mascota_id\">
                                    </div>
                                </div>
                                
                            </div>
                            <div class=\"row\">
                                <div class=\"col-sm-5\">
                                    <table class=\"table\">
                                        <tr>
                                            <td align=\"right\">
                                                Nombre:
                                            </td>
                                            <td>
                                                $nombre
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align=\"right\">
                                                Raza:
                                            </td>
                                            <td>
                                                $raza
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align=\"right\">
                                                Severidad:
                                            </td>
                                            <td>
                                                $severidad
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align=\"right\">
                                                Entrenamiento:
                                            </td>
                                            <td>
                                                $entrenamiento
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align=\"right\">
                                                Rescatista:
                                            </td>
                                            <td>
                                                $rescatista
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align=\"right\">
                                                Espacio:
                                            </td>
                                            <td>
                                                $espacio
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class=\"col-sm-5\">
                                    <table class=\"table\">
                                        <tr>
                                            <td align=\"right\">
                                                Tipo:
                                            </td>
                                            <td>
                                                $tipo
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align=\"right\">
                                                Color:
                                            </td>
                                            <td>
                                                $color
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align=\"right\">
                                                Tamaño:
                                            </td>
                                            <td>
                                                $tamaño
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align=\"right\">
                                                Nivel de Energía:
                                            </td>
                                            <td>
                                                $nivelEnergia
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align=\"right\">
                                                Veterinario:
                                            </td>
                                            <td>
                                                $veterinario
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align=\"right\">
                                                Enfermedad:
                                            </td>
                                            <td>
                                                $Enfermedad
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class=\"modal-footer\">
                          <a href = \"Formulario.php\"> <button class=\"btn btn-primary\"> Completar Formulario</button></a>
                        </div>
                      </div>
                    </div>
                  </div>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Buscando mi hogar</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/mainPage.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="javascript/carousel.js"></script>
    <script src="javascript/jquery.js" type="text/javascript"></script>
  </head>

  <body>
      <?php
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
                    <a class=\"navbar-brand\" href=\"#\">Buscando mi hogar</a>
                    <ul class=\"nav navbar-nav\">
                      <li class=\"active\"><a href=\"#\">Inicio</a></li>";
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
        else{
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
                    <p class = \"nav navbar-nav\"> \"   \"</p>
                    <a class=\"navbar-brand\" href=\"#\">Buscando mi hogar</a>
                    <ul class=\"nav navbar-nav\">
                      <li class=\"active\"><a href=\"#\">Inicio</a></li>
                      <li><a href=\"#registro\">Registrarse</a></li>
                    </ul>
                    <form class=\"navbar-form navbar-right\" method=\"POST\" action=\"login.php\">
                      <div class=\"form-group\">
                        <input type=\"text\" placeholder=\"Usuario\" class=\"form-control\" name = \"usuario\" required autofocus>
                      </div>
                      <div class=\"form-group\">
                        <input type=\"password\" placeholder=\"Contraseña\" class=\"form-control\" name = \"contrasena\" required>
                      </div>
                      <button type=\"submit\" class=\"btn btn-success\">Ingresar</button>
                    </form>
                  </div> <!-- fin div navbar-header --> 
                </div><!-- /.container -->
              </nav><!-- /.navbar -->";
        }
      ?>
   
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">

          <div class="col-xs-12 col-sm-9">
              <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
              </p>
              <div class="jumbotron">
                <h1>Bienvenido!</h1>
                <p>Esta es la página oficial de lucha animal.</p>
              </div>
              
            </div> <!-- end div col-xs-12 col-sm-9 -->
            
        </div> <!--/.row row-offcanvas row-offcanvas-right-->
        <hr>
    </div>
    
    <!-- Código para colocar mascotas no adoptadas por más de n meses-->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-11" style="color:#424242"><h1>&nbsp;Explora nuestras mascotas..................................</div>
    </div>
    <div class="row"><br></div>
    <?php
    include_once('Consulta.php');
    $consul= new Consulta();
    $mascotasArray=$consul->getNoAdoptados(2);
    $contadorMascotas=0;
    if(isset($_GET['cont'])){
        $indMascota= $_GET['cont'];
    }
    else{
        $indMascota=0;   
    }
    
    for($indMascota;$indMascota<count($mascotasArray);$indMascota++){
        if($contadorMascotas == 0){
            print "<div class=\"row\"><div class=\"col-sm-1\"></div>";
        }
        //Si llega al final de la fila de thumbnails
        if(is_int($contadorMascotas/5) && $contadorMascotas!=0 && $contadorMascotas<20){
            print "</div><div class=\"row\"><div class=\"col-sm-1\"></div>";
        }
        //Si se muestra el máximo de mascotas por página
        if($contadorMascotas == 20){
            print "</div>";
            break;   
        }else{
            $mascota= $mascotasArray[$indMascota];
            print "<div class=\"col-xs-2 col-md-2\">
                <a href=\"#Mascota$mascota->mascota_ID\" data-toggle=\"modal\" class=\"thumbnail\" title=\"Nombre: $mascota->nombre&#13;Tipo: Perro&#13;Raza: Común\">
                    <img src=\"http://localhost/Adopciones/FotoDespues.php?id=$mascota->mascota_ID\">
                </a>
                </div>";
            $contadorMascotas++;
        }
    }
    print "</div>";
    //Coloca paginación
    print "<div class=\"row\">
                    <div class=\"col-sm-1\"></div>
                    <div class=\"col-sm-8\">
                        <nav>
                        <ul class=\"pagination\">
                          <li>";
                          if($indMascota>20){
                              $anterior= $indMascota -($contadorMascotas+20);
                              print "<a href=\"http://localhost/Adopciones/index.php?cont=$anterior\" aria-label=\"Previous\">";
                          }
                            
                              print"<span aria-hidden=\"true\">&laquo;</span>
                            </a>
                          </li>
                          <li><a href=\"http://localhost/Adopciones/index.php?cont=0\">1</a></li>
                          <li><a href=\"#\">2</a></li>
                          <li><a href=\"#\">3</a></li>
                          <li><a href=\"#\">4</a></li>
                          <li><a href=\"#\">5</a></li>
                          <li>";
                            if($contadorMascotas>=20){
                                print "<a href=\"http://localhost/Adopciones/index.php?cont=$indMascota\" aria-label=\"Next\">";
                            }
                            else{
                                print "<a href=\"#\" aria-label=\"Next\">";
                            }
                            print"<span aria-hidden=\"true\">&raquo;</span>
                            </a>
                          </li>
                          </ul>
                    </nav>                    
                    </div>
                    </div>
                   ";
    if(isset($_GET['cont'])){
        $indMascota= $_GET['cont'];
    }
    else{
        $indMascota=0;   
    }
    for($indMascota;$indMascota<count($mascotasArray);$indMascota++){
        $mascota= $mascotasArray[$indMascota];
        CrearModalMascota($mascota->mascota_ID);
    }
    ?>
    
    <script type="text/javascript">
        function siguienteMascota(contMascotas){
            window.open("http://localhost/Adopciones/index.php?cont="+contMascotas,"_self");
        }
    </script>
    
    <hr>
    
    <div class="row">
        <div class="col-sm-1"></div>
            <div class="col-sm-11">    
                <p>SIGUENOS: </p><a href="#"><img class="small_img" src="Imagenes/facebook.png" /></a> <img class="small_img" src="Imagenes/twitter-bird.png"> <img class="small_img" src="Imagenes/skype.png">
            <div>
                <p>CONTACTENOS: T: (+506)12 34 56 78</p>
            </div>
            <div>
                <p>&copy; Company 2015</p>  
            </div>
        </div>
    </div>
    
    


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