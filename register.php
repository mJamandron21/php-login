<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="index.css">

</head>
<body>
    <header> <h1>Mark Kenneth V. Jamandron </h1> </header>
    
    <div class="body">      
        <div class="header">
            <h2> Register</h2>
        </div>

        <form action="register.php" method="POST">
            <! -- display validation errors here -->            
            <?php include('errors.php'); ?>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username">
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password_2">
            </div>

            <div class="input-group">
                <button type="submit" name="register" class="btn">Register</button>
            </div>

            <p class="link" >Already a member? <a href="login.php">Sign In</a> </p>
        </form>
    </div>
</body>
</html>
