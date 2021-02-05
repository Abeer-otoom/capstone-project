<?php
include "include/admin_header.php";
include "include/vendorClass.php";

$p=new Product();
$c=new Category();
$a=new Vendor();



?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title "> All Product </h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Vendor</th>
                        <th>Delete</th>
                       </thead>
                       <tbody>
                        <?php
                        $i=1;
                        if ($data=$p->readAll()) 
                        {
                          foreach ($data as $key => $value) 
                          { 
                            foreach ($value as $k => $v) {$row[$k]=$v;}
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>{$row['pro_name']}</td>";
                            echo "<td>{$row['pro_desc']}</td>";
                            echo "<td>{$row['pro_price']}</td>";
                            echo "<td><img src='image/product/{$row['pro_image']}' width='130'></td>";
                            $category=$c->readById($row['cat_id']);
                            $cat_data=$category[0];
                            echo "<td>{$cat_data['cat_name']}</td>";

                            $vendor=$a->readById($row['vendor_id']);
                            $ven_data=$vendor[0];
                            echo "<td>{$ven_data['name']}</td>";
                             echo "<td><a href='delete_product.php?id={$row['pro_id']}' class='btn btn-danger 
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
