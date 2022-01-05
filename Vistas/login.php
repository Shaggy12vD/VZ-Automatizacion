<?php 
    session_start();
    $user = "admin";
    $pass = "vz123";
    $host = "localhost";
    $datab = "vzautomatizacion";

    //conetamos al base datos
    $connection = mysqli_connect($host, $user, $pass,$datab);

    $username = $_POST['userr'];
	$password = $_POST['passs'];
		
	$q ="SELECT COUNT(*) as contar from usuarios where nombre = '$username' and contraseña = '$password'";
    $consulta = mysqli_query($connection,$q);
    $array = mysqli_fetch_array($consulta);

    if($array['contar']>0){
        $_SESSION['username'] = $username;
        echo '<script language="javascript">';
		echo 'alert("Datos correctos")';
		echo '</script>';
        echo "<script class='logged-in'>location.href='index.php';</script>";
    }else{
        echo '<script language="javascript">';
		echo 'alert("Datos incorrectos")';
		echo '</script>';
        echo "<script class='logged-in'>location.href='InicioSesion.php';</script>";
    }
 ?>