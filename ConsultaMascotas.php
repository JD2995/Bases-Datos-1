<!--Este documento es una plantilla general que puede ser usada en las demás paginas necesarias en el sitio web
lo unico que hay que hacer es agregarle el contenido al cuerpo de la pagina segun las funcionalidades que tenga esta-->
<!DOCTYPE html>
 	<html>
 		<title>Consultas</title>
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
			    <nav class="navbar navbar-fixed-top navbar-inverse">
			      <div class="container">
			        <div class="navbar-header">	
			          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			          </button>
			          <ul class="nav navbar-nav">
			          	<li><img src = "Imagenes/logo.jpg" style="width: 50px; height: 50px;" /></li>
			          	<li><p class = "nav navbar-nav"> "   "</p></li>
			          </ul>
			          <a class="navbar-brand" href="#">Buscando mi hogar</a>
			          <ul class="nav navbar-nav">
			            <li class="active"><a href="#">Inicio</a></li>
			            <li><a href="#about">Ingreso Mascota</a></li>
			            <li><a href="#registro">Adopciones</a></li>
			            <li>
			            	<div class="btn-group">
							  <button type="button" class="btn btn-default dropdown-toggle"
							          data-toggle="dropdown" style="margin-top:9px;background:#2E2E2E;color:#F2F2F2;border:none;">
							    Consulta <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
							    <li><a href="#">Persona</a></li>
							    <li><a href="#">Mascota</a></li>
							    <li><a href="#">Estadísticas</a></li>
							  </ul>
						    </div>	
			            </li>
			          </ul>
			          <form class="navbar-form navbar-right" method="POST" action="salir.php">
			            <small class = "btn btn-success"> Nombre Usuario <small>   </small></small>
			            <button type="submit" class="btn btn-success">Cerrar Sesion</button>
			            <button class = "btn btn-primary" style="margin-left:150px;"><a href="perfil.php" style = "color:white;">Mi perfil</a></button>
			          </form>
			        </div> <!-- fin div navbar-header --> 

			      </div><!-- /.container -->
			    </nav><!-- /.navbar -->
        <div
    class="container">
    <div class="row row-offcanvas row-offcanvas-right">
  <div class="form-group">
      <!--<label for etiqueta ="titulo">Registrate!</label>-->
 <div class="container">
    <div class="page-header">
       <center><h2>Consultas de Mascotas</h2></center>
    </div>
 </div>	    
   <html> 
  
</select>
   
   <form>
    <div class="form-group">
<label class="col-lg-2 control-label">Búsqueda por:</label>
<div class="col-lg-10">
<select class="form-control" id= "tipos" name = "tipos">
	<option value="Seleccione opcion">Seleccione opci&oacute;n</option>
        <BR>
	<?php
	$array = array("Nombre", "Tipo", "Raza", "Color", "Provincia", "Cantón", "Distrito");
        $res = count($array);
            for($i =0; $i<$res;$i++)
            {
                    echo "<option value = ".$array[$i].">";	
                    echo "<label>".$array[$i]."</label>";
            }	
    ?>
</select>
</div>
</div>

       
<form class="navbar-form navbar-left" role="search">
  <div class="form-group">
      <BR>
      <BR>
      <BR>
    <input type="text" class="form-control" id="buscar" placeholder="Palabra clave">
  </div>
  <button type="submit" class="btn btn-default">Buscar</button>
</form>
</div>
<!-- Search box End -->
    
    <table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Raza</th>
            <th>Color</th>
            <th>Provincia</th>
            <th>Cantón</th>
            <th>Distrito</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
    
    <tbody>
     <?php
     
     ?>
    </tbody>
  </table>
       
 
          
			    	
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

				