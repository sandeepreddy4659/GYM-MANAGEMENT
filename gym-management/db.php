<?php
// db.php - database connection (used by other pages)
$servername = "localhost";
$username = "root";    // default XAMPP MySQL user
$password = "";        // default XAMPP password is empty
$dbname = "gymdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
