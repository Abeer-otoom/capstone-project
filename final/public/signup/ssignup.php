<?php
include "../include/customerClass.php";
$c            =new Customer();
$erorr        =0;
$name         ="";
$password     ="";
$email        ="";
$con_password ="";
$address      ="";
$phone        ="";

if (isset($_POST['submit'])) 
{
  $name          =$_POST['name'];
  $password      =$_POST['password'];
  $email         =$_POST['email'];
  $con_password  =$_POST['con_password'];
  $address       =$_POST['address'];
  $phone         =$_POST['phone'];
  

  if ($password !=$con_password) 
  {
  $erorrpass1=" * Password not match !!";
  $erorr=1;
  }
  if (! filter_var($email,FILTER_VALIDATE_EMAIL)) 
  {
   $emailerror=" * Invaild email format";
   $erorr=1;
  }
  if ( ! preg_match("/^[A-Z]/", $password) || strlen($password) < 8) 
  {
     $errorpass2=" * Password must start with upper case letter/ at least 8 characters";
     $erorr=1;
  }
   if (empty($phone)|| strlen($phone)>10 || strlen($phone)<10) 
    {
       $errormobile=" * Mobile not vaild";
       $error=1;
    }
  if ($erorr==0) 
  {
     $c->name=$name;
     $c->email=$email;
     $c->password=$password;
     $c->address=$address;
     $c->phone=$phone;
     $c->city=$city;

     $query=$c->create();
      if ($query) 
        {
            header("location:slogin.php");
        }   
  }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" enctype='multipart/form-data'>
                        <h2 class="form-title">Create Account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name"  placeholder="Your Name"
                            value="<?php echo $name ; ?>"  required />
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-input" name="email" placeholder="Your Email" 
                                    value="<?php echo $email ; ?>" required />
                             <div style="color:red; ">
                                <?php if (isset($emailerror)) 
                                { echo $emailerror; }?>       
                             </div>
                          
                        </div>
                       
                        <div class="form-group">
                            <input type="text" class="form-input"  placeholder="Your Address" name="address" required value="<?php echo $address; ?>" />
                           
                        </div>
                         <div class="form-group">
                            <input type="text" class="form-input"  placeholder="Your Phone-Number" name="phone" required value="<?php echo $phone; ?>" />
                             <div style="color:red; ">
                                <?php if (isset($errormobile)) 
                                { echo $errormobile; }?>       
                            </div>
                           
                        </div>
                       
                         <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" required />
                             <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            <div style="color:red; ">
                                <?php if (isset($errorpass2)) 
                                { echo $errorpass2; }?>       
                            </div>

                            
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="con_password" id="password" placeholder="Confirm-Password" required/>
                              <div style="color:red; ">
                                <?php if (isset($erorrpass1)) 
                                { echo $erorrpass1; }?>       
                             </div>

                        </div>

                         <div class="form-group">
                        
                            <input type="submit" name="submit"  class="form-submit" value="Sign up"  />
                        </div>               

                    </form>
                     
                       <div class="register-link">
                                <p>
                                    Already have an account?
                                    <a href="slogin.php">Sign-in Here</a>
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