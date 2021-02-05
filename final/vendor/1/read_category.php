<?php
include "include/categoryClass.php";
$erorr=0;
$a=new Category();
include "include/vendor_header.php";
?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title ">All Category </h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Insert</th>
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
                             echo "<td>{$row['cat_name']}</td>";
                             echo "<td>{$row['cat_desc']}</td>";
                             echo "<td><img src='../../admin/1templete/image/category/{$row['cat_img']}' width='100'></td>";
                             echo "<td><a href='manage_product.php?cat_id={$row['cat_id']}' class='btn btn btn-primary btn-sm'>Add Product</a></td>";
                             
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
