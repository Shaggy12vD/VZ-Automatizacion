<!DOCTYPE HTML>
<HTML>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="Style.css">
		<title>Citas</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <script src="xlsx.full.min.js"></script>
        <script src="FileSaver.min.js"></script>
        <script src="tableexport.min.js"></script>
	</head>
	<body>
		
		<div>
        <nav>
				<div class="menu">
						<a class="a1" href="index.php">VZ Automatizacion</a>
				</div>
				<ul class="nav-links">
					<li><a href="index.php">Inicio</a></li>
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
						echo '<a class="login" href="salir.php"> <img src="/Vistas/Imagenes/LogIn.jpg" alt="Log In"><h1 class="txtlg">Salir</h1></a>';
					};
					?>
				<div class="burger">
					<div class="line1"></div>
					<div class="line2"></div>
					<div class="line3"></div>
				</div>
			</nav>
			<script src="app.js"></script>
		</div>
	</body>
    <footer>
        <?php
            $user = "root";
            $pass = "";
            $host = "localhost";
            
            //conetamos al base datos
            $conexion = mysqli_connect($host, $user, $pass);

            mysqli_select_db ($conexion, "vzautomatizacion");
            
            $sql = "SELECT * FROM citas";
            
            $resultado = mysqli_query ($conexion, $sql) or die (mysql_error ());
            
            $datos = array();
            
            while( $rows = mysqli_fetch_assoc($resultado) ) {
            
            $datos[] = $rows;
            
            }
            
            mysqli_close($conexion);

        ?>
        
		<div>
         
			<h2 class="texttable">Lista de citas</h2>
            <!----
            <FORM onSubmit="return findInPage(this.busquedamusica.value);">
            <script src="buscar.js"></script>
                <label class="buscar" for="busqueda">Buscar:</label>
                <input onChange="n = 0;" class="inputbusquda" type="search" name="busqueda" placeholder="Correo o Celular">
                <INPUT TYPE="submit" NAME="busquedabtn" class="inputbuscar" value="">
            </FORM>
            
            ---->

            <table border="1" id="tabla" class="table table-striped table-bordered">
                <tr>

                <th>Id</th>

                <th>Nombre</th>

                <th>Apellido</th>

                <th>Celular</th>

                <th>Correo</th>

                <th>Asunto</th>

                <th>Fecha</th>

                <th>Hora</th>

                <th>Confirmado</th>
                </tr>

                <tbody>

                <?php foreach($datos as $datos) { ?>

                <tr>

                <td><?php echo $datos ['id_citas']; ?></td>

                <td><?php echo $datos ['nombre']; ?></td>

                <td><?php echo $datos ['apellido']; ?></td>

                <td><?php echo $datos['celular']; ?></td>

                <td><?php echo $datos['correo']; ?></td>

                <td><?php echo $datos['asunto']; ?></td>

                <td><?php echo $datos['fecha']; ?></td>

                <td><?php echo $datos['hora']; ?></td>

                <td>-</td>

                </tr>

                <?php } ?>

                </tbody>

            </table>
                <button id="btnExportar" type="submit" value="Export to excel" class="btn-export">Exportar a Excel</button>
        </div>
            
            <script src="ExportToExcel.js"></script>
    </footer>

    
