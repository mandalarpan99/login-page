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
    <title>login page</title>
</head>
<body>
    <?php
        include 'dbcon.php';

        if(isset($_POST['submit'])){

            $username = $_POST['username'];
            $password = $_POST['password'];


            $search_usn = "select * from data where username='$username' ";
            $query  = mysqli_query($con, $search_usn);

            $usn_count = mysqli_num_rows($query);

            if($usn_count){
                $us_pass = mysqli_fetch_assoc($query);
                $dbpass = $us_pass['password'];
                $_SESSION['username'] = $us_pass['username'];
                $pass_decode = password_verify($password, $dbpass);
                if($pass_decode){
                    echo "Login successful";
                    ?>
                        <script>
                            location.replace("homepage.php");
                        </script>
                    <?php
                }
                else{
                    echo "Login not successful";
                }
            }else{
                echo "Invalid password";
            }
        }
    ?>
    <div class="header">
        <div class="contain">
            <h1>Secret Diary</h1>
            <p>Store your thoughts permanently and sequrely</p>
            <p>Login using your username and passworrd</p>
            <p></p>
        </div>
        <div class="box">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <h1>login</h1>
                <label for="username">Enter your username</label>
                <input type="text" name="username" placeholder="Username">
                <label for="password">Enter your password</label>
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="submit" value="LOGIN">
                <a href="signup.php">Sign up!</a>
            </form>
        </div>
        
    </div>
</body>
</html>