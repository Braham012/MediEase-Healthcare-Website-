<?php

ini_set('display_errors',1);
error_reporting(E_ALL);
$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];
$date = $_POST['date'];

// database connection
$conn =new mysqli('localhost','root','','hospital');
if($conn ->connect_error){
    die('connection failed:'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO appointment(name,number,email,date) VALUES(?,?,?,?)");
    $stmt->bind_param("ssss",$name,$number,$email,$date);
    $stmt->execute();
    echo "appointment booked succesfully";
    $stmt->close();
    $conn->close();
}


?>