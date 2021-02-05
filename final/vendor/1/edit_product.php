<?php

include "include/productClass.php";

$pro_id=$_GET['id'];

$c=new Category();
$p=new Product();
$data=$p-> readById($pro_id);
$dataset=$data[0];
$pro_name="";
$desc="";
$price="";
$category="";
if (isset($_POST['submit'])) 
{ session_start();
  $pro_name=$_POST['name'];
  $desc    =$_POST['desc'];
  $price   =$_POST['price'];
  $category=$_POST['select'];
  $vendor_id=$_SESSION['vendor_id'];

  $p->pro_name  =$pro_name;
  $p->pro_desc  =$desc;
  $p->pro_price =$price;
  $p->cat_id    =$category;
  $p->vendor_id =$vendor_id;


 if ($_FILES['pro_img']['name'])
   {
   $p->pro_image = $_FILES['pro_img']['name'];
   }
   else
   { $p->pro_image  = $dataset['pro_image']; }
    
      $tmp_name  = $_FILES['pro_img']['tmp_name'];
      $path      ='../../admin/1templete/image/product/'; 
      move_uploaded_file($tmp_name,$path.$p->pro_image);
  
  $query=$p->update($pro_id);

  if ($query) 
  {
    header("location:manage_product.php");
  }
    

 
}
include "include/vendor_header.php";
?>
    



     <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title">Manage Product</h3>
                  <p class="card-category">Update Product </p>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data" >
                    <div class="row">
                      <div class="col-md-5">
                         <div class="form-group">
                          <label class="bmd-label-floating">Product-Name</label>
                          <input type="text" class="form-control" name="name" required
                                 value="<?php echo $dataset['pro_name']; ?>">
                        </div>
                      </div>
                     

                      <div class="col-md-7">
                       
                        <div class="form-group">
                            <label class="bmd-label-floating">Description</label>
                          <input type="text" class="form-control" name="desc" required
                                 value="<?php echo $dataset['pro_desc']; ?>">
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                         <div class="form-group">
                          <label class="bmd-label-floating">Product-Price</label>
                          <input type="number" class="form-control" name="price" required
                                 value="<?php echo $dataset['pro_price']; ?>" min="1" name="price">
                        </div>
                      </div>

                      
                      
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                         <div class="form-group-inner">

                              <label class="bmd-label-floating">Product-Image:</label>
                             <?php
                             echo "<img src='../../admin/1templete/image/product/{$dataset['pro_image']}' width='150' height='100'>";
                             ?>
     
                        </div>
                      </div>
                        <div class="form-group-inner">
                          <label class="bmd-label-floating">If you want change image:</label>
                          <input type="file" class="form-control" name="pro_img" >
                        </div>
                      </div>
                    
                    <div class="row">
                      <div class="col-md-3">
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
                                 if ($row['cat_id']==$dataset['cat_id']) 
                                 {
                                  echo " selected ";
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
                    <div class="clearfix"></div>
                    </div>
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


