<?php 
        $hostname = 'localhost';
        $user = 'root';
        $passwrod = '';
        $database = 'test';
        $conn = new mysqli($hostname,$user,null,$database);
        if($conn->connect_error){
            echo "connection failed".$conn->connect_error;
        }
        else echo "connection was succesffully";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/index.css" />
    <title>Crud with php</title>
</head>
<body>
    <h2>Connection ,Create, Select, Update, and Delete</h2>
    <h4>create database</h4>
    <form method="GET">
        <label for="CreateDbName">Enter database name</label>
        <input type="text" name="CreateDbName">
        <input type="submit">
    </form>

<?php
    $CreateDbName = 'CreateDbName';
    if(isset($_GET[$CreateDbName])){
        $sql = "CREATE DATABASE $_GET[$CreateDbName]";
        if ($conn->query($sql) === TRUE) {
            echo "Database $_GET[$CreateDbName] created successfully";
        } else {
          echo "Error creating database: " . $conn->error;
        }
        $conn->close();  
    }
    ?>

<br><h4>delete database</h4>
<form method="GET">
    <label for="DeleteDbName">database name</label>
    <input type="text" name="DeleteDbName">
    <input type="submit">
</form>

<?php
    $DeleteDbName = 'DeleteDbName';
    if(isset($_GET[$DeleteDbName])){
        $sql = "DROP DATABASE $_GET[$DeleteDbName]";
        if ($conn->query($sql) === TRUE) {
            echo "Database $_GET[$DeleteDbName] droped successfully";
        } else {
          echo "Error droping database: " . $conn->error;
        }
        
        $conn->close();   
    }
?>

    <br><h4>select data</h4>
    <form method="GET">
        <label for="ReadDbName">database name</label>
        <input type="text" name="ReadDbName">
        <label for="tbName">Table name</label>
        <input type="text" name="tbName">
        <input type="submit">
    </form>
    <?php 
    $ReadDbName = "ReadDbName";
    $TableName = 'tbName';
    if(isset($_GET[$ReadDbName]) && $_GET[$TableName]){
        $conn = new mysqli($hostname,$user,null,$_GET[$ReadDbName]);
        if($conn->connect_error){
            echo "connection failed".$conn->connect_error;
        }
        else echo "connection was succesffully<br>";
        $sql = "SELECT * FROM $_GET[$TableName]";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. " - City: $row[city] <br>";
              }            
        } else {
            echo "0 results";
          }
    }
    ?>

    <br><h4>insert data in database <mark>test</mark> table <mark>username</mark></h4>
    <form method="GET">
        <label for="firstName">First Name</label>
        <input type="text" name="firstName">
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName">
        <label for="city">City</label>
        <input type="text" name="city">
        <input type="submit">
    </form>
    <?php
    $firstName = 'firstName';
    $lastName = 'lastName';
    $city = 'city';
    if(isset($_GET[$firstName]) &&
        isset($_GET[$lastName]) &&
        isset($_GET[$city]))
        {
            $sql = "INSERT INTO username (firstName, lastName, city)
            VALUES ('$_GET[$firstName]',' $_GET[$lastName]', '$_GET[$city]')";
            if($conn->query($sql)){
                echo "Data successffuly inserted";
            }else echo "Error ".$sql."<br>".$conn->error;
        }
    ?>

    <br><h4>Update data in database <mark>test</mark> table <mark>username</mark></h4>
    <form method="GET">
        <label for="updataId">Id</label>
        <input type="number" name="updataId">
        <label for="firstNameU">New First Name</label>
        <input type="text" name="firstNameU">
        <label for="lastNameU">New Last Name</label>
        <input type="text" name="lastNameU">
        <input type="submit" name="ok">
    </form>
    <?php
        $idU = 'updataId';
        $lastNameU = 'lastNameU';
        $firstNameU = 'firstNameU';
        if(isset($_GET[$idU])){
            $sql = "UPDATE username SET firstName='$_GET[$firstNameU]', lastName='$_GET[$lastNameU]' WHERE id=$_GET[$idU]";
            if ($conn->query($sql)) {
                echo "Record $_GET[$idU] Updated successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
    ?>

    <br><h4>Delete data from database <mark>test</mark> table <mark>username</mark></h4>
    <form method="GET">
        <label for="DeleteId">Id</label>
        <input type="number" name="DeleteId">
        <input type="submit" name="ok">
    </form>
    <?php
        $id = 'DeleteId';
        if(isset($_GET[$id])){
            $sql = "DELETE FROM username WHERE id=$_GET[$id]";
            if ($conn->query($sql)) {
                echo "Record $_GET[$id] deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
    ?>

</body>
</html>