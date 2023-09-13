<?php
// PDO: PHP Data Objects
//$dsn = "mysql:host=localhost;dbname=bookdb;charset=UTF8";
$servername = "localhost"; // The Host
$username = "root"; // The Account 
$password = "";
$dbname = "login_db"; // The login_db is a database on the local database server.
try {
    // create PDO Object is an instance of the PDO class
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // If you have everything set up correctly , then U Will See in Page "Connected Successfully".
    /* if ($conn) {
         echo "<h1 style='color:red;text-align:center;'>Connected successfully</h1>";
     }
    */
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


/*
// MySQLi Object-Oriented
$host = "localhost";
$dbname = "loginx_db";
$username = "root";
$password = "";

// create connection
$mysqli = new mysqli(
    hostname: $host,
    username: $username,
    password: $password,
    database: $dbname
);
// check connection
if ($mysqli->connect_error) {
    die("Connection Failed: " . $mysqli->connect_error);
}
// Check connection

// if (mysqli_connect_error()) {
//     die("Database connection failed: " . mysqli_connect_error());
//   }
  
echo "Connected successfully.";
*/


/*
// MySQLi Procedural
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
*/

/*
Close the Connection:

MySQLi Object-Oriented:
$conn->close();

MySQLi Procedural:
mysqli_close($conn);

PDO:
$conn = null;

*/