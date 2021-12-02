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