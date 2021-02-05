
<?php
include "include/public_header.php";
include "include/productClass.php";
$id=$_GET['cat_id'];
$p=new Product();
?>
 <!-- Featured Product Start -->
        <div class="featured-product product">
        	<div class='row align-items-center product-slider '>
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Choose your favorite brand</h1>
                </div>
                <div class="card-deck">
                <?php
                if ($data=$p->readByvendor($id)) 
                {
                	foreach ($data as $key => $value)
                	 {
                		
                		echo "
                		<div class='card' style='max-width: 19rem; '>
                		  <li class='list-group-item'>

						<img class='card-img-top' src='../admin/1templete/image/vendor/{$value['logo']}' height='190'></li>

						<div class='card-body'>
                         <h3 class='card-title' style='color:#FF6F61'>{$value['name']}</h3>
						    
						  <p class='card-text' style='color:#FF6F61'>{$value['vdesc']}</p>
						    <p class='card-text' style='color:#FF6F61'><a href='{$value['website']}'>Visit Website:{$value['name']}</a></p>
						</div>

						 <a href='product-list.php?ven_id={$value['vendor_id']}&cat_id=$id' class='btn btn-primary '><i class='fa fa-shopping-cart'></i> Shop Now</a>
						 
						
						</div>";
                		
                	

                	}
                }







                 ?>
                 </div>
             </div>

            
		   </div>
</div>
</div>


        <!-- Featured Product End -->     
<?php include "include/public_footer.php"; ?>