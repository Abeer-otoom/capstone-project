<?php
 include "include/public_header.php";
include "include/orderClass.php";
$O=new Order();

$customer_id= $_SESSION['customer_id']; 
$total=$_SESSION['total'];

$O->cust_id=$customer_id;
$O->total=$total;
$O->createorder();

$data=$O->readorder();
$orderset=$data[0];
$order_id=$orderset['order_id'];

foreach ($_SESSION['item'] as $key => $value) 
{   

    $O->order_id=$order_id;
    $O->pro_id=$key;
    $O->qty_size=$value;
    $O->create_item();
}

?>
    
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Order</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity / Size </th>
                                            <th>Total</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    <?php
                                    $total1=0;
                                    $total=0;
                                    $qty=0;
                                     if (! isset($_SESSION['item']) ) { echo "<div class='alert alert-success h3 text-center' style=' background-color: #FF6F61; color:white;'>No product selected</div>";}
                                    else
                                    {
       
                                       echo "<div class='alert alert-success h3 text-center' style=' background-color: #FF6F61; color:white;'>Your Order Detail </div>";
                                   
                                    foreach ($_SESSION['item'] as $key => $value) 
                                    { 
                                        $data=$O->readById($key);
                                        $v=$data[0]; 
                                            echo "<tr><td>";
                                            echo "<div class='img'>
                                                   <img src='../admin/1templete/image/product/{$v['pro_image']}' alt='Image'>
                                                    <p>{$v['pro_name']}</p>
                                                </div>";
                                            echo "</td>";
                                            echo " <td>{$v['pro_price']} Jd</td>";
                                            echo "<td>$value"; 

                                             if ($v['cat_id']==10) 
                                            {
                                                $a=$value; //divide value to number and size 
                                                $stringarr = explode(" / ",$a);
                                                $v1 = $stringarr[0]; 
                                                $size = $stringarr[1];
                                                

                                             $total=$v['pro_price']*$v1;
                                             $total1+=$total;
                                             echo " </td>";
                                             echo " <td>$total</td>";
                                             echo " </tr>";

                                            }
                                            else
                                            {

                                             $total=$v['pro_price']*$value;
                                             $total1+=$total;
                                             echo " </td>";
                                             echo " <td>$total</td>";
                                            
                                             echo " </tr>";
                                            }

                                           
                                     }
                                 }
                            

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                   
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Cart Summary</h1>
                                            <h2>Total<span><?php echo  $total1; ?></span></h2>
                                            <h2>Payment Methods:</h2>
                                            <h5><span>Cash on Delivery</span></h5>
                                        </div>
                                         <div class="cart-btn text-center" >

                                           <?php
                                           echo "<a href='sucess.php?id=$order_id'><button style='background-color:#FF6F61; color: white;'>
                                                Confirmation
                                            </button> </a>";
                                            ?> 
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->
        
<?php include "include/public_footer.php"?>