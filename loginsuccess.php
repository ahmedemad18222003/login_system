<?php


session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In page</title>
</head>

<body>
    <h1 style="text-align:center;font-size:40px;">User Data</h1>
    <?php
    if (
        isset($_SESSION["username"]) && isset($_SESSION["email"]) && isset($_SESSION["user_id"])
        && isset($_SESSION["Date"])
    ) {
        $name = htmlspecialchars($_SESSION["username"]);
        $email = htmlspecialchars($_SESSION["email"]);
        $id = htmlspecialchars($_SESSION["user_id"]);
        $timedate = htmlspecialchars($_SESSION["Date"]);
        echo "<p style='font-size: 30px;background-color:gray;padding:20px;margin:10px;color:white;'>
        Hello <mark>$name</mark>.<br>
         Your Email: <mark>$email</mark>.<br> 
        And Your Id is <mark>$id</mark>.<br>
        The Account Created At <mark>$timedate</mark>.</p><br>";
        echo "<p style='text-align:center;font-size:50px;'>
        <a style='border:2px solid black;
        border-radius:10px;
        text-decoration:none;
        padding:20px;
        color:white;
        background-color:gray;' 
        href='logout.php'>Log Out</a>
        </p>";
        echo "<p><a href='update.php?Id=$id&Email=$email'>Update Account</a></p>";
        echo "<p><a href='delete.php?Id=$id&Email=$email'>Delete Account</a></p>";
    } else {
        header("Location: home.html");
        exit();
    }
    ?>
</body>

</html>