<?php
include "include/categoryClass.php";
$erorr=0;
$a=new Category();
$cat_name="";
$cat_desc="";

if (isset($_POST['submit'])) 
{
  $cat_name=$_POST['name'];
  $cat_desc=$_POST['desc'];
 

  $a->cat_name=$cat_name;
  $a->cat_desc=$cat_desc;
  $a->cat_img=$_FILES['cat_img']['name'];
  $tmp_name=$_FILES['cat_img']['tmp_name'];
  $path='image/category/';
   
  move_uploaded_file($tmp_name,$path.$a->cat_img);

  $query=$a->create();
      
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
                  <h3 class="card-title">Manage Category</h3>
                  <p class="card-category">Insert New category </p>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data" >
                    <div class="row">
                      <div class="col-md-5">
                         <div class="form-group">
                          <label class="bmd-label-floating">Category-Name</label>
                          <input type="text" class="form-control" name="name" required
                                 value="<?php echo $cat_name;?>">
                        </div>
                      </div>
                      <div class="col-md-1"></div>

                      <div class="col-md-5">
                       
                        <div class="form-group">
                           <label>Description</label>
                           <textarea name="desc" class="form-input" cols="50" rows="3">
                             <?php echo $cat_desc; ?>
                           </textarea>
                        </div>

                      </div>
                      <div class="col-md-3">
                        <div class="form-group-inner">
                          <label class="bmd-label-floating">Ctegory-Image</label>
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
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title "> All Category </h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                             echo "<td><img src='image/category/{$row['cat_img']}' width='100'></td>";
                            
                             echo "<td><a href='edit_category.php?id={$row['cat_id']}' class='btn btn btn-primary btn-sm'>Edit</a></td>";
                             echo "<td><a href='delete_category.php?id={$row['cat_id']}' class='btn btn-danger 
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
