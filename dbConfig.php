<?php
$servername = "localhost";
$username = "";
$password = "";
$dbName = 'khanes_khsarmaye';
$conn = new mysqli($servername, $username, $password , $dbName );
$connection = new PDO("mysql:host=$servername;dbname=khanes_khsarmaye" ,$username ,$password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

