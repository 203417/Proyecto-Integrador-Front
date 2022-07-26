<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /index.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /index.php");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap');
/* General */

body {

  margin: 0;

  padding: 0;

  font-family: 'Roboto', sans-serif;

  text-align: center;

}



/* Input Forms*/

input[type="text"], input[type="password"]{

  outline: none;

  padding: 20px;

  display: block;

  width: 300px;

  border-radius: 3px;

  border: 1px solid #eee;

  margin: 20px auto;

}



input[type="submit"] {

  padding: 10px;

  color: #fff;

  background: #0098cb;

  width: 320px;

  margin: 20px auto;

  margin-top: 0;

  border: 0;

  border-radius: 3px;

  cursor: pointer;

}

input[type="submit"]:hover {

  background-color: #00b8eb;

}



/* Header */

header {

  border-bottom: 2px solid #eee;

  padding: 20px 0;

  margin-bottom: 10px;

  width: 100%;

  text-align: center;

}

header a {

  text-decoration: none;

  color: #333;

}


body {

    box-sizing: border-box;

    background-color: #1c1c51;

    background-image:  linear-gradient(30deg, #472e99 12%, transparent 12.5%, transparent 87%, #472e99 87.5%, #472e99), linear-gradient(150deg, #472e99 12%, transparent 12.5%, transparent 87%, #472e99 87.5%, #472e99), linear-gradient(30deg, #472e99 12%, transparent 12.5%, transparent 87%, #472e99 87.5%, #472e99), linear-gradient(150deg, #472e99 12%, transparent 12.5%, transparent 87%, #472e99 87.5%, #472e99), linear-gradient(60deg, #472e9977 25%, transparent 25.5%, transparent 75%, #472e9977 75%, #472e9977), linear-gradient(60deg, #472e9977 25%, transparent 25.5%, transparent 75%, #472e9977 75%, #472e9977);

    background-size: 48px 84px;

    background-position: 0 0, 0 0, 24px 42px, 24px 42px, 0 0, 24px 42px;

  }



  h1, h3 {

    margin:0; padding:0;

  }



  h3{

    font-size: 22px;

  }



  .login {

    margin:0 auto;

    max-width:500px;

    padding: 10px;

  }



  .login-header {

    margin: auto;

    padding: 5px;

    font-family: 'Cinzel', serif;

    color:aliceblue;

    text-align:center;

    font-size:32px;

  }

  /* .login-header h1 {

     text-shadow: 0px 5px 15px #000; */

  

  .login-form {

    border: none;

    background:#3B1C83;

    border-radius:10px;

    box-shadow: 0 0 20px 0 rgba(230, 134, 235, 0.3);

  }



  .login-form h3 {

    text-align:left;

    margin-left:40px;

    color:aliceblue;

  }



  .login-form {

    box-sizing:border-box;

    padding-top:15px;

      padding-bottom:10%;

    margin:5% auto;

    text-align:center;

  }



  .login input[type="text"],

  .login input[type="password"] {

    max-width:400px;

    width: 80%;

    line-height:3em;

    font-family: 'Cinzel', serif;

    margin:1em 2em;

    border-radius:7px;

    border:2px solid #f2f2f2;

    outline:none;

    padding-left:10px;

  }



  .login-form input[type="button"] {

    height: 35px;

    width: 90px;

    background:#15013E;

    border: none;

    border-radius: 15px;

    color: aliceblue;

    text-transform:uppercase;

    font-family: 'Cinzel', serif;

    cursor:pointer;

  }



  .login-form input[type="button"]:hover {

    background-color: #A59AFF;

    color: #180D40;

    transition: 0.3s;

  }

  

  /*Media Querie*/

  @media only screen and (min-width : 150px) and (max-width : 530px){

    .login-form h3 {

      text-align:center;

      margin:0;

    }

    .login-button {

      margin-bottom:10px;

    }

  }
</style>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
