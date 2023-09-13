<?php
// Prepare/Create A Query Statement
try {
    require_once "connectDB.php";
    $query = "INSERT INTO user (Name , Email , Password) 
    VALUES (:username , :email , :pwd);";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":username", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $pass);

    $stmt->execute();

    $conn = NULL;
    $stmt = NULL;
    header("Location: signupsuccess.php");
    exit();

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}