<?php
session_start();
?>


<?php
   include('../include/customerClass.php');
   $x = new Customer();

    if(isset($_POST['login']))
{

    $email = $_POST['email'];
    $pass  = $_POST['pass'];
    $q=$x->login($email,$pass);
    
    
    if($q)
    {
        $row=$q[0]; 
        $_SESSION['customer_id']=$row['id'];  
        if (isset($_SESSION['item'])) 
        {
           header("location:../checkout.php");
        }
        else
        {
          header("location:../index.php");
        }
       
       
    }
    else
      {
        $error="Uncorrect Username Or Password";
      }
}
     


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
     <link rel="stylesheet" href="css/style.css.map">
     <link rel="stylesheet" href="css/style.css">
     <style type="text/css">
body {
  font-size: 14px;
  line-height: 1.8;
  color: #222;
  font-weight: 400;
  font-family: 'Montserrat';
  background-image: url("4.jpg")  !important ;
  background-repeat: no-repeat;
  background-size: cover;
  -moz-background-size: cover;
  -webkit-background-size: cover;
  -o-background-size: cover;
  -ms-background-size: cover;
  background-position: center center;
  padding: 115px 0; }
</style>


                       
   
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="post" id="signup-form" class="signup-form">
                        <h2 class="form-title">Log In</h2>
                        
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" placeholder="Your Email"/>
                        </div>
                       
                        
                      
                         <div class="form-group">
                            <input type="password" class="form-input" name="pass" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                         <div class="form-group">
                    
                            <input type="submit" name="login" id="submit" class="form-submit" value="LOGIN"/>
                        </div>

                    </form>
                        <div style="text-align: center; color:#932029; width: 490px; ">
                           <?php
                                if (isset($error)) 
                                {  echo "
                                       <h3 style='background-color: #F8D7DA;'>
                                            $error
                                        </h3>";
                                }
                                ?>

                        </div>
                            <div class="register-link">
                                <p>
                                    If you don't have an account?
                                    <a href="ssignup.php">Sign-up Here</a>
                                </p>
                            </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>