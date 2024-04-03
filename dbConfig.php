<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = 'certificate';
$conn = new mysqli($servername, $username, $password , $dbName );
$connection = new PDO("mysql:host=$servername;dbname=certificate" ,$username ,$password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

