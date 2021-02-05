<?php 
include "include/public_header.php";
include "include/productClass.php";
$p=new Product();
$ven_id=$_GET['ven_id'];
$cat_id=$_GET['cat_id'];
$c=new Category();
?>
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php#cat">Category</a></li>
                    <li class="breadcrumb-item active">Product List</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <?php
                            if ($data=$p->readproduct($ven_id,$cat_id)) 
                            {
                               foreach ($data as $key => $value) 
                               {
                                  foreach ($value as $k => $v) {$row[$k]=$v;}
                                  echo "<div class='col-md-4'>";
                                  echo " <div class='product-item'>
                                    <div class='product-title'>
                                        <a href='#'>{$row['pro_name']}</a>";
                                  echo "</div>";
                                  echo " <div class='product-image'>
                                        <a href=''>
                                            <img src='../admin/1templete/image/product/{$row['pro_image']}' height='220'>
                                        </a>";
                                  echo "</div>";
                                  echo "<div class='product-price'>
                                        <h3><span>Jd</span>{$row['pro_price']}</h3>
                                        <a class='btn' href='product-detail.php?pro_id={$row['pro_id']}&cat_id=$cat_id'><i class='fa fa-shopping-cart'></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>";

                               }
                            }

                           
                                   
                                       
                                    
                                    
                            ?>




                        </div>
                        

                    </div>           
                    
                    <!-- Side Bar Start -->
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
        <!-- Product List End -->  
      <?php include "include/public_footer.php";?>