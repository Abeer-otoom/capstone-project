<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
include('../include/vendorClass.php');
$x = new Vendor();
$name      ="";
$email     = "";
$website   = "";
$conpass   = "";
$pass      ="";
$desc      ="";
$error     =0;

 if(isset($_POST['submit'])){
    $name       =$_POST['full_name'];
    $email      = $_POST['email'];
    $website    = $_POST['website'];
    $conpass    = $_POST['con_pass'];
    $pass       =$_POST['pass'];
    $desc       =$_POST['desc'];
   

    if ($conpass != $pass) 
    {  
       $errorcon=" * Password not match !!";
       $error=1;

    }
    if (! filter_var($email,FILTER_VALIDATE_EMAIL)) 
    {
       $emailerror=" * Invaild email format";
       $error=1;
    }
     if ( ! preg_match("/^[A-Z]/", $pass) || strlen($pass) < 8) 
      {
    
       $errorpass=" * Password must start with upper case letter/ at least 8 characters";
       $error=1;
      }
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
    {
       $errorwebsite = " * Invalid URL";
       $error=1;
    }
    if ($error == 0) 
    {   
        $x->name        = $name;
        $x->email       = $email;
        $x->password    = $pass;
        $x->website     = $website;
        $x->vdesc       =$desc;
        $x->logo        = $_FILES['logo']['name'];
        $tmp_name       = $_FILES['logo']['tmp_name'];
        $path           ='../../../admin/1templete/image/vendor/'; 
         move_uploaded_file($tmp_name,$path.$x->logo);

        $q=$x->create();
        if ($q) 
        {
            echo " <script type='text/javascript'>
                   $(document).ready(function(){ $('#myModal').show(); });
                    </script> ";
        }   
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
    <link rel="stylesheet" href="css/style.css">
    
     <style type="text/css">
       body {
  font-size: 14px;
  line-height: 1.8;
  color: #222;
  font-weight: 400;
  font-family: 'Montserrat';
  background-color: #87CFDD;
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
                    <form method="POST" id="signup-form" class="signup-form" enctype='multipart/form-data'>
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="full_name"  placeholder="Vendor Name"
                            value="<?php echo $name ; ?>"  required />
                        </div>
                         <div class="form-group">
                          <label>Description</label>
                           <textarea name="desc" class="form-input" >
                             <?php echo $desc; ?>
                           </textarea>
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
                            <input type="text" class="form-input"  placeholder="Your Website" name="website" required value="<?php echo $website; ?>" />
                            <div style="color:red; ">
                                <?php if (isset($errorwebsite)) 
                                { echo $errorwebsite; }?>       
                             </div>
                            
                        </div>
                       
                         <div class="form-group">
                            <input type="password" class="form-input" name="pass" id="password" placeholder="Password" value="<?php echo $pass;?>" required />
                             <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            <div style="color:red; ">
                                <?php if (isset($errorpass)) 
                                { echo $errorpass; }?>       
                            </div>

                            
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="con_pass" id="password" placeholder="Confirm-Password" required/>
                              <div style="color:red; ">
                                <?php if (isset($errorcon)) 
                                { echo $errorcon; }?>       
                             </div>

                        </div>
                        <div class="form-group">
                            <label>Upload Logo Image:</label>
                            <input type="file" name ="logo" class="form-input"  placeholder="logo" 
                                   required/>
                        </div>


                         <div class="form-group">
                        
                            <input type="submit" name="submit"  class="form-submit" value="Sign up"/>
                        </div>               

                    </form>
                     <br>
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
<div class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"  
id="myModal"><!-- model start -->
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <center><h3 class="modal-title">Welcome</h3></center>
        </div>
        
        <!-- Modal body -->
               
               <div class=' modal-body alert alert-success text-center h2 '>
                <h3>Thank You</h3>
               your request will be processed
              </div>
         
        
        
        <!-- Modal footer -->
        <div class="modal-footer h3 ">
          <a href="slogin.php" class="btn btn-primary btn-lg" data-dismiss="modal">Ok</a>
        </div>
        
      </div>
    </div>
  </div> <!-- model end -->
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>