<?php
session_start();
include_once 'db.inc.php';


if (!$conn){
    die("Could not connect to db".mysqli_connect_error());
}

if(isset($_GET['delete_id'])){

    //get id from database
    $sql = "DELETE FROM part WHERE PartNumber = ".$_GET['delete_id'];


    if(mysqli_query($conn,$sql)){

        $message ="Item Succesfully Deleted";

        echo "<script>alert('$message')
                window.location.replace('../stock.php')
              </script>";
    }
    else{
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>