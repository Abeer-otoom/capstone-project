<?php
include "include/admin_header.php";
$conn=mysqli_connect("localhost","root","","capstone");
?>

 
     <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">storefront</i>
                  </div>
                  <?php
                  $query="SELECT COUNT(vendor.vendor_id) As num FROM vendor";
                  $result=mysqli_query($conn,$query);
                  $row=mysqli_fetch_assoc($result);
                  echo " <p class='card-category'># Of Vendors</p>";
                  echo " <h3 class='card-title'>{$row['num']} </h3> ";
                  ?>
                </div>
                 <div class="card-footer">
                  <div class="stats">
                   
                  </div>
                </div>
                
              </div>
            </div>





            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">group</i>
                  </div>
                   <?php
                  $query1="SELECT COUNT(customer.id) As num FROM customer";
                  $result1=mysqli_query($conn,$query1);
                  $row=mysqli_fetch_assoc($result1);
                  echo " <p class='card-category'># Of Customers</p>";
                  echo " <h3 class='card-title'>{$row['num']} </h3> ";
                  ?>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">bubble_chart</i>
                  </div>
                   <?php
                  $query2="SELECT COUNT(product.pro_id) As num FROM product";
                  $result2=mysqli_query($conn,$query2);
                  $row=mysqli_fetch_assoc($result2);
                  echo " <p class='card-category'># Of Product</p>";
                  echo " <h3 class='card-title'>{$row['num']} </h3> ";
                  ?>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <?php
                  $query3="SELECT COUNT(category.cat_id) As num FROM category";
                  $result3=mysqli_query($conn,$query3);
                  $row=mysqli_fetch_assoc($result3);
                  echo " <p class='card-category'># Of Category</p>";
                  echo " <h3 class='card-title'>{$row['num']} </h3> ";
                  ?>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title ">Top 5 Vendor  </h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Vendor Name</th>
                        <th>Number of Order</th>
              
                       </thead>
                       <tbody>
                      <?php 
                      $i=1;
                      $query4="SELECT vendor.vendor_id,vendor.name,COUNT(vendor.vendor_id)AS 'top' 
                          FROM product,order_item,vendor WHERE product.pro_id=order_item.pro_id AND product.vendor_id=vendor.vendor_id 
                           GROUP BY vendor.vendor_id 
                           ORDER BY top DESC LIMIT 5";
                  $result4=mysqli_query($conn,$query4);
                  while ($row=mysqli_fetch_assoc($result4)) 
                  {    
                         echo "<tr>";
                             echo "<td>$i</td>";
                             echo "<td>{$row['name']}</td>";
                             echo "<td>{$row['top']}</td>";
                       
                              echo "</tr>";
                              $i++;
	                 
	                  
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
      
<?php
include ("include/admin_footer.php");
?>
        
</body>

</html>