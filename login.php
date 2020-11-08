<?php 
  require('./database.php');

  session_start();

  /* Functions */
  function pathTo($destination) {
    echo "<script>window.location.href = '/php-login2/$destination.php'</script>";
  }

  if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
    /* Set Default Invalid */
    $_SESSION['status'] = 'invalid';
  }

  if ($_SESSION['status'] == 'valid') {
    pathTo('home');
  }
  
  
  if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    if (empty($username) || empty($password)) {
      echo "Please fill up all fields";
    } else {
      $queryValidate = "SELECT * FROM accounts WHERE username = '$username' AND password = md5('$password')";
      $sqlValidate = mysqli_query($connection, $queryValidate);
      $rowValidate = mysqli_fetch_array($sqlValidate);

      if (mysqli_num_rows($sqlValidate) > 0) {
        $_SESSION['status'] = 'valid';
        $_SESSION['username'] = $rowValidate['username'];

        pathTo('home');
      } else {
        $_SESSION['status'] = 'invalid';

        echo 'Invalid username or password';

      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
  <!-- <form action="/php-login/login.php" method="post">
    <input type="text" name="username" placeholder="Enter your username"/>
    <input type="password" name="password" placeholder="Enter your password"/>
    <input type="submit" name="login" value="LOGIN"/>
  </form> -->

  <div class="container">
        <div class="row">
          <div class="col-md-5 mt-5">
            <div class="bg-white">
                <h2>Sign In</h2>
                <h4>Mark Kenneth V. Jamandron</h4>
                <form action="/php-login2/login.php" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div> 
                  <div class="form-group">
                    <input type="submit" value="LOGIN" name="login" class="btn btn-primary px-5">
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
