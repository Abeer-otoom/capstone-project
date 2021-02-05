<?php
include "include/adminClass.php";
$admin_id=$_GET['id'];
$a=new Admin();
$data=$a->readById($admin_id);
$adminSet=$data[0];


$erorr=0;
if (isset($_POST['submit'])) 
{
  $name=$_POST['name'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $con_password=$_POST['con_password'];

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
  if ($erorr==0) 
  {
     $a->admin_name=$name;
     $a->admin_email=$email;
     $a->admin_password=$password;
     if ($_FILES['admin_img']['name'])
       {
       $a->admin_img = $_FILES['admin_img']['name'];
       }
    else
        { $a->admin_img  = $adminSet['admin_img']; }
    
      $tmp_name  = $_FILES['admin_img']['tmp_name'];
      $path      ='image/admin/'; 
      move_uploaded_file($tmp_name,$path.$a->admin_img);
     $query=$a->update($admin_id);
      if ($query) 
        {
            header("location:manage_admin.php");
        }   
  }
}
include "include/admin_header.php";


?>
    



     <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title">Manage Admin</h3>
                  <p class="card-category">Admin data update </p>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                          <label class="bmd-label-floating">Full-Name</label>
                          <input type="text" class="form-control" name="name" required
                                 value="<?php echo $adminSet['admin_name']; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="text" class="form-control" name="email" required
                                  value="<?php echo $adminSet['admin_email'];?>">
                           <div style="color:red; ">
                          <?php if (isset($emailerror)) {echo $emailerror;} ?>
                           </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="password" required
                                  value="<?php echo $adminSet['admin_password'];?>">
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
                       <div class="form-group-inner">

                             Admin-Image:
                             <?php
                             echo "<img src='image/admin/{$adminSet['admin_img']}' width='150' height='100'>";
                             ?>
     
                        </div>

                      <div class="col-md-3">
                        <div class="form-group-inner">
                          <label class="bmd-label-floating">Admin-Image</label>
                          <input type="file" class="form-control" name="admin_img" >
                        </div>
                      </div>
                    </div>
                    
               
                    <button type="submit" class="btn btn-primary pull-right" name="submit">Update</button>
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
