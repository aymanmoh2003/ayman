
<?php 
   session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="container">
        <div class="box form-box">
            <?php 
             
              include("php/config.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['email'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }

                if($row){
                    if(!empty($_POST["remember"])){
                        setcookie ("member_login",$_POST["email"],time()+(10 * 365 * 24 * 60 * 60));
                        setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
                    }
                    else{
                        if(isset($_COOKIE["member_login"]))
                        {
                            setcookie("member_login","");
                        }
                        if(isset($_COOKIE["password"]))
                        {
                            setcookie("password","");
                        }
                    }
                    header("location:home.php");
                }

              }else{

              
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" value="<?php if(isset($_COOKIE["member_login"])) {echo $_COOKIE["member_login"];}?>" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" value="<?php if(isset($_COOKIE["password"])) {echo $_COOKIE["password"];} ?>" name="password" id="password" autocomplete="off" required>
                </div>
                
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>

                <div class="g-recaptcha" data-sitekey="6LeWl3QpAAAAAIUCK6Kb2Vg-aOYaBgQwHA4hVVH5"></div>

                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>

                <div class="form-group">
                    <label> Remember me </label>
                    <input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])){?> checked<?php}?> >
                </div>

            </form>
        </div>
        <?php } }?>
    </div>
</body>

</html>