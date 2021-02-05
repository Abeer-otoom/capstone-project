<?php
include "include/vendor_header.php";
include "include/vendorClass.php";
$id=$_SESSION['vendor_id'];
$x=new Vendor();
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
                    echo "<img class='img' src='../../admin/1templete/image/vendor/{$dataset['logo']}' />";
                    ?>
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Vendor</h6>
                  <h4 class="card-title">
                    <?php echo $dataset['name']; ?>
                  </h4>
                  <p class="card-description">
                   Email Address: <?php echo $dataset['email']; ?>
                   <p class="card-description">
                   <?php echo $dataset['website']; ?>
                 </p>
                  </p>
                  <p class="card-description">
                   Password: <?php echo $dataset['password']; ?>
                  </p>
                  <p class="card-description">
                   <?php echo $dataset['vdesc']; ?>
                  </p>
                  <?php
                   echo "<a href='manage_vendor.php?id=$id' class='btn btn-primary btn-round'>Update Info</a>";
                   ?>
                 
                </div>
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