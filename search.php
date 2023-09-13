<?php
session_start();
// Prepare/Create A Query Statement
try {
    require "connectDB.php";
    $query = "SELECT * FROM user WHERE Email = :email AND Password = :password;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":email", $_POST["email"]);
    $stmt->bindParam(":password", $_POST["password"]);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $row) {
        $_SESSION["username"] = $row["Name"];
        $_SESSION["email"] = $row["Email"];
        $_SESSION["user_id"] = $row["Id"];
        $_SESSION["Date"] = $row["Reg_Date"];
    }
    if (isset($_SESSION["username"], $_SESSION["email"], $_SESSION["user_id"], $_SESSION["Date"])) {
        header("Location: loginsuccess.php");
    }


} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}