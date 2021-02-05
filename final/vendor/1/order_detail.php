<?php
include "include/vendorClass.php";
include "include/vendor_header.php";

$a=new Vendor();
$id=$_SESSION['vendor_id'];
$cust_id=$_GET['custom_id'];
$order_id=$_GET['order_id'];

?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title "> Order Detail </h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Product_Name</th>
                        <th>Product_price</th>
                        <th>Quantity / Size </th>
                       </thead>
                       <tbody>
                      <?php 
                      $i=1;
                      if ($data=$a->order_detail($id , $cust_id,$order_id)) 
                      {  
                         
                        foreach ($data as $key => $value) 
                        {
                          
                             echo "<tr>";
                             echo "<td>$i</td>";
                             echo "<td>{$value['pro_name']}</td>";
                             echo "<td>{$value['pro_price']} Jd</td>";
                             echo "<td>{$value['qty_size']}</td>";
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
include ("include/vendor_footer.php");
?>
        
</body>

</html>
