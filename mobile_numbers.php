<?php include_once 'dbConfig.php';
global $conn;

$MobileNumbers = [ ];

foreach ($MobileNumbers as $mobile) {
   $sql = "INSERT INTO certificate (phone) VALUES ('" . $mobile . "')";
   $conn->query($sql);
   $insertData = $conn->prepare('INSERT INTO certificate (phone) VALUES (:phone)');
  //  $insertData->bind_param(':phone', $mobile);
  //  $insertData->execute();
}