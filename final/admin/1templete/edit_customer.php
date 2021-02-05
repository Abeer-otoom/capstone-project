<?php
include "include/customerClass.php";
$custom_id=$_GET['id'];
$c            =new Customer();
$name         ="";
$password     ="";
$email        ="";
$con_password ="";
$address      ="";
$phone        ="";
$erorr        =0;
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
    
     $query=$c->update($custom_id);
      if ($query) 
        {
            header("location:manage_customer.php");
        }   
  }
}
$data=$c->readById($custom_id);
$customSet=$data[0];

include "include/admin_header.php";
?>
    



     <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title">Edit Customer</h3>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                          <label class="bmd-label-floating">Full-Name</label>
                          <input type="text" class="form-control" name="name" required
                                 value="<?php echo $customSet['name'];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="text" class="form-control" name="email" required
                                  value="<?php echo $customSet['email'];?>">
                           <div style="color:red; ">
                          <?php if (isset($emailerror)) {echo $emailerror;} ?>
                           </div>
                        </div>
                      </div>
                      
                    </div>
                 
                    <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone Number</label>
                          <input type="text" class="form-control" name="phone" required
                                  value="<?php echo $customSet['phone'];?>">
                           <div style="color:red; ">
                          <?php if (isset($errormobile)) {echo $errormobile;} ?>
                           </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name="address" required
                                 value="<?php echo $customSet['address'];?>">
                        </div>
                      </div>
                     
                     
                    </div>


                       <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="password" required
                                  value="<?php echo $customSet['password'];?>">
                            <div style="color:red; ">
                           <?php if (isset($errorpass2)) {echo $errorpass2;} ?>
                           </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm-Password</label>
                          <input type="password" class="form-control" name="con_password" required>
                            <div style="color:red; ">
                           <?php if (isset($erorrpass1)) {echo $erorrpass1;} ?>
                            </div>
                        </div>
                      </div>
                    </div>
               
                    <button type="submit" class="btn btn-primary pull-right" name="submit">Save</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      
<?php
include ("include/admin_footer.php");
?>
        
</body>

</html>
