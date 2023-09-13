<?php

global $email, $pass, $emailErr, $passErr;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $pass = "";
    $emailErr = $passErr = "";
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email Is Required.";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $passErr = "Password Is Required.";
    } else {

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $_POST["password"]);
        $lowercase = preg_match('@[a-z]@', $_POST["password"]);
        $number = preg_match('@[0-9]@', $_POST["password"]);
        $specialChars = preg_match('@[^\w]@', $_POST["password"]);
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST["password"]) < 8) {
            $passErr = "Password should be at least 8 characters
             in length and should include at least one upper case letter,
              one lower case letter, and one special character.";
        } else {
            $pass = $_POST["password"];
        }

    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page</title>
</head>

<body>
    <h1>Log In</h1>
    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <label for="e">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="email" id="e" placeholder="Enter Your Email" autofocus Required>
        <span style="color:red;">
            <?php echo $emailErr; ?>
        </span><br><br>
        <label for="p">Password</label>
        <input type="password" name="password" id="p" placeholder="Enter Your Password">
        <span style="color:red;">
            <?php echo $passErr; ?>
        </span><br><br>
        <input type="submit" name="login" value="login">
    </form>
</body>

</html>

<?php
include "search.php";
?>