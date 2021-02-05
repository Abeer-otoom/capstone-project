<?php
include "include/vendor_header.php";
include "include/productClass.php";
if (isset($_GET['cat_id'])) 
{
  $category_id=$_GET['cat_id'];
}

$vendor_id=$_SESSION['vendor_id'];
$c=new Category();
$p=new Product();
$pro_name="";
$desc="";
$price="";
$category="";
if (isset($_POST['submit'])) 
{
  $pro_name=$_POST['name'];
  $desc    =$_POST['desc'];
  $price   =$_POST['price'];
  $category=$_POST['select'];

  $p->pro_name  =$pro_name;
  $p->pro_desc  =$desc;
  $p->pro_price =$price;
  $p->cat_id    =$category;
  $p->vendor_id =$vendor_id;



  $p->pro_image=$_FILES['pro_img']['name'];
  $tmp_name=$_FILES['pro_img']['tmp_name'];
  $path='../../admin/1templete/image/product/';
   
  move_uploaded_file($tmp_name,$path.$p->pro_image);

  $query=$p->create();
    

 
}

?>
    



     <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title">Manage Product</h3>
                  <p class="card-category">Insert New Product </p>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data" >
                    <div class="row">
                      <div class="col-md-5">
                         <div class="form-group">
                          <label class="bmd-label-floating">Product-Name</label>
                          <input type="text" class="form-control" name="name" required
                                 value="<?php echo $pro_name; ?>">
                        </div>
                      </div>
                     

                      <div class="col-md-7">
                       
                        <div class="form-group">
                            <label class="bmd-label-floating">Description</label>
                          <input type="text" class="form-control" name="desc" required
                                 value="<?php echo $desc; ?>">
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                         <div class="form-group">
                          <label class="bmd-label-floating">Product-Price</label>
                          <input type="number" class="form-control" name="price" required
                                 value="<?php echo $price; ?>" min="1" name="price">
                        </div>
                      </div>

                      
                      
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group-inner">
                          <label class="bmd-label-floating">product-Image</label>
                          <input type="file" class="form-control" name="pro_img" >
                        </div>
                      </div>
                       <div class="col-md-5">
                         <div class="form-group">
                           <label class="bmd-label-floating">Ctegory-Name: </label>
                         <select  name="select">
                           <option value="0">Please Select Category</option>
                           <?php
                            if ($data=$c-> readAll()) 
                             {
                              foreach ($data as $key => $value) 
                              {
                                foreach ($value as $k => $v) {$row[$k]=$v;}
                                 echo "<option value='{$row['cat_id']}'";
                                 if (isset($category_id)) 
                                 {
                                    if ($row['cat_id']==$category_id) 
                                    {
                                       echo " selected ";
                                      
                                    }
                                     
                                 }
                                  echo ">";
                                 echo $row['cat_name'];
                                 echo " </option>";
                              }
                             }
                           ?>
                         </select>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary pull-right" name="submit">Save</button>
                    <div class="clearfix"></div></div>
                  </form>
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
                  <h3 class="card-title "> My Product </h3>
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
                        <th>Edit</th>
                        <th>Delete</th>
                       </thead>
                       <tbody>
                      <?php 

                      $i=1;
                      if ($data=$p-> readAll()) 
                      {
                        foreach ($data as $key => $value) 
                        {
                          foreach ($value as $k => $v) {$row[$k]=$v;}
                             if ($row['vendor_id']==$vendor_id) 
                             {
                              echo "<tr>";
                             echo "<td>$i</td>";
                             echo "<td>{$row['pro_name']}</td>";
                             echo "<td>{$row['pro_desc']}</td>";
                             echo "<td>{$row['pro_price']}</td>";
                             echo "<td><img src='../../admin/1templete/image/product/{$row['pro_image']}' width='100'></td>";
                            $data=$c->readById($row['cat_id']);
                            $cat=$data[0];
                            echo "<td>{$cat['cat_name']}</td>";
                             echo "<td><a href='edit_product.php?id={$row['pro_id']}' class='btn btn btn-primary btn-sm'>Edit</a></td>";
                             echo "<td><a href='delete_product.php?id={$row['pro_id']}' class='btn btn-danger 
                                btn-sm '>Delete</a></td>";
                              echo "</tr>";
                              $i++;
                             }
                            
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


