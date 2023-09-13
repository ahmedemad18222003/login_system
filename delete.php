<?php

$ID = $_GET["Id"];
$EM = $_GET["Email"];

try {
    require "connectDB.php";
    $query = "DELETE FROM user WHERE Email = :email AND Id = :id;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":email", $EM);
    $stmt->bindParam(":id", $ID);
    if ($stmt->execute()) {
        echo "Deletion The Account Successfully.<br>";
        echo "<p><a href='home.html'>Home Page</a></p>";

    }
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}