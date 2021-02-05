<?php
include "include/categoryClass.php";
$erorr=0;
$a=new Category();
$cat_id=$_GET['id'];
$data=$a-> readById($cat_id);
$dataset=$data[0];
$cat_name="";
$cat_desc="";

if (isset($_POST['submit'])) 
{
  $cat_name=$_POST['name'];
  $cat_desc=$_POST['desc'];
 

  $a->cat_name=$cat_name;
  $a->cat_desc=$cat_desc;

  if ($_FILES['cat_img']['name'])
   {
   $a->cat_img = $_FILES['cat_img']['name'];
   }
   else
   { $a->cat_img  = $dataset['cat_img']; }
    
      $tmp_name  = $_FILES['cat_img']['tmp_name'];
      $path      ='image/category/'; 
      move_uploaded_file($tmp_name,$path.$a->cat_img);
  
   $query=$a->update($cat_id);
      
  if ($query) 
    {
        header("location:manage_category.php");
    }   

}
include "include/admin_header.php";
?>
    



     <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title">Edit Category</h3>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data" >
                    <div class="row">
                      <div class="col-md-5">
                         <div class="form-group">
                          <label class="bmd-label-floating">Category-Name</label>
                          <input type="text" class="form-control" name="name" required
                                 value="<?php echo $dataset['cat_name'];?>">
                        </div>
                      </div>
                      <div class="col-md-1"></div>

                      <div class="col-md-5">
                       
                        <div class="form-group">
                           <label>Description</label>
                           <textarea name="desc" class="form-input" cols="50" rows="3"><?php 
                              echo $dataset['cat_desc']; ?>
                           </textarea>
                        </div>

                      </div>
                      <div class="form-group-inner">

                             Category-Image:
                             <?php
                             echo "<img src='image/category/{$dataset['cat_img']}' width='150' height='100'>";
                             ?>
     
                        </div>

                     
                    </div>
                    <div class="row">
                       <div class="col-md-3">
                        <div class="form-group-inner">
                          <label class="bmd-label-floating">If you want change image</label>
                          <input type="file" class="form-control" name="cat_img" >
                        </div>
                      </div>
                    </div>
                    
               
                    <button type="submit" class="btn btn-primary pull-right" name="submit">Save</button>
                    <div class="clearfix"></div>
                  </form>
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
