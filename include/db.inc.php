<?php

$serverName="localhost";
$dbUsername="root";
$dbPassword="xy@2406";
$dBName="spms";

$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dBName);

if (!$conn){
    die("Could not connect to db".mysqli_connect_error());
}