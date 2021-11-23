<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="tienda";
$puerto=3306;
$conn = new mysqli($servername, $username, $password, $dbname, $puerto);

if($conn ->connect_error){
    die("Connection failed: ".$conn->connect_error);
}        
?>




