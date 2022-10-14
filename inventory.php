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
    
   
    <title>Inventory Search</title>
</head>
<body>
<div class="nav" id="navbar">
        <a href="home.php" >Home</a>
        <a href="inventory.php" class="active">Inventory Search</a>
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
                <h1>Inventory Search</h1>
            </div>
            <div class="search-bar">

                <form name="" method="get">
                    <div class="part-number-search">
                        <div class="label">
                            <label>Part Number</label>
                        </div>
                        <div class="input">
                            <input type="number" name="part-number-search" value="<?php if(isset($_GET["part-number-search"])){echo $_GET["part-number-search"]; }?>" placeholder="Enter part number" required>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <form name="" method="get">
                    <div class="part-model-search">
                        <div class="label">
                            <label >Part Model</label>
                        </div>
                        <div class="input">
                            <input type="text" name="part-model-search" value="<?php if(isset($_GET["part-model-search"])){echo $_GET["part-model-search"]; }?>" placeholder="Enter part model" required>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                
                <form name="" method="get">
                    <div class="part-description-search">
                        <div class="label">
                            <label >Part Description</label>
                        </div>
                        <div class="input">
                            <input type="text" name="part-description-search" value="<?php if(isset($_GET["part-description-search"])){echo $_GET["part-description-search"]; }?>" placeholder="Enter part description" required>
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="search-result">
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Part Number</th>
                                <th>Description</th> 
                                <th>Model</th> 
                                <th>On Hand</th> 
                                <th>Price</th> 
                            </tr>
                        </thead>
                            <?php
                                include_once 'include/db.inc.php';

                                if(isset($_GET['part-number-search'])){
                                    $filtervalues = $_GET['part-number-search'];
                                    $sql = "SELECT * FROM part WHERE CONCAT(PartNumber) LIKE '%$filtervalues%' ";
                                    $result = mysqli_query($conn, $sql);

                                    if(mysqli_num_rows($result) > 0){
                                        foreach($result as $item){
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td data-label="Part Number"><?php echo $item['PartNumber'] ?></td>
                                                    <td data-label="Description"><?php echo $item['PartDescription'] ?></td>
                                                    <td data-label="Model"><?php echo $item['PartModel'] ?></td>
                                                    <td data-label="On Hand"><?php echo $item['Onhand'] ?></td>
                                                    <td data-label="Price"><?php echo $item['PartPrice'] ?></td>
                                                </tr>
                                            </tbody>

                                            <?php
                                        }
                                    }
                                    else{
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td colspan="5">No Record Found</td>
                                                </tr>
                                            </tbody>
                                        <?php
                                    }
                                } else if(isset($_GET['part-model-search'])){
                                    $filtervalues = $_GET['part-model-search'];
                                    $sql = "SELECT * FROM part WHERE CONCAT(PartModel) LIKE '%$filtervalues%' ";
                                    $result = mysqli_query($conn, $sql);

                                    if(mysqli_num_rows($result) > 0){

                                        foreach($result as $item){
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td data-label="Part Number"><?php echo $item['PartNumber'] ?></td>
                                                    <td data-label="Description"><?php echo $item['PartDescription'] ?></td>
                                                    <td data-label="Model"><?php echo $item['PartModel'] ?></td>
                                                    <td data-label="On Hand"><?php echo $item['Onhand'] ?></td>
                                                    <td data-label="Price"><?php echo $item['PartPrice'] ?></td>
                                                </tr>
                                            </tbody>

                                            <?php
                                        }
                                    }
                                    else{
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td colspan="5">No Record Found</td>
                                                </tr>
                                            </tbody>
                                        <?php
                                    }
                                } if(isset($_GET['part-description-search'])){
                                    $filtervalues = $_GET['part-description-search'];
                                    $sql = "SELECT * FROM part WHERE CONCAT(PartDescription) LIKE '%$filtervalues%' ";
                                    $result = mysqli_query($conn, $sql);

                                    if(mysqli_num_rows($result) > 0){
                                        foreach($result as $item){
                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <td data-label="Part Number"><?php echo $item['PartNumber'] ?></td>
                                                        <td data-label="Description"><?php echo $item['PartDescription'] ?></td>
                                                        <td data-label="Model"><?php echo $item['PartModel'] ?></td>
                                                        <td data-label="On Hand"><?php echo $item['Onhand'] ?></td>
                                                        <td data-label="Price"><?php echo $item['PartPrice'] ?></td>
                                                    </tr>
                                                </tbody>
                                            <?php
                                        }
                                    }
                                    else{
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td colspan="5">No Record Found</td>
                                                </tr>
                                            </tbody>
                                        <?php
                                    }
                                }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>                     