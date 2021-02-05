<?php
include "include/vendor_header.php";
include "include/vendorClass.php";
$erorr=0;
$x=new Vendor();
$vendor_id=$_SESSION['vendor_id'];
$data=$x->readById($vendor_id);
$dataset=$data[0];

$name      ="";
$email     = "";
$website   = "";
$conpass   = "";
$pass      ="";
$error     =0;

 if(isset($_POST['submit'])){
    $name       =$_POST['name'];
    $email      = $_POST['email'];
    $website    = $_POST['website'];
    $conpass    = $_POST['con_password'];
    $pass       =$_POST['password'];
   

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
    if ( ! preg_match("/^[A-Z][a-zA-Z0-9]+$/", $pass)) 
    {
       $errorpass=" * Password must start with upper case letter and contain letters and digits";
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
         
        if ($_FILES['logo']['name'])
         {
         $x->logo = $_FILES['logo']['name'];
         }
         else
         { $x->logo   = $dataset['logo']; }
          
          $tmp_name  = $_FILES['logo']['tmp_name'];
          $path      ='../../admin/1templete/image/vendor/'; 

         
       
       
       move_uploaded_file($tmp_name,$path.$x->logo);

       $query=$x->update($vendor_id);
       
    }         
}

?>
    



     <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title">Update Your Info</h3>
                
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data" >
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name" 
                                 value="<?php echo $dataset['name'];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control" name="email" 
                                  value="<?php  echo $dataset['email'];?>">
                           <div style="color:red; ">
                          <?php if (isset($emailerror)) {echo $emailerror;} ?>
                           </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                         
                          <input type="password" class="form-control" name="password" 
                                  value="<?php echo $dataset['password'];?>"  id="myInput">
                                   <input type="checkbox" onclick="myFunction()">Show
                            <div style="color:red; ">
                           <?php if (isset($errorpas)) {echo $errorpas;} ?>
                           </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm-Password</label>
                          <input type="password" class="form-control" name="con_password" 
                                  id="myInput1" value="<?php echo $dataset['password'];?>">
                                  <input type="checkbox" onclick="myFunction1()">Show

                            <div style="color:red; ">
                           <?php if (isset($errorcon)) {echo $errorcon;} ?>
                            </div>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-3">
                        <div class="form-group-inner">

                             Your Logo 
                             <?php
                             echo "<img src='../../admin/1templete/image/vendor/{$dataset['logo']}' width='150' height='100'>";
                             ?>
     
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group-inner">
                          <label class="bmd-label-floating">If you want to change logo</label>
                          <input type="file" class="form-control" name="logo" >
                        </div>
                      </div>
                     
                    </div>
                    <div class="row">
                    </div>
                    <div class="row">
                     <div class="col-md-5">
                        <div class="form-group-inner">
                          <label class="bmd-label-floating">Website</label>
                          <input type="text" class="form-control" name="website" 
                                  value="<?php echo $dataset['website']; ?>">
                          <div style="color:red; ">
                                <?php if (isset($errorwebsite)) 
                                { echo $errorwebsite; }?>       
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
include ("include/vendor_footer.php");
?>
        
</body>

</html>
