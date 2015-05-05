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

    <title>Eliminar de Catalogo</title>

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
                      <li><a href=\"AgregarCatalogo.php\">Inicio</a></li>";
                      setGlobalPersona_ID($usuario);
                      print "<li><a href=\"AgregarCatalogo.php\">Agregar Catalogo</a></li>
                          <li><a href=\"ModificarCatalogo.php\">Modificar Catalogo</a></li>
                          <li class=\"active\"><a href=\"EliminarCatalogo.php\">Eliminar Catalogo</a></li>
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
      
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    
    <script>
        $('.selectpicker').selectpicker({
            style: 'btn-info',
            size: 4
        });
    </script>
    
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-6">
            <h2>Eliminar de Catalogo</h2>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-8">
            <!-- Search box Start -->
             <?php print "<form role=\"form\" method=\"post\" enctype=\"multipart/form-data\""; $id=$GLOBALS['Persona_ID']; print " action=\"\"  method=\"POST\">";?>
                <label for="dropdownMenu1">Catalogo:</label>
                  <select id="puntaje" name="puntaje">
                    <option value="Canton">Canton</option>
                    <option value="Color">Color</option>
                    <option value="Distrito">Distrito</option>
                    <option value="Enfermedad">Enfermedad</option>
                    <option value="Entrenamiento">Entrenamiento</option>
                    <option value="Espacio">Espacio</option>
                    <option value="Estado">Estado</option>
                    <option value="Medicamento">Medicamento</option>
                    <option value="Motivo">Motivo</option>
                    <option value="Nivel_Energia">Nivel de Energia</option>
                    <option value="Pais">Pais</option>
                    <option value="Provincia">Provincia</option>
                    <option value="Raza">Raza</option>
                    <option value="Severidad">Severidad</option>
                    <option value="Tamano">Tamaño</option>
                    <option value="Tipo">Tipo de mascota</option>
                    <option value="Tratamiento">Tratamiento</option>
                  </select>
                <div class="form-group">
                  
                </div>
                <label for="dropdownMenu1">Seleccione el dato que quiere eliminar:</label>
                  <select id="puntaje" name="puntaje">
                    <option value="Canton">San Jose</option>
                    <option value="Color">Escazu</option>
                    <option value="Distrito">Desamparados</option>
                    <option value="Enfermedad">Puriscal</option>
                    <option value="Entrenamiento">Tarrazu</option>
                    <option value="Espacio">Asseri</option>
                    <option value="Estado">Mora</option>
                    <option value="Medicamento">Goicochea</option>
                    <option value="Motivo">Santa Ana</option>
                    <option value="Nivel_Energia">Alajuelita</option>
                    <option value="Pais">Vazquez de Coronado</option>
                    <option value="Provincia">Acosta</option>
                    <option value="Raza">Acosta</option>
                    <option value="Severidad">Tibas</option>
                    <option value="Tamano">Moravia</option>
                    <option value="Tipo">Montes de Oca</option>
                    <option value="Tratamiento">Turrubares</option>
                  </select>
                                
                <div class="row">&nbsp;</div>
                <div class="form-group">
                    <div class="col-lg-5">
                      <input type="submit" value="Eliminar" class = "btn btn-primary" name="submit">
                   </div>																									<!-- para que pueda ser procesada y enviada a la base de datos-->				
                </div>
                
            </form>
        </div>
    </div>
    
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