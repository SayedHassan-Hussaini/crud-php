<?php 
session_start();
 if(isset($_COOKIE['remmber'])){
 header('location:home.php');
 }
?>
<!doctype html>
<html lang="en">

<head>
    <title>Company</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./style/css/bootstrap.min.css">
        <link rel="stylesheet" href="./style/index.css">
        <script src="./style/js/poper.js"></script>
        <script src="./style/js/bootstrap.min.js"></script>
</head>

<body class="bg-secondary">
   <div class="minCard">
   <form class="card loginCard" method="post" action="home.php">
    <h1 class="headerLogin">Login page</h1>
        <lable>User name:</lable>
        <input name="username" type="text" />
        
        <lable>Password:</lable>
        <input name="pass" type="password"/>
        
        <span class="checkbox">Remmber me</span>
        <input class="remmber" name="remmber" type="checkbox"/>
        
        <button class="btn btn-info">Login</button>
    </form>
   </div>
</body>