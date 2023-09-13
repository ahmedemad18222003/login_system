<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up Page</title>
  <style>
    body {
      background-color: lightgray;
      text-align: center;
    }

    input {
      border: 1px solid black;
      border-radius: 5px;
      font-size: 15px;
    }

    * {

      font-family: arial;
    }

    .error {
      color: red;
    }
  </style>
  <?php
  global $nameErr, $emailErr, $passErr, $name, $email, $pass;
  if ($_SERVER['REQUEST_METHOD'] == "POST") {



    $nameErr = $emailErr = $passErr = "";
    $name = $email = $pass = "";
    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    if (empty($_POST["name"])) {
      $nameErr = "Name Is Required.";
      // die("Name Is Required.");
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed.";
      }
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email Is Required.";
    } else {
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
      }
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
</head>

<body>
  <h1>Sign Up</h1>
  <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" novalidate>
    <label for="n">Name: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="name" id="n" placeholder="Enter Your Name" value="" />
    <span class="error">*
      <?php echo $nameErr; ?>
    </span> <br /><br />
    <label for="e">Email: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="email" id="e" placeholder="Enter Your Email" value="" />
    <span class="error">*
      <?php echo $emailErr; ?>
    </span> <br /><br />

    <label for="p">Password: </label>&nbsp;
    <input type="password" name="password" id="p" placeholder="Enter A Strong Password" value="" />
    <span class="error">*
      <?php echo $passErr; ?>
    </span> <br /><br />


    </span> <br /><br />

    <input type="submit" name="submit" value="Sign Up" />&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="reset" name="reset" value="Reset">
  </form>
</body>


</html>


<?php
include "insert.php";
?>