<?php
session_start();

include_once 'include/db.inc.php';

//Get id from db
if(isset($_GET['edit_id'])){
    $sql = "SELECT PartNumber,PartDescription,PartModel,Onhand,PartPrice FROM part WHERE PartNumber =".$_GET['edit_id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    //update information 
    if(isset($_POST['update'])){
        $partnumber = $_POST['partnumber'];
        $description = $_POST['description'];
        $model = $_POST['model'];
        $onhand = $_POST['onhand'];
        $price = $_POST['price'];

        $update = "UPDATE part SET PartNumber = '$partnumber',PartDescription ='$description',PartModel ='$model',Onhand ='$onhand',PartPrice = '$price' 
        WHERE PartNumber=".$_GET['edit_id'];
        $up = mysqli_query($conn, $update);
        
        if(!isset($sql)){
            die("Error $sql".mysqli_connect_error());
        }
        else{
            $message ="Item Succesfully Editted";

            echo "<script>alert('$message')
                    window.location.replace('stock.php')
                  </script>";
        }
    }

}
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
    <title>Edit Item</title>
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
                <h1>Edit Item</h1>
            </div>
            <div class="search-result">
                <div class="form">
                    <form action="#" method="post">
                        <div class="input-group">
                            <div class="label">
                                <label>Part Number</label>
                            </div>
                            <input type="number" name="partnumber" required value="<?php echo $row['PartNumber'] ?>">
                        </div>
                        <div class="input-group">
                            <div class="label">
                                <label>Description</label>
                            </div>
                            <input type="text" name="description" value="<?php echo $row['PartDescription'] ?>">
                        </div>
                        <div class="input-group">
                            <div class="label">
                                <label>Price</label>
                            </div>
                            <input type="number" name="price" step="any" value="<?php echo $row['PartPrice'] ?>">
                        </div>
                        <div class="input-group">
                            <div class="label">
                                <label>Stock On Hand</label>
                            </div>
                            <input type="number" name="onhand" value="<?php echo $row['Onhand'] ?>">
                        </div>
                        <div class="center">
                            <div class="input-group">
                                <div class="label">
                                    <label>Model</label>
                                </div>
                                <textarea name="model"><?php echo $row['PartModel'] ?></textarea>
                            </div>
                        </div>
                        <div class="center">
                            <div class="btn-group">
                                <button class="green" type="submit" name="update" onclick="update()">Update</button>
                                <button class="red" type="button" name="cancel" onclick="window.location.href='stock.php'">Cancel</button>                            
                            </div>
                        </div>
                    </form>
                    <!--Alert for update -->
                    <script>
                        function update () {
                            var x;
                            if(confirm("Update data Successfully")==true){
                                x="update";
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>                     