
<?php
  $cookie_name = "username";
  $cookie_value = "John Doe";
  $expireTime = time() + 20; // 86400 = 1 day
  setcookie($cookie_name, $cookie_value, $expireTime , "/");
  session_start();
  $sission_1 = 'first';
  $sission_2 = 'second';
  $_SESSION[$sission_1] = 'First Session!';
  $_SESSION[$sission_2] = 'Second Session!';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/index.css">
    <title>Session and Cookies</title>
</head>
<body>
    <h1>Session and Cookies</h1>
    <h2>Cookie</h2>
        <?php 
        // Cookie
        if(isset($_COOKIE[$cookie_name])) echo "
        <strong>$_COOKIE[$cookie_name]</strong> is the value of $cookie_name cookie which will expire after ".($expireTime-time())." seconds";
        else echo "cookie $cookie_name is not set";
        echo "<br><h2>Session</h2>";
        // Session
        print_r($_SESSION);
        echo "<br>session varible 1 is $_SESSION[$sission_1]<br>";
        echo " session varible 2 is $_SESSION[$sission_2]<br>";
        
        ?>
    
</body>
</html>