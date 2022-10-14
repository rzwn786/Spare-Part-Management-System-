<?php
session_start();

include_once 'db.inc.php';

$partnumber = $_POST['partnumber'];
$description = $_POST['description'];
$model = $_POST['model'];
$onhand = $_POST['onhand'];
$price = $_POST['price'];

//insert data into mysql
$sql = "INSERT INTO part (PartNumber,PartDescription,PartModel,Onhand,PartPrice)
VALUES('$partnumber','$description','$model','$onhand','$price')";

if(mysqli_query($conn, $sql)){
    
    echo '<script>alert("Item Succesfully Added")</script>';
    exit();
}
else{
    echo '<script>alert("Failed to add item")</script>';
    echo "<h1>Error: </h1>" . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>