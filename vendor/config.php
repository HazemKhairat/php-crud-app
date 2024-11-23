<?php

$host = "localhost";
$user = "root";
$password = "";
$dbName = "web";

mysqli_connect($host, $user, $password, $dbName);

try{
    $conn = mysqli_connect($host, $user, $password, $dbName);
} catch (Exception $obj){
    echo $obj->getMessage(); 
}