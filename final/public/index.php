<?php 
include "include/public_header.php";
include "include/vendorClass.php";
$c=new Category();
$v=new Vendor();
$p=new Product();

?>   
        
        <!-- Main Slider Start ???? category -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item">
                                <img src="img/slider-1.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Everything you need for your beauty is here</p>
                                   
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/slide2.jpg" alt="Slider Image"  width="600"  height="400" />
                                <div class="header-slider-caption">
                                    <p>Take care of the beauty of your skin</p>
                                   
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/slide-5.jpg" alt="Slider Image" height="400" />
                                <div class="header-slider-caption">
                                    <p>Shop the best brands on the same website</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="img/slide3.jpg" />
                                <a class="img-text" href="">
                                    <p>Accessories brands</p>
                                </a>
                            </div>
                            
                             <div class="img-item">
                                <img src="img/slider4.jpg"  />
                                <a class="img-text" href="">
                                    <p>Makeup brands</p>
                                </a>
                            </div>

                        </div>
                    </div>
                     <div class="col-md-3">
   
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <?php 
                    $data=$v->readAll();
                    foreach ($data as $key => $value) 
                    {
                        echo "<div class='brand-item'><img src='../admin/1templete/image/vendor/{$value['logo']}' alt='' width='100'></div>";
                    }

                   
                    ?>
                    
                    
                </div>
            </div>
        </div>
        <!-- Brand End -->           
        
        <!-- Category Start-->
        <div class="category" id="cat">
            <div class="container-fluid">
                <div class="featured-product product">
                     <div class="section-header">
                    <h1>Category</h1>
                </div>
                </div>
               
                <div class="row">
                    <?php
                    if ($data=$c->readAll()) 
                    {
                       foreach ($data as $key => $value) 
                       {
                          
                          echo "<div class='col-md-3 '>";
                          echo "<div class='category-item ch-200'>";
                          echo " <img src='../admin/1templete/image/category/{$value['cat_img']}' />";
                          echo " <a class='category-name'href='vendor.php?cat_id={$value['cat_id']}'>
                                  <p style='font-size: 20px;'>{$value['cat_name']}
                                  <br><i class='fa fa-shopping-cart'></i> Shop Now</p> </a>";     
                          echo "</div>";
                          echo "</div>";
   
                       }
                    }
                    ?>
                </div>
            </div>
        </div>

         <div class="featured-product product" id='pro'>
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Featured Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">

                    <?php
                    if ($data=$p->featureproduct()) 
                    {
                        foreach ($data as $key => $value) 
                        {
                            echo "<div class='col-lg-3'>";
                            echo "<div class='product-item'>";
                            echo "<div class='product-title'>";
                            echo "<a href='#'>{$value['pro_name']}</a>";
                            echo "</div>";  
                            echo "<div class='product-image'>";
                            echo "<a href='product-detail.html'>
                                    <img src='../admin/1templete/image/product/{$value['pro_image']}' height='220'>
                                </a></div>";
                            echo " <div class='product-price'>
                                <h3><span>Jd</span>{$value['pro_price']}</h3>
                                <a class='btn' href='product-detail.php?pro_id={$value['pro_id']}&cat_id={$value['cat_id']}'><i class='fa fa-shopping-cart'></i>Buy Now</a>
                            </div> </div> </div>";
                            
                                
                              
                            
                          
                       
                        }
                    }
                    ?>
                   
                   
                </div>
            </div>
        </div>
        <!-- Featured Product End -->       
        <!-- Category End-->   
<?php include "include/public_footer.php"; ?>    
        
            
        
           
        
       
       