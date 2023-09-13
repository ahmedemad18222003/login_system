<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
</head>

<body>
    <h1 style="color:blue;text-align:center;font-size:40px;">Updating The User Data</h1>
    <h2>Changing Your Email</h2>
    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <label for="ce">Current Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="email" name="cemail" id="ce" required><br><br>
        <label for="ne">New Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="email" name="nemail" id="ne" required><br><br>
        <label for="cp">Current Password</label>
        <input type="password" name="cpassword" id="cp"><br><br>
        <input type="submit" name="change_email" value="Change Email"><br><br>
    </form>
    <hr>
    <!-- 
    <h2>Changing Your Password</h2>
    <form method="POST">
        <label for="ccp">Current Password</label>&nbsp;&nbsp;
        <input type="password" name="ccpassword" id="ccp" required><br><br>
        <label for="nnp">New Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="password" name="npassword" id="nnp" required><br><br>
        <input type="button" name="change_password" value="Change Password">
    </form>
-->

</body>

</html>
<?php
$em = $_POST["cemail"];

if (isset($_POST["cpassword"])) {
    require_once "connectDB.php";


    $query = "UPDATE user SET Email = :email WHERE Email = :e;";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(":email", $_POST["nemail"]);
    $stmt->bindParam(":e", $_POST["cemail"]);
    // $stmt->bindParam(":id", $ID);

    if ($stmt->execute()) {
        echo "Done";
    } else {
        echo "Error";
    }


}
?>