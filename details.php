<?php
session_start();
include('includes/db.php');
include('functions/functions.php');
?>

<?php

if (isset($_GET['pro_id'])) {
    $pro_id=$_GET['pro_id'];
    $get_product="select * from products where product_id='$pro_id'";
    $run_product=mysqli_query($con,$get_product);
    $row_product=mysqli_fetch_array($run_product);

    $cat_id =$row_product['cat_id'];
    $p_cat_id =$row_product['p_cat_id'];
    $p_title=$row_product['product_title'];
    $p_price=$row_product['product_price'];
    $p_desc=$row_product['product_desc'];
    $p_img1=$row_product['product_img1'];
    $p_img2=$row_product['product_img2'];
    $p_img3=$row_product['product_img3'];

    $get_cat="select * from Categories where cat_id ='$cat_id'";
    $run_cat=mysqli_query($con,$get_cat);
    $row_cat=mysqli_fetch_array($run_cat);
    $cat_id=$row_cat['cat_id'];
    $cat_title=$row_cat['cat_title'];

    $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
    $run_p_cat=mysqli_query($con,$get_p_cat);
    $row_p_cat=mysqli_fetch_array($run_p_cat);
    $p_cat_id =$row_p_cat['p_cat_id'];
    $p_cat_title=$row_p_cat['p_cat_title'];

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>E Commerce Store</title>


	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<link rel="stylesheet" href="styles/style.css">

</head>
<body>

	<div id="top">
		<div class="container">
			<div class="col-md-6 offer">
				<a href="#" class="btn btn-success btn-sm">
          <?php
                if (!isset($_SESSION['customer_email'])) {
                    echo "Welcome Guest";
                }
                else {
                    echo "Welcome: " .$_SESSION['customer_email' .""];
                }
                ?></a>
				<a href="#">Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total Items: <?php item(); ?></a>
			</div>	
			<div class="col-md-6">
				<ul class="menu">
					<li><a href="customer_registration.php">Register</a></li>
					<li><a href="checkout.php">My Account</a></li>
					<li><a href="cart.php">Goto Cart</a></li>
					<li>
            <?php

                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>Login</a>";
                            }
                            else {
                                echo "<a href='logout.php'>Logout</a>";
                            }

                            ?> 
          </li>
				</ul>
			</div>	
		</div>
	</div>

	<div id="navbar" class="navbar navbar-default">     <div class="container">
           <div class="navbar-header">
               <a href="index.php" class="navbar-brand home">
                   <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                   <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">
               </a>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   <span class="sr-only">Toggle Navigation</span>
                   <i class="fa fa-align-justify"></i>
               </button>
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   <span class="sr-only">Toggle Search</span>
                   <i class="fa fa-search"></i>        
               </button>
               
           </div>
           
           <div class="navbar-collapse collapse" id="navigation">
               
               <div class="padding-nav">
                   <ul class="nav navbar-nav left">
                       <li><a href="index.php">Home</a></li>
                       <li class="active"><a href="shop.php">Shop</a></li>
                       <li><a href="checkout.php">My Account</a></li>
                       <li><a href="cart.php">Shopping Cart</a></li>
                       <li><a href="contactus.php">Contact Us</a></li>
                   </ul><!-- nav navbar-nav left Finish -->
               </div><!-- padding-nav Finish -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right">
                   <i class="fa fa-shopping-cart"></i>
                   <span><?php item(); ?> Items In Your Cart</span>
               </a>
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       <span class="sr-only">Toggle Search</span>
                       <i class="fa fa-search"></i>
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->



   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               <ul class="breadcrumb"><!-- breadcrumb Begin -->

                   <li><a href="index.php">Home</a></li>
                   <li>Shop</li>
                   <li><a href="shop.php?cat=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a></li>
                   <li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a></li>
                   <li><?php echo $p_title; ?></li>

               </ul><!-- breadcrumb Finish -->
           </div>

           <div class="col-md-3"><!-- col-md-3 Begin -->   
            <?php 
            
            include("includes/sidebar.php");
            
            ?>
          </div>

          <div class="col-md-9"><!-- col-md-9 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!-- carousel-indicators Finish -->
                               
                               <div class="carousel-inner">
                                    <div class="item active">
                                        <center>
                                        <img class="img-responsive" src="admin_area/product_images/<?php echo $p_img1 ?>" alt="Product 3-a">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                        <img class="img-responsive" src="admin_area/product_images/<?php echo $p_img2 ?>" alt="Product 3-b">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                        <img class="img-responsive" src="admin_area/product_images/<?php echo $p_img3 ?>" alt="Product 3-c">
                                        </center>
                                    </div>
                               </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- left carousel-control Finish -->
                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- right carousel-control Finish -->
                               
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->
                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                           <h1 class="text-center"><?php echo $p_title ?></h1>
                           
                          <?php
                          addCart();
                          ?>

                           <form action="details.php?add_cart=<?php echo $pro_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Products Quantity</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                               
                               <div class="form-group"><!-- form-group Begin -->
                                   <label class="col-md-5 control-label">Product Size</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                       
                                       <select name="product_size" class="form-control"><!-- form-control Begin -->
                                          
                                           <option>Select a Size</option>
                                           <option>Small</option>
                                           <option>Medium</option>
                                           <option>Large</option>
                                           
                                       </select><!-- form-control Finish -->
                                       
                                   </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->
                               
                               <p class="price">INR <?php echo $p_price ?></p>
                               
                               <p class="text-center buttons"><button class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button></p>
                               
                           </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish -->
                       
                       <div class="row" id="thumbs"><!-- row Begin -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $p_img1 ?>" alt="product 1" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $p_img2 ?>" alt="product 2" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $p_img3 ?>" alt="product 4" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                       </div><!-- row Finish -->
                       
                   </div><!-- col-sm-6 Finish -->
                   
                   
               </div><!-- row Finish -->
               
               <div class="box" id="details"><!-- box Begin -->
                       
                       <h4>Product Details</h4>
                   
                   <p><?php echo $p_desc ?></p>
                   
                       <h4>Size</h4>
                       
                       <ul>
                           <li>Small</li>
                           <li>Medium</li>
                           <li>Large</li>
                       </ul>  
                       
                       <hr>
                   
               </div><!-- box Finish -->
               
               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline"><!-- box same-height headline Begin -->
                           <h3 class="text-center">Products You Maybe Like</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->
                   
                   <?php

                    $get_product="select * from products order by 1 LIMIT 0,3";
                    $run_product=mysqli_query($db,$get_product);
                    while ($row=mysqli_fetch_array($run_product)) {
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_price=$row['product_price'];
                        $product_img1=$row['product_img1'];

                        echo "<div class='center-responsive col-md-3 col-sm-6'>
                            <div class='product same-height'>
                                <a href='details.php?pro_id=$product_id'>
                                    <img src='admin_area/product_images/$product_img1' class='img-responsive'>
                                </a>
                                <div class='text'>
                                    <h3><a href='details.php?pro_id=$product_id'>$product_title</a></h3>
                                    <p class='price'>$product_price</p>
                                </div>
                            </div>
                        </div>";

                }

                   ?>

               </div><!-- #row same-heigh-row Finish -->
               
           </div><!-- col-md-9 Finish -->

      </div>
  </div>




<!-- Footer -->


  <?php 
    
    include("includes/footer.php");
    
  ?>



<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

</body>
</html>