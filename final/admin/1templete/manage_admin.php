<?php
include "include/adminClass.php";
$erorr=0;
$a=new Admin();
$name="";
$password="";
$email="";
$con_password="";

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
     $a->admin_img=$_FILES['admin_img']['name'];
     $tmp_name=$_FILES['admin_img']['tmp_name'];
     $path='image/admin/';
   
  move_uploaded_file($tmp_name,$path.$a->admin_img);

     $query=$a->create();
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
                  <p class="card-category">Insert New Admin </p>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data" >
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
                      <div class="col-md-3">
                        <div class="form-group-inner">
                          <label class="bmd-label-floating">Admin-Image</label>
                          <input type="file" class="form-control" name="admin_img" >
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
                  <h3 class="card-title ">Print All Admin </h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                       </thead>
                       <tbody>
                      <?php 
                      $i=1;
                      if ($data=$a-> readAll()) 
                      {
                        foreach ($data as $key => $value) 
                        {
                          foreach ($value as $k => $v) {$row[$k]=$v;}
                             echo "<tr>";
                             echo "<td>$i</td>";
                             echo "<td>{$row['admin_name']}</td>";
                             echo "<td>{$row['admin_email']}</td>";
                             echo "<td>{$row['admin_password']}</td>";
                             echo "<td><img src='image/admin/{$row['admin_img']}' width='100' height='100'></td>";
                             echo "<td><a href='edit_admin.php?id={$row['admin_id']}' class='btn btn btn-primary btn-sm'>Edit</a></td>";
                             echo "<td><a href='delete_admin.php?id={$row['admin_id']}' class='btn btn-danger 
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
