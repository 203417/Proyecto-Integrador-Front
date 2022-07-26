<!DOCTYPE html>

<html lang="es">

<head>
 <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #030339;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #151552;
}

.active {
  background-color: #6363c5;
}
body{

    box-sizing: border-box;

    background-color: #1c1c51;

    background-image:  linear-gradient(30deg, #472e99 12%, transparent 12.5%, transparent 87%, #472e99 87.5%, #472e99), linear-gradient(150deg, #472e99 12%, transparent 12.5%, transparent 87%, #472e99 87.5%, #472e99), linear-gradient(30deg, #472e99 12%, transparent 12.5%, transparent 87%, #472e99 87.5%, #472e99), linear-gradient(150deg, #472e99 12%, transparent 12.5%, transparent 87%, #472e99 87.5%, #472e99), linear-gradient(60deg, #472e9977 25%, transparent 25.5%, transparent 75%, #472e9977 75%, #472e9977), linear-gradient(60deg, #472e9977 25%, transparent 25.5%, transparent 75%, #472e9977 75%, #472e9977);

    background-size: 48px 84px;

    background-position: 0 0, 0 0, 24px 42px, 24px 42px, 0 0, 24px 42px;

}
tr.numeric{
text-align:center;
}
.table-bordered {
    margin:0 auto;
    border-collapse: separate;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(221, 221, 221);
    border-image: initial;
    border-radius: 4px;
}

.container{

    display: grid;

    grid-template-columns: 1fr 1fr 1fr;

    margin:10%;

    padding: 50px;

    color: aliceblue;

    font-size: 30px;

    text-decoration: double;

    background: #3B1C83;

    border-radius: 8px;

    box-shadow: 0 0 20px 0 rgba(230, 134, 235, 0.3);

}



.container .welcome, 

.container .alert {

    display: grid;

    grid-template-columns: 1fr;

    grid-column: 1/4;

    text-align: center;

    padding: 10px;

}



.container .alert{

    padding-top: 35px;

    font-size: 18px;

    text-decoration: underline;

}

tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}

.container .block{

    grid-column: 1/4;

}



.content{

    background: #49BBDD;

    margin: 5px;

    padding: 15px;

    text-align: center;

    border-radius: 8px;

}



.block{

    font-size: 15px;;

}



@media screen and (max-width: 800px) {

    .container .block{

        display: grid;

        grid-template-columns: 1fr;

        grid-template-rows: max-content max-content;

    }

}
</style>

  <title>Mostrar Registros de MySQL con PHP</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



	<!-- Latest compiled JavaScript -->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
<ul>
  <li><a class="active" href="index.php">Inicio</a></li>
  <li><a href="calculos.php">Calculos</a></li>
  <li style="float:right"><a href="/logout.php">Logout</a></li>
</ul>

<div class="container">

        <div class="welcome"><h1>Datos Obtenidos</h1></div>
<?php

$link = new PDO('mysql:host=localhost;dbname=pruebas', 'mroot', '1234');

?>
<div>
<table class="table-bordered">

		<thead>

		<tr class="numeric">

                        <th>id</th>

			<th>temperatura</th>

			<th>humedad</th>

			<th>humedad_suelo</th>

                        <th>nivel</th>

                        <th>fecha y hora</th>
		</tr>

		</thead>

<?php foreach ($link->query('SELECT * from datos') as $row){?>
 
<tr class="numeric">
        <td><?php echo $row['id'] ?></td>

	<td><?php echo $row['temp'] ?></td>

        <td><?php echo $row['hum'] ?></td>

        <td><?php echo $row['hums'] ?></td>

        <td><?php echo $row['nivel'] ?></td>

        <td><?php echo $row['fecha'] ?></td>

 </tr>

<?php

	}

?>

</table>
</div>
</div>
</body>
</html>
