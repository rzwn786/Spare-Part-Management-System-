<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css?v=<?php echo time(); ?>">
    <link rel="icon"  href="media/logo.png">
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--Import burger Icon-->
    <title>Home</title>
</head>
<body>
    <div class="nav" id="navbar">
        <a href="home.php" class="active">Home</a>
        <a href="inventory.php" >Inventory Search</a>
        <a href="stock.php">Stock Master</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
        <div class="user">
            <?php
            if(isset($_SESSION["id"])){
                echo "<a><i class='fa fa-user' aria-hidden='true'></i>&nbspUser: {$_SESSION['StaffName']}</a>";
                echo "<a href='include/signout.inc.php'><i class='fa fa-sign-out' aria-hidden='true'></i>&nbsp;Sign Out</a>";
            }
            ?>
        </div>
    </div>
    <div class="content">
        <div class="box">
            <div class="heading">
                <h1>Welcome</h1>
            </div>
        </div>
    </div>
</body>
</html>                     