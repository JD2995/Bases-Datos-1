<?php
    function getConnection(){
        include_once('index.php');
        return $GLOBALS['conn'];
    }
?>

<?php
	ini_set('session.use_cookies', 1);
	ini_set('session.use_only_cookies', 1);
	session_start();
	$usuario = $_POST["usuario"];       //Obtiene el nombre de usuario del cuadro de texto
	$contrasena = $_POST["contrasena"]; //Obtiene la contraseña del cuadro de texto
        
        $conn= getConnection();
        //Validación de usuario y contraseña
        $stid= oci_parse($conn,"begin :valLogin:= PAQUETE_LOGIN.VALIDAR_LOGIN(:usuario,:contrasena);end;");
        $valLogin;
        
        oci_bind_by_name($stid, ":valLogin", $valLogin);
        oci_bind_by_name($stid, ":usuario", $usuario);
        oci_bind_by_name($stid, ':contrasena', $contrasena);
        
        oci_execute($stid);
	if($valLogin == 1){
            $_SESSION["usuario"] = $usuario;
            setGlobalPersona_ID($usuario);
		    ?>
		    	<!DOCTYPE html>
		    	 	<html>
		    	 		<title>Inicio</title>
					  	<head lang="en">
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
					    
						<script type="text/javascript">
						function cargarModal(){
							$(document).ready(function(){
								$("#myModal").modal('show');
							});	
						}
						</script>
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
					          <a class="navbar-brand" href="#">Buscando mi hogar</a>
					          <ul class="nav navbar-nav">
					            <li class="active"><a href="#">Inicio</a></li>
					            <li><a href="#about">Acerca de</a></li>
					            <li><a href="#registro">Registrarse</a></li>
					          </ul>
					          <form class="navbar-form navbar-right" method="POST" action="salir.php">
					            <small class = "btn btn-success"><?php echo $usuario;?> <small>   </small></small>
					            <button type="submit" class="btn btn-success">Cerrar Sesion</button>
					          </form>
					          <button class = "btn btn-primary"><a href="perfil.php" style = "color:white;float: right;">Mi perfil</a></button>
					          
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
					          			<table class = 'table'>
					          				<tr>
					          					<td>
					          					    <button type="button" onclick="cargarModal()"><img src="Imagenes/animales_8.jpg" /></button>
													<div class="modal fade" id="myModal">
													  <div class="modal-dialog">
													    <div class="modal-content">
													      <div class="modal-header">
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													        <h4 class="modal-title" id="myModalLabel">Nombre de la mascota</h4>
													      </div>
													      <div class="modal-body">
													      	<img src="Imagenes/animales_8.jpg" />
													        <table class="table">
													        	<tr>
													        		<td>
													        			Nombre:
													        		</td>
													        		<td>
													        			Nombre de la mascota
													        		</td>
													        	</tr>
													        	<tr>
													        		<td>
													        			Peso:
													        		</td>
													        		<td>
													        			Peso de la mascota
													        		</td>
													        	</tr>
													        	<tr>
													        		<td>
													        			Rescatista:
													        		</td>
													        		<td>
													        			Nombre del rescatista
													        		</td>
													        	</tr>
													        </table>
													      </div>
													      <div class="modal-footer">
													        <a href = "Formulario.php"> <button class="btn btn-primary"> Completar Formulario</button></a>
													      </div>
													    </div>
													  </div>
													</div>
					          					</td>
					          					<td>
					          						<img src="Imagenes/animales_7.jpg" />
					          					</td>
					          					<td>
					          						<img src="Imagenes/animales_6.jpg" />
					          					</td>
					          				</tr>
					          				<tr>
					          					<td>
					          						<img src="Imagenes/animales_5.jpg" />
					          					</td>
					          					<td>
					          						<img src="Imagenes/animales_4.jpg" />
					          					</td>
					          					<td>
					          						<img src="Imagenes/animales_3.jpg" />
					          					</td>
					          				</tr>
					          				<tr>
												<td>
					          						<img src="Imagenes/animales_2.jpg" />
					          					</td>
					          					<td>
					          						<img src="Imagenes/animales_1.jpg" />
					          					</td>			          					
					          				</tr>
					          			</table>
					          		</div> <!-- fin row -->
					          	</div> <!-- end div col-xs-12 col-sm-9 -->
					          	<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
					          		<div class="list-group">
								        <a href="#" class="list-group-item active">Ver mascotas</a>
								        <a href="#" class="list-group-item">Registro de Adopción</a>
								        <a href="#" class="list-group-item">Formulario de adoptante</a>
					          		</div>
					        	</div><!--/.sidebar-offcanvas-->
					        </div> <!--/.row row-offcanvas row-offcanvas-right-->
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
				
			<?php
	}
	else{
		//header("Location: index.php");
	}
?>