<?php
include "include/customerClass.php";
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

     $query=$c->create();
      if ($query) 
        {
            header("location:manage_customer.php");
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
                  <h3 class="card-title">Manage Customer</h3>
                  <p class="card-category">Insert New Customer </p>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                          <label class="bmd-label-floating">Full-Name</label>
                          <input type="text" class="form-control" name="name" required
                                 value="<?php echo $name;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="text" class="form-control" name="email" required
                                  value="<?php echo $email;?>">
                           <div style="color:red; ">
                          <?php if (isset($emailerror)) {echo $emailerror;} ?>
                           </div>
                        </div>
                      </div>
                      
                    </div>
                 
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name="address" required
                                 value="<?php echo $address;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group">
                          <label class="bmd-label-floating">Phone Number</label>
                          <input type="text" class="form-control" name="phone" required
                                  value="<?php echo $phone;?>">
                           <div style="color:red; ">
                          <?php if (isset($errormobile)) {echo $errormobile;} ?>
                           </div>
                        </div>
                      </div>
    
                      
                    </div>

                       <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="password" required
                                  value="<?php echo $password;?>">
                            <div style="color:red; ">
                           <?php if (isset($errorpass2)) {echo $errorpass2;} ?>
                           </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm-Password</label>
                          <input type="password" class="form-control" name="con_password" required
                                  value="<?php echo $con_password;?>">
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
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title ">Print All Customer </h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Edit</th>
                        <th>Delete</th>
                       </thead>
                       <tbody>
                      <?php 
                      $i=1;
                      if ($data=$c-> readAll()) 
                      {
                        foreach ($data as $key => $value) 
                        {
                          foreach ($value as $k => $v) {$row[$k]=$v;}
                             echo "<tr>";
                             echo "<td>$i</td>";
                             echo "<td>{$row['name']}</td>";
                             echo "<td>{$row['email']}</td>";
                             echo "<td>{$row['password']}</td>";
                             echo "<td>{$row['address']}</td>";
                             echo "<td>{$row['phone']}</td>";
                             echo "<td><a href='edit_customer.php?id={$row['id']}' class='btn btn btn-primary btn-sm'>Edit</a></td>";
                             echo "<td><a href='delete_customer.php?id={$row['id']}' class='btn btn-danger 
                                btn-sm '>Delete</a></td>";
                              echo "</tr>";
                              $i++;
                        }
                      }
                      ?>
                     </tbody>
                    </table>
                  </div>
                </div>
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
