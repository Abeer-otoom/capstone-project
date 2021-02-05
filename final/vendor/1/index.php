<?php
include "include/vendorClass.php";
include "include/vendor_header.php";

$erorr=0;
$a=new Vendor();
$id=$_SESSION['vendor_id'];
?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title ">All Order </h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Customer_Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Order_id</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>View</th>
                       
                       </thead>
                       <tbody>
                      <?php 
                      $i=1;
                      if ($data=$a->readorder($id)) 
                      {  

                        foreach ($data as $key => $value) 
                        {
                          
                             echo "<tr>";
                             echo "<td>$i</td>";
                             echo "<td>{$value['name']}</td>";
                             echo "<td>{$value['address']}</td>";
                             echo "<td>{$value['email']}</td>";
                             echo "<td>{$value['phone']}";
                             echo "<td>{$value['order_id']}";
                             echo "<td>{$value['date']}</td>";
                             echo "<td>{$value['total']}</td>";
                            echo "<td>
                            <a href='order_detail.php?custom_id={$value['id']}&order_id={$value['order_id']}' class='btn btn btn-primary btn-sm'>View Detail</a></td>";
                            
                             
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
