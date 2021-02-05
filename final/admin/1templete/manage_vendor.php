<?php
include "include/vendorClass.php";
include "include/admin_header.php";
$v=new Vendor();
?>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title ">All Vendor </h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Logo</th>
                       
                        <th>Website</th>
                        <th></th>
                        <th></th>
                        <th></th>
                       </thead>
                       <tbody>
                      <?php 
                      $i=1;
                      if ($data=$v-> readAll()) 
                      {
                        foreach ($data as $key => $value) 
                        {
                          foreach ($value as $k => $v) {$row[$k]=$v;}
                             echo "<tr>";
                             echo "<td>$i</td>";
                             echo "<td>{$row['name']}</td>";
                             echo "<td>{$row['email']}</td>";
                             echo "<td>{$row['password']}</td>";
                             echo "<td><img src='image/vendor/{$row['logo']}' width='100' height='100' alt='No img'></td>";
                             
                              echo "<td>{$row['website']}</td>";
                              if ($row['accept']=='No') 
                              {
                               echo "<td><a href='accept.php?id={$row['vendor_id']}' class='btn btn btn-primary btn-sm'>Accept</a></td>";
                               echo "<td><a href='reject.php?id={$row['vendor_id']}' class='btn btn-danger 
                                btn-sm '>Reject</a></td>";
                              }
                              else
                              {
                                 echo "<td><a href='delete_vendor.php?id={$row['vendor_id']}' class='btn btn-danger 
                                btn-sm '>Delete</a></td>";
                              }
                             
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
