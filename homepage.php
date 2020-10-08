<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=PT+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="homepage.css">
    <title>Home page</title>
</head>
<body>
    <?php
        if(isset($_POST['logout'])){
            include 'logout.php';
            header('location:login.php');
        }
        if(isset($_POST['submit'])){
            include 'dbcon.php';
            $text = mysqli_real_escape_string($con, $_POST['text']);
            $username = $_SESSION['username'];

            $insertquery = "insert into data(username,text) values('$username', '$text')";
            $iquery = mysqli_query($con, $insertquery);
        }
    ?>
    <nav class="navbar navbar-light bg-color justify-content-between">
        <a class="navbar-brand">Home Page</a>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="form-inline">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="logout">LOGOUT</button>
        </form>
    </nav>

    <div class="container main">
        <div>
            <h1>Hello this is <?php echo $_SESSION['username'] ?></h1>
        </div>
        
        <div class="text container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="form-group">
                <textarea class="form-control" name="text" type="textarea" rows="2" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              </div>
              <div class="text-center"><button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Send Message</button></div>
            </form>
          </div>
        </form>
        </div> 
    </div>
    



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>