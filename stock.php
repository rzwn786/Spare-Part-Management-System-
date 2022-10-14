<?php
session_start();

$serverName="localhost";
$dbUsername="root";
$dbPassword="xy@2406";
$dBName="spms";

$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dBName);

if (!$conn){
    die("Could not connect to db".mysqli_connect_error());
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    <title>Stock Master</title>
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
                <h1>Stock Master</h1>
            </div>
            <div class="search-result">
                    <div class="btn">
                        <input type="submit" name="additem" value="Add Item" onclick="window.location.href='add.item.php'">
                    </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Part Number</th>
                                <th>Description</th> 
                                <th>Model</th> 
                                <th>On Hand</th> 
                                <th>Price</th> 
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php
                            $sql = "SELECT PartNumber,PartDescription,PartModel,OnHand,PartPrice FROM part";
                            $result = $conn->query($sql);

                            //fetch data from db
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    ?>
                                <tbody>    
                                    <tr>
                                        <td data-label="Part Number"><?php echo $row['PartNumber'] ?></td>
                                        <td data-label="Description"><?php echo $row['PartDescription'] ?></td>
                                        <td data-label="Model"><?php echo $row['PartModel'] ?></td>
                                        <td data-label="On Hand"><?php echo $row['OnHand'] ?></td>
                                        <td data-label="Price"><?php echo $row['PartPrice'] ?></td>
                                        <!--Edit Option-->
                                        <td data-label="Edit"><a class="edit" href="edit.item.php?edit_id=<?php echo $row['PartNumber']; ?>">Edit</a></td>
                                        <!--Delete Option-->
                                        <td data-label="Delete"><a class="delete" href="include/delete.item.php?delete_id=<?php echo $row['PartNumber'];?>">Delete</a></td>
                                    </tr>
                                </tbody>    
                                    <?php 
                                }
                            }
                            else{
                                ?>
                                    <tbody>
                                        <tr>
                                            <td colspan="5">No Data Found</td>
                                        </tr>
                                    </tbody>
                                <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>                     