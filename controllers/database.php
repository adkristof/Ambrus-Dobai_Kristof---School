<?php
$serverAddress = "localhost";
$username = "root";
$password = "";
$databaseName="adklionsdaleapp";

try {
    $connection = mysqli_connect($serverAddress,$username,$password,$databaseName);
    
} catch (\Throwable $th) {
    
    echo "<script>alert('Something is wrong please help me! --') </script>";
    echo $th;
}