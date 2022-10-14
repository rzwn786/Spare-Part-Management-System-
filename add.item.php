<?php
session_start();

include_once 'include/db.inc.php';

if(isset($_POST['save'])){
    $partnumber = $_POST['partnumber'];
    $description = $_POST['description'];
    $model = $_POST['model'];
    $onhand = $_POST['onhand'];
    $price = $_POST['price'];

//insert data into mysql
$sql = "INSERT INTO part (PartNumber,PartDescription,PartModel,Onhand,PartPrice)
VALUES('$partnumber','$description','$model','$onhand','$price')";

if(mysqli_query($conn, $sql)){
        
    $message ="Item Succesfully Added";

    echo "<script>alert('$message')
            window.location.replace('stock.php')
          </script>";
}
else{
    echo '<script>alert("Failed to add item")</script>';
    echo "<h1>Error: </h1>" . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
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
    <title>Add Item</title>
</head>
<body>
<div class="nav" id="navbar">
        <a href="home.php" >Home</a>
        <a href="inventory.php" >Inventory Search</a>
        <a href="stock.php" class="active">Stock Master</a>
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
                <h1>Add Item</h1>
            </div>
            <div class="search-result">
                <div class="form">
                    <form method="post">
                        <div class="input-group">
                            <div class="label">
                                <label>Part Number</label>
                            </div>
                            <input type="number" name="partnumber">
                        </div>
                        <div class="input-group">
                            <div class="label">
                                <label>Description</label>
                            </div>
                            <input type="text" name="description">
                        </div>
                        <div class="input-group">
                            <div class="label">
                                <label>Price</label>
                            </div>
                            <input type="number" name="price" step="any">
                        </div>
                        <div class="input-group">
                            <div class="label">
                                <label>Stock On Hand</label>
                            </div>
                            <input type="number" name="onhand">
                        </div>
                        <div class="center">
                            <div class="input-group">
                                <div class="label">
                                    <label>Model</label>
                                </div>
                                <textarea type="text" name="model" rows="4" cols="30"></textarea>
                            </div>
                        </div>
                        <div class="center">
                            <div class="btn-group">
                                <button class="green" type="submit" name="save">Save</button>
                                <button class="red" type="button" name="cancel" onclick="window.location.href='stock.php'">Cancel</button>                            
                            </div>
                        </div>
                        <?php
                           // echo $_SESSION['$message'];
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>                     