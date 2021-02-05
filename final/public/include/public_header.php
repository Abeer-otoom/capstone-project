<?php session_start();
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Fashion Boutique</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/Capture1.png" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
          
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="index.php#cat" class="nav-item nav-link">Category</a>
                            <a href="index.php#pro" class="nav-item nav-link">Featured Products</a>
                            <a href="cart.php" class="nav-item nav-link">Cart</a>
                        </div>
                        <div class="navbar-nav ml-auto">
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['customer_id']))
                        {
                           echo 
                             "<div class='nav-item dropdown'>
                                <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>My Account</a>
                                <div class='dropdown-menu'>
                                    <a href='signup/updateinfo.php' class='dropdown-item'>Update Account</a>
                                    <a href='signup/logout.php' class='dropdown-item'>Logout</a>
                                    
                                    
                                </div>
                             </div>";
                        }
                        else
                        {   echo "<div class='navbar-nav ml-auto'>
                            <div class='nav-item dropdown'>
                                <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>Login/Register</a>
                                <div class='dropdown-menu'>
                                    <a href='../vendor/1/signup/slogin.php' class='dropdown-item'>As Vendor</a>
                                   <a href='signup/slogin.php' class='dropdown-item'>As Customer</a>
                                </div>
                            </div>
                        </div>";
                            
                        }
                   
                         
                    ?>
                    


                 
                           
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="logo">
                            <a href="index.html">
                                <img src="img/Capture1.png" alt="Logo"  >
                                <img src="img/Capture.png" alt="Logo" width="200">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            
                            <a href="cart.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                            
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End --> 
