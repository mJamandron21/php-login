<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="index.css">

</head>
<body>
    <header> <h1>Mark Kenneth V. Jamandron</h1> </header>
    
    <div class="body">      
        <div class="header">
            <h2>Login</h2>
        </div>

        <form action="login.php" method="POST">
            <! -- display validation errors here -->            
            <?php include('errors.php'); ?>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <div class="input-group">
                <button type="submit" name="login" class="btn">Login</button>
            </div>

            <p class="link" >Not yet a Member? <a href="register.php">Sign up</a> </p>
        </form>
    </div>
</body>
</html>
