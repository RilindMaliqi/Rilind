<?php
$servername = "localhost";
$username = "root";  // ndrysho nëse ke tjetër
$password = "";      // vendos passwordin e MySQL-it tënd nëse ke
$dbname = "userdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}
?>
