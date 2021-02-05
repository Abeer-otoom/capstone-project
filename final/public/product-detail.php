<?php include"include/public_header.php";

include "include/productClass.php";

$pro_id=$_GET['pro_id'];
$cat_id=$_GET['cat_id'];
$p=new Product();
$c=new Category();
$data=$p->readById($pro_id);
$dataset=$data[0];
 if (isset($_POST['addcart'])) 
{ 
   if ($cat_id==10) 
   {
      $size=$_POST['size'];
      $size_num=$_POST['num_pro'] ." / " . $size;
      $_SESSION['item'][$pro_id]=$size_num;
      $messge="Added to cart";
   } 
   else
   {
      $size_num=$_POST['num_pro'];
      $_SESSION['item'][$pro_id]=$size_num;
      $messge="Added to cart";
   }

 
}
if (isset($_POST['post'])) 
{
   
   $p->name=$_POST['name'];
   $p->email=$_POST['email'];
   $p->feedback_text=$_POST['text'];
   $p->prod_id=$pro_id;
   $p->createF();

}
?>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <?php echo "<li class='breadcrumb-item'>
                             <a href='#'>Products</a></li>";?>
                    <li class="breadcrumb-item active">Product Detail</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <?php
                                    
                                   
                                           echo " <div class='product-slider-single normal-slider'>";
                                           echo " <img src='../admin/1templete/image/product/{$dataset['pro_image']}' alt='Product Image'>";
                                           echo "</div> </div>";
                                           echo "<div class='col-md-7'>
                                                <div class='product-content'>
                                                <div class='title'><h2>{$dataset['pro_name']}</h2></div>";
                                            echo "  <div class='price'>
                                                    <h4>Price:</h4>

                                                    <p>{$dataset['pro_price']} Jd</p>
                                                    </div>";
                                            echo "<form action='' method='post'>";
                                            if ($cat_id==10) 
                                            {  
                                             
                                             echo " <div class='p-size'>
                                            <h4>Size:</h4>";
                                             echo "<select class='custom-select mr-sm-1' 
                                           name='size' style='width:150px;  background-color: #FF6F61; color:white;'>
                                          <option selected>Choose Size</option>
                                          <option value='S'>S</option>
                                          <option value='M'>M</option>
                                          <option value='L'>L</option>
                                           <option value='XL'>XL</option>
                                        </select>";
                                        echo "</div>";
                                        }
                                        
                                       
                                           
                                      ?>
                            
                                <div class='quantity'>
                                   <h4>Quantity:</h4>
                                    
                                    <div class='qty'>
                                       <div class="input-group">
                                            <span class="input-group-prepend">
                                                <button type="button" class="btn btn-outline-secondary btn-number"  data-type="minus" data-field="num_pro">
                                                    <span class="fa fa-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" name="num_pro" value="1" min="1" max="100" style="width: 30px;">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-outline-secondary btn-number" data-type="plus" data-field="num_pro">
                                                    <span class="fa fa-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="action">
                                <button class="btn" name="addcart"><i class="fa fa-shopping-cart"></i>Add to Cart</button></div>
                                </form>
                                    
                                </div>
                                                                    <?php
                                        if (isset($messge)) {echo "<div class='alert  alert-primary h4 ' role='alert' style='width:200px; background-color: #FF6F61; color:white;'> $messge </div>";}

                                        ?>
                                </div>
                                     
                                </div>
                            </div>
                        </div>
                   
               
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                   
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Product description</h4>
                                        <p>
                                           <?php echo $dataset['pro_desc']; ?>
                                        </p>
                                    </div>
                                   
                                    <div id="reviews" class="container tab-pane fade">
                                          
                                         <h4>Review:</h4>
                                        <?php
                                        if($data1=$p->readByIdF($pro_id))
                                         {
                                            foreach ($data1 as $key1 => $value1)
                                             {
                                              echo " <div class='reviews-submitted' > ";
                                               echo "<div class='border-top'>";
                                               echo "<div class='reviewer' >{$value1['name']}
                                                      <span>{$value1['fdate']}</span</div>";
                                              
                                               echo "<p>{$value1['feedback_text']}</p>";
                                               echo "</div></div></div>";

                                            }
                                        }
                                        

                                         ?>

                                       </div>
                                        <div class="reviews-submit">
                                            <h4>Give your Review:</h4>
                                          
                                            <form method="post">
                                                 <div class="row form">
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="Name" name="name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="email" placeholder="Email" name="email">
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea placeholder="Feedback" name="text"></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button name="post">Post</button>
                                                </div>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
              
            
           
    




                   <!--  Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                     <?php
                    if ($data=$c->readAll()) 
                    {
                       foreach ($data as $key => $value) 
                       {   foreach ($value as $k => $v) {$row[$k]=$v;}
                                   echo "<li class='nav-item'>
                                        <a class='nav-link' href='vendor.php?cat_id={$row['cat_id']}'>
                                        {$row['cat_name']}</i></a>
                                    </li>";
                        
                                }
                            }
                             ?>  

                                </ul>
                            </nav>
                        </div>
                  
                        
                        <div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
                            <ul>
                                <?php
                                 if ($data=$p->readByvendor($cat_id)) 
                                {
                                 foreach ($data as $key => $value)
                                 {
                                  foreach ($value as $k => $v) {$row[$k]=$v;}
                                  echo "<li><a href='product-list.php?ven_id={$row['vendor_id']}&cat_id=$cat_id' >{$row['name']}</a></li>";
                              }
                          }
                              ?> 
                            </ul>
                        </div>
                        
                       
                    </div> 
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product Detail End -->
        
        
<?php include "include/public_footer.php"?>       