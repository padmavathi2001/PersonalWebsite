<?php
session_start();
$servername="127.0.0.1";
$username="root";
$password="";

$dbname = "db";
$conn = mysqli_connect($servername, $username, $password,$dbname);

if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
    
echo "<br>";
}
else{
  
}

?>
