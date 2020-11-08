<?php include('server.php'); 
    if(empty($_SESSION['username'])) {
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="index.css">

</head>
<body>
    <header> <h1>Mark Kenneth V. Jamandron</h1> </header>
    <div class="dash">
        <h3>WELCOME!</h3>
    </div>

        <div class="content">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="error success">
                    <h3>
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <?php if (isset($_SESSION["username"])): ?>
                <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p> <p><a href="index.php?logout='1'" style="color: blue;">Logout</a></p>
            <?php endif ?>
        </div>
</body>
</html>
