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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/mainPage.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="javascript/carousel.js"></script>
    <script src="javascript/jquery.js" type="text/javascript"></script>
    <script type="text/javascript">
    stepcarousel.setup({
      galleryid: 'carousel', //id of carousel DIV
      beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
      panelclass: 'panel', //class of panel DIVs each holding content
      autostep: {enable:true, moveby:1, pause:3000},
      panelbehavior: {speed:500, wraparound:true, persist:true},
      statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
      contenttype: ['external'] //content setting ['inline'] or ['external', 'path_to_external_file']
    })
  </script>
  <style type="text/css">
    /* Carousel */
    
    #carousel {
      position: relative; /* Necesario */
      overflow: hidden; /* Necesario */
      height: 250px;
      margin-left:35px;
      background:#5B5B5B url(Imagenes/carousel-bg.png) bottom left repeat-x;
    }

    #carousel .belt {
      position: absolute; /* Necesario */
      left: 0;
      top: 0;
      margin:0 10px 10px 0;
    }

    #carousel .panel {
      width:265px;
      float: left; /* Necesario */
      overflow: hidden;
      margin: 15px;
      padding:7px;
      border:1px solid #5B5B5B;
      background:#383838 url(Imagenes/carousel-panel-bg.png) bottom left repeat-x;
    }

    #carousel .panel .panel-text {
      padding-top:5px;
      font-size:13px;
      font-family:Verdana, Geneva, sans-serif;
      color:#FFF;
    }

    #carousel .panel .panel-text a {
      color:#CCC;
      text-decoration:none;
    }

    #carousel .panel .panel-text a:hover {
      color:#FFF;
      text-decoration:underline;
    }

          /* Botones del carousel */
          
    .button-prev {
      height:250px;
      width:35px;
      float:left;
      background:#5B5B5B url(Imagenes/carousel-bg.png) bottom left repeat-x;
      -moz-border-radius:10px 0 0 10px;
    }

    .button-prev a {
      display:block;
      padding:5px;
      margin-top:105px;
    }

    .button-next {
      height:250px;
      width:35px;
      float:right;
      background:#5B5B5B url(Imagenes/carousel-bg.png) bottom left repeat-x;
      -moz-border-radius:0 10px 10px 0;
    }

    .button-next a {
      display:block;
      padding:5px;
      margin-top:105px;
    }


    a img {
      border:none;
    }
  </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img class = "nav navbar-nav"src = "Imagenes/logo.png" height="42" width="42"/>
          <p class = "nav navbar-nav"> "   "</p>
          <a class="navbar-brand" href="#">Buscando mi hogar</a>
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Inicio</a></li>
            <li><a href="#registro">Registrarse</a></li>
          </ul>
          <form class="navbar-form navbar-right" method="POST" action="login.php">
            <div class="form-group">
              <input type="text" placeholder="Usuario" class="form-control" name = "usuario" required autofocus>
            </div>
            <div class="form-group">
              <input type="password" placeholder="Contraseña" class="form-control" name = "contrasena" required>
            </div>
            <button type="submit" class="btn btn-success">Ingresar</button>
          </form>
        </div> <!-- fin div navbar-header --> 
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
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
              <div class = "row">
                <div class="button-next">
            <a href="javascript:stepcarousel.stepBy('carousel', 1)"><img src="Imagenes/arrow_right.png" /></a>
          </div>

          <div class="button-prev">
            <a href="javascript:stepcarousel.stepBy('carousel', -1)"><img src="Imagenes/arrow_left.png" /></a>
          </div>

          <div id="carousel" class="stepcarousel">
        
            <div class="belt">
      
              <div class="panel">
                <img src="Imagenes/animales_8.jpg" />
                <div class="panel-text">
                  <p></p>
                </div>
              </div>
        
              <div class="panel">
                <img src="Imagenes/animales_1.jpg" />
                <div class="panel-text">
                  <p></p>
                </div>
              </div>
        
              <div class="panel">
                <img src="Imagenes/animales_2.jpg" />
                <div class="panel-text">
                  <p></p>
                </div>
              </div>
        
              <div class="panel">
                <img src="Imagenes/animales_3.jpg" />
                <div class="panel-text">
                  <p></p>
                </div>
              </div>
        
              <div class="panel">
                <img src="Imagenes/animales_4.jpg" />
                <div class="panel-text">
                  <p></p>
                </div>
              </div>
        
              <div class="panel">
                <img src="Imagenes/animales_5.jpg" />
                <div class="panel-text">
                  <p></p>
                </div>
              </div>
        
              <div class="panel">
                <img src="Imagenes/animales_6.jpg" />
                <div class="panel-text">
                  <p></p>
                </div>
              </div>
        
              <div class="panel">
                <img src="Imagenes/animales_7.jpg" />
                <div class="panel-text">
                  <p></p>
                </div>
              </div>
          
            </div> <!--- end div belt -->
          </div>  <!-- end div carousel -->
        </div> <!-- fin row -->
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
        if(is_int($contadorMascotas/5) && $contadorMascotas!=0){
            print "</div><div class=\"row\"><div class=\"col-sm-1\"></div>";
        }
        //Si se muestra el máximo de mascotas por página
        if($contadorMascotas == 20){
            print "<div class=\"row\">
                    <div class=\"col-sm-3\"><\div>
                    <div class=\"col-sm-2\">
                        <button type=\"button\" class=\"btn btn-default btn-lg\" onclick=\"siguienteMascota($contadorMascotas)\">
                            <span class=\"glyphicon glyphicon-arrow-right\" aria-hidden=\"true\"></span> Siguiente
                        </button>
                    </div>
                    </div>
                   ";
            break;   
        }else{
            $mascota= $mascotasArray[$indMascota];
            print "<div class=\"col-xs-2 col-md-2\">
                <a href=\"#\" class=\"thumbnail\" title=\"Nombre: $mascota->nombre&#13;Tipo: Perro&#13;Raza: Común\">
                    <img src=\"http://localhost/Adopciones/FotoDespues.php?id=$mascota->mascota_ID\">
                </a>
                </div>";
            $contadorMascotas++;
        }
    }
    print "</div>";
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