<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css?v=<?php echo time(); ?>">
    <link rel="icon"  href="media/logo.png">
    <title>Sign In</title>
</head>
<body>
    <div class="wrapper">
            <div class="content">
                    <div class="heading">
                        <img src="media/logo.png">
                        <h1>Sign in</h1>
                    </div>
                    <form action="include/signin.inc.php" method="post">
                        <div class="input-group">
                            <div class="label">
                                <label for="email=">Email</label>
                            </div>
                            <input type="text" name="email" placeholder="Enter your Email">
                        </div>
                        <div class="input-group">
                            <div class="label">
                                <label for="password">Password</label>
                            </div>
                            <input type="password" name="password" placeholder="Enter your Password">
                        </div>
                        <div class="btn">
                            <input type="submit" name="submit" value="Sign In">
                            <input type="submit" name="forgetpassword" value="Forget Password">
                        </div>
                    </form>
            </div>
    </div>
</body>
</html>