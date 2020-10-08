<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <title>sign up page</title>
</head>
<body>

<?php

    include 'dbcon.php';
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $pass = password_hash($password, PASSWORD_BCRYPT);

        $userquery = "select * from data where username='$username'";
        $query = mysqli_query($con,$userquery);

        $usercount = mysqli_num_rows($query);

        if($usercount>0){
            ?>
            <script>
                alert("username is already taken");
            </script>
        <?php   
        }
        else{
            if(empty($password))
            {
                ?>
                        <script>
                            alert("Please enter a password");
                        </script>
                    <?php
            }else{
                $insertquery = "insert into data(username,password) values('$username', '$pass')";
                $iquery = mysqli_query($con, $insertquery);
                $_SESSION['mess'] = "Your account has created $username";
                header('location:login.php');
            }
        }
    }


?>

    <div class="header">
        <div class="contain">
            <h1>Secret Diary</h1>
            <p>Store your thoughts permanently and sequrely</p>
            <p>Enter a username and passworrd</p>
            <p>

        </div>
        
        <div class="box">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <h1>Sign up here</h1>
            <label for="username">Enter your username</label>
            <input type="text" name="username" placeholder="Username">
            <label for="password">Enter your password</label>
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit" value="SIGN UP">
            <a href="login.php">Login!</a>
        </form>
        </div>
        
    </div>
</body>
</html>