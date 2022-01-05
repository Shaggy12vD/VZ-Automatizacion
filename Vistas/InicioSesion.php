<!DOCTYPE HTML>
<HTML>
	<head>
		<link rel="stylesheet" href="Style.css">
		<title>Inicio</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@1,800&display=swap" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<style>
	</style>
	<header>
	
	</header>

    <body>
		<div >
			
			<!--Navegacion-->
			<nav>
				<div class="menu">
						<a class="a1" href="index.php">VZ Automatizacion</a>
				</div>
				<ul class="nav-links">
					<li><a href="index.php"><h1 class="txtlg">Inicio</h1></a></li>
					<li><a href="productos_y_servicios.php">Productos y Servicios</a></li>
					<li><a href="nosotros.php">Nosotros</a></li>
					<li><a href="citas.php">Citas</a></li>
					<?php
					session_start();
					if(isset($_SESSION['username'])){
						echo '<li><a href="ObtenerDatos.php">Consulta</a></li>';
					};
					?>
					<li><a href="contacto.php">Contacto</a></li>
				</ul>
				<a class="login" href="InicioSesion.php"> <img src="/Vistas/Imagenes/LogIn.jpg" alt="Log In">
				<?php 
				$nombre = 'Log in';
				if(isset($_SESSION['username'])){
					$nombre = $_SESSION['username'];
				}
				echo "<h1 class='txtlg'>$nombre</h1>";
				?></a>
				<?php
					if(isset($_SESSION['username'])){
						echo '<a class="login" href="salir.php"> <img src="/Vistas/Imagenes/salir.jpg" alt="Log In"><h1 class="txtlg">Salir</h1></a>';
					};
					?>
				<div class="burger">
					<div class="line1"></div>
					<div class="line2"></div>
					<div class="line3"></div>
				</div>
			</nav>
			<script src="app.js"></script>
	</body>

	<footer>
		<div class="fadein">
			<form class="form" action="login.php" method="post">
					<fieldset class="field2">
						<header>
							<h2 class="headerform">Inicio de Sesion</h2>
						</header>
						<br>
						<label class="usuario" for="userr">Usuario:</label><br>
						<input required="required" class="inputcss2" type="text" id="userr" name="userr" placeholder="Usuario"><br><br>
						<label class="contraseña" for="passs">Contraseña:</label><br>
						<input required="required" class="inputcss2" type="password" id="passs" name="passs" placeholder="Contraseña"><br><br>
						<input class="boton2" type="submit" value="Acceder">
						
					</fieldset>
			</form>
		</div>
	</footer>
</html>