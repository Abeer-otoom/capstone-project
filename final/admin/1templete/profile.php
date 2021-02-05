<?php
include "include/admin_header.php";
include "include/adminClass.php";
$id=$_SESSION['id'];
$x=new Admin();
$data=$x->readById($id);
$dataset=$data[0];


?>
        <div class="content">
        <div class="container-fluid">
          <div class="row">
          	<div class="col-md-3">
          	</div>
            <div class="col-md-6">
             <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#">
                    <?php
                    echo "<img class='img' src='image/admin/{$dataset['admin_img']}' />";
                    ?>
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Administer</h6>
                  <h4 class="card-title">
                    <?php echo $dataset['admin_name']; ?>
                  </h4>
                  <p class="card-description">
                   Email Address: <?php echo $dataset['admin_email']; ?>
                  </p>
                  <p class="card-description">
                   Password: <?php echo $dataset['admin_password']; ?>
                  </p>
                  <?php
                   echo "<a href='edit_admin.php?id=$id' class='btn btn-primary btn-round'>Update Info</a>";
                   ?>
                 
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