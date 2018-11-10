<?php

$host ="localhost";
$username="root";
$password="";
$database="bobbieteriba_map";

$con=mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_error())
{
    echo "Failed to connect to MYSQL" .mysqli_connect_error();
}
else
{
    echo "Connected Successfully";
}
?>
