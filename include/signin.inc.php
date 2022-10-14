<?php
session_start();
$message ="";
if(count($_POST)>0){

    include_once 'db.inc.php';

    $result = mysqli_query($conn, "SELECT StaffId,StaffName,StaffEmail,StaffPosition,StaffPass FROM staff WHERE StaffEmail='" .$_POST["email"]."' and StaffPass='".$_POST["password"]."'");
    $row = mysqli_fetch_array($result);
    if(is_array($row)){
        $_SESSION["id"] = $row['StaffId'];
        $_SESSION['StaffName'] = $row['StaffName'];
    }
    else{
        $message ="invalid username or password";

        echo "<script>alert('$message')
                window.location.replace('../index.php')
              </script>";
    }
    if(isset($_SESSION["id"])){
        $message ="Successfully Login";

        echo "<script>alert('$message')
                window.location.replace('../inventory.php')
              </script>";
    }

}
?>