<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Insertar datos</title>

</head>

<body>

    <form action="conn.php" method="POST">

        <input type="text" name="temp" id="temp">
        <input type="text" name="hum" id="hum">
        <input type="text" name="hums" id="hums">

        <input type="submit" value="Añadir pendiente">

    </form>



    <div id="todolist">

        <?php

            $servidor = "localhost";

            $nombreusuario = "mroot";

            $password = "1234";

            $db = "pruebas";

        

            $conexion = new mysqli($servidor, $nombreusuario, $password, $db);

        

            if($conexion->connect_error){

                die("Conexión fallida: " . $conexion->connect_error);

            }



            if(isset($_POST['temp'])){

                $temp = $_POST['temp'];
                $hum  = $_POST['hum'];
                $hums = $_POST['hums'];
                

     $sql = "INSERT INTO datos(temp, hum, hums) values ('$temp','$hum','$hums')";

                                
                if($conexion->query($sql) === true){

                    echo '<div><form action=""><input type="checkbox">'.$texto.'</form></div>';

                }else{

                    die("Error al insertar dato: " . $conexion->error);

                }

                $conexion->close();

            }



        ?>

    </div>

</body>

</html>
