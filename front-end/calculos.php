<!DOCTYPE html>
<html>
<head>
<style>
*{

    padding: 0;

    margin: 0;

    

}



body{

    box-sizing: border-box;

    background-color: #1c1c51;

    background-image:  linear-gradient(30deg, #472e99 12%, transparent 12.5%, transparent 87%, #472e99 87.5%, #472e99), linear-gradient(150deg, #472e99 12%, transparent 12.5%, transparent 87%, #472e99 87.5%, #472e99), linear-gradient(30deg, #472e99 12%, transparent 12.5%, transparent 87%, #472e99 87.5%, #472e99), linear-gradient(150deg, #472e99 12%, transparent 12.5%, transparent 87%, #472e99 87.5%, #472e99), linear-gradient(60deg, #472e9977 25%, transparent 25.5%, transparent 75%, #472e9977 75%, #472e9977), linear-gradient(60deg, #472e9977 25%, transparent 25.5%, transparent 75%, #472e9977 75%, #472e9977);

    background-size: 48px 84px;

    background-position: 0 0, 0 0, 24px 42px, 24px 42px, 0 0, 24px 42px;

}



.App-header{

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: flex-end;

    margin: 200px;

    padding: 15px;

}



h1, h2{

    text-align: center;

    font-size: 35px;

    font-family: 'Cinzel', serif;

    color: aliceblue;

}



.btn {

    display: inline-block;

    border-radius: 8px;

    background-color: #110025;

    border: none;

    color: aliceblue;

    text-align: center;

    font-family: 'Cinzel', serif;

    font-size: 20px;

    padding: 20px;

    width: 70px;

    transition: all 0.5s;

    cursor: pointer;

    margin: 5px;

  }

  

  .btn span {

    cursor: pointer;

    display: inline-block;

    position: relative;

    transition: 0.5s;

  }

  

  .btn span:after {

    content: '\00bb';

    position: absolute;

    opacity: 0;

    top: 0;

    right: -20px;

    transition: 0.5s;

  }

  

  .btn:hover span {

    padding-right: 25px;

  }

  

  .btn:hover span:after {

    opacity: 1;

    right: 0;

  }
</style>
	<title>Registrar usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php 
    include("mostrar.php");
    ?>
</body>
</html>
