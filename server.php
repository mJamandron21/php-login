<?php
    session_start();

    //setting variables to null
    $username = "";
    $email = "";
    //storage of errors 
    $errors = array();
    

    //connection to the database
    $db = mysqli_connect('localhost','root','','php-login');

    //if the register button is clicked
    if(isset($_POST['register'])){
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

            $uppercase = preg_match('@[A-Z]@', $password_1);
            $lowercase = preg_match('@[a-z]@', $password_1);
            $number    = preg_match('@[0-9]@', $password_1);
            $specialChars = preg_match('@[^\w]@', $password_1);
  

        // ensure that form fields are filled properly
        if(empty($username)){
            array_push($errors,"Username is Required");
        }
        if(empty($email)){
            array_push($errors,"Email is Required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors,"Invalid email format e.g(baymax@gmail.com)");
        }
        //password validation
        if(empty($password_1)){
            array_push($errors,"Password is Required");
        }
        if(($password_1 != $password_2)){
            array_push($errors,"Passwords didn't match");
        }
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password_1) < 8) {
            array_push($errors,"Password should contain 8 letters and alphanumeric");
        }
        
        

        // if there are no errors, save user to database
        if(count($errors) == 0) {
            $password = md5($password_1);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
            mysqli_query($db,$sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";

            //redirect to homepage/dashboard
            header('location: index.php'); 

        }
    }   

    //log in user from login page
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $password = mysqli_real_escape_string($db,$_POST['password']);

    //ensure that form fields are filled properly
    if(empty($username)){
        array_push($errors,"Username is Required");
    }
    if(empty($password)){
        array_push($errors,"Password is Required");
    }

    if(count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username= '$username' AND password= '$password'";

        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result)==1){
            //login user
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";

            //redirect to homepage/dashboard
            header('location: index.php'); 

        }

    }
}
    

    //logout
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>
