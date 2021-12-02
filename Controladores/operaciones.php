<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$numero=$_POST['numero'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$asunto=$_POST['asunto'];

//verificamos la conexion a base datos
if(!$connection) 
        {
            echo '<script language="javascript">';
            echo 'alert("No se a podido conectar con el servidor")';
            echo '</script>';
        }
  else
        {
            echo '<script language="javascript">';
            echo 'alert("Conexion exitosa")';
            echo '</script>';
        }
        //indicamos el nombre de la base datos
        $datab = "vzautomatizacion";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
            echo '<script language="javascript">';
            echo 'alert("No se encontro la tabla")';
            echo '</script>';
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Se encontro la tabla")';
            echo '</script>';
        }
        //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        $instruccion_SQL = "INSERT INTO citas VALUES (null,'$fname','$lname', '$numero', '$email', '$asunto', '$fecha', '$hora')";
        
        echo '<script language="javascript">';
        echo 'alert("Datos enviados")';
        echo '</script>';

        $resultado = mysqli_query($connection,$instruccion_SQL);
        mysqli_close( $connection );

        
        /*
        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM citas";
        
        $result = mysqli_query($connection,$consulta);
        if(!$result) 
        {
            echo "No se ha podido realizar la consulta";
        }
        echo "<table>";
        echo "<tr>";
        echo "<th><h1>id_citas</th></h1>";
        echo "<th><h1>nombre</th></h1>";
        echo "<th><h1>apellido</th></h1>";
        echo "<th><h1>celular</th></h1>";
        echo "</tr>";

        while ($colum = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td><h2>" . $colum['id_citas']. "</td></h2>";
            echo "<td><h2>" . $colum['nombre']. "</td></h2>";
            echo "<td><h2>" . $colum['apellido'] . "</td></h2>";
            echo "<td><h2>" . $colum['celular'] . "</td></h2>";
            echo "</tr>";
        }
        echo "</table>";

        mysqli_close( $connection );

        //echo "Fuera " ;
        echo'<a href="citas.html"> Volver Atrás</a>';
        */

