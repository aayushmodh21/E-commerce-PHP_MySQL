<?php
session_start();
include('includes/db.php');
include('functions/functions.php');
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
                ?>
        </a>
				<a href="#">Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total Items: <?php item(); ?></a>
			</div>	
			<div class="col-md-6">
				<ul class="menu">
					<li><a href="customer_registration.php">Register</a></li>
					<li><a href="checkout.php">My Account</a></li>
					<li><a href="cart.php">Goto Cart</a></li>
					<li><?php

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
                       <li><a href="shop.php">Shop</a></li>
                       <li><a href="checkout.php">My Account</a></li>
                       <li class="active"><a href="cart.php">Shopping Cart</a></li>
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
                   <li>Cart</li>
               </ul><!-- breadcrumb Finish -->
           </div>

           <div id="cart" class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <form action="cart.php" method="post" enctype="multipart-form-data"><!-- form Begin -->
                       
                       <h1>Shopping Cart</h1>

                       <?php

                       $ip_add=getUserIP();
                       $select_cart="select * from cart where ip_add='$ip_add'";
                       $run_cart=mysqli_query($con,$select_cart);
                       $count=mysqli_num_rows($run_cart);


                       ?>

                       <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
                       
                       <div class="table-responsive"><!-- table-responsive Begin -->
                           
                           <table class="table"><!-- table Begin -->
                               
                               <thead><!-- thead Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th colspan="2">Product</th>
                                       <th>Quantity</th>
                                       <th>Unit Price</th>
                                       <th>Size</th>
                                       <th colspan="1">Delete</th>
                                       <th colspan="2">Sub-Total</th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </thead><!-- thead Finish -->
                               
                               <tbody><!-- tbody Begin -->
                                   
                                    <?php

                                    $total=0;

                                    while ($row=mysqli_fetch_array($run_cart)) {
                                        $pro_id=$row['p_id'];
                                        $pro_size=$row['size'];
                                        $pro_qty=$row['qty'];

                                        $get_product="select * from products where product_id='$pro_id'";
                                        $run_pro=mysqli_query($con,$get_product);
                                        // if (!$run_pro) {
                                        //     printf("Error: %s\n", mysqli_error($con));
                                        //     exit();
                                        // }
                                        while ($row=mysqli_fetch_array($run_pro)) {
                                            $p_title=$row['product_title'];
                                            $p_img1=$row['product_img1'];
                                            $p_price=$row['product_price'];
                                            $sub_total=$row['product_price'] * $pro_qty;
                                            $total += $sub_total;

                                    ?>

                                   <tr><!-- tr Begin -->  
                                       <td><img class="img-responsive" src="admin_area/product_images/<?php echo $p_img1; ?>" alt="Product 3a"></td>
                                       <td><?php echo $p_title; ?></td>
                                       <td><?php echo $pro_qty; ?></td>
                                       <td>INR <?php echo $p_price; ?></td>
                                       <td><?php echo $pro_size; ?></td>
                                       <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                       <td>INR <?php echo $sub_total; ?></td>
                                   </tr><!-- tr Finish -->
                                   
                                <?php 

                                        }
                                    } 

                                ?>
                                   
                               </tfoot><!-- tfoot Finish -->
                               
                           </table><!-- table Finish -->
                           
                       </div><!-- table-responsive Finish -->

                       <div class="box-footer">
                            <div class="pull-left"> 
                                <h4>Total Price</h4>
                            </div>
                            <div class="pull-right">
                                <h4>INR <?php echo $total; ?></h4>
                           </div>
                       </div>
                       
                        <div class="box-footer"><!-- box-footer Begin -->
                            <div class="pull-left"><!-- pull-left Begin -->    
                                <a href="index.php" class="btn btn-default"><!-- btn btn-default Begin -->
                                    <i class="fa fa-chevron-left"></i> Continue Shopping
                                </a><!-- btn btn-default Finish -->
                            </div><!-- pull-left Finish -->
                            <div class="pull-right"><!-- pull-right Begin -->
                                <button type="submit" name="update" value="Update Cart" class="btn btn-default"><!-- btn btn-default Begin -->      
                                    <i class="fa fa-refresh"></i> Update Cart
                               </button><!-- btn btn-default Finish -->
                               <a href="checkout.php" class="btn btn-primary">
                                   Proceed To Checkout <i class="fa fa-chevron-right"></i>
                               </a>
                           </div><!-- pull-right Finish -->
                       </div><!-- box-footer Finish -->
                   </form><!-- form Finish -->
               </div><!-- box Finish -->
               
               <?php

                function update_cart(){
                    global $con;
                    if (isset($_POST['update'])) {
                        foreach ($_POST['remove'] as $remove_id) {
                            $delete_product="delete from cart where p_id='$remove_id'";
                            $run_del=mysqli_query($con,$delete_product);
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
               }

               echo @ $up_cart=update_cart();

               ?>

               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline"><!-- box same-height headline Begin -->
                           <h3 class="text-center">Products You Maybe Like</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->
                   
                   <div class="col-md-3 col-sm-6 center-responsive"><!-- col-md-3 col-sm-6 center-responsive Begin -->
                       <div class="product same-height"><!-- product same-height Begin -->
                           <a href="details.php">
                               <img class="img-responsive" src="admin_area/product_images/Product-6a.jpg" alt="Product 6">
                            </a>
                            
                            <div class="text"><!-- text Begin -->
                                <h3><a href="details.php">M-Dev Tank Top Women</a></h3>
                                
                                <p class="price">$40</p>
                                
                            </div><!-- text Finish -->
                            
                        </div><!-- product same-height Finish -->
                   </div><!-- col-md-3 col-sm-6 center-responsive Finish -->
                   
                   <div class="col-md-3 col-sm-6 center-responsive"><!-- col-md-3 col-sm-6 center-responsive Begin -->
                       <div class="product same-height"><!-- product same-height Begin -->
                           <a href="details.php">
                               <img class="img-responsive" src="admin_area/product_images/Product-5a.jpg" alt="Product 6">
                            </a>
                            
                            <div class="text"><!-- text Begin -->
                                <h3><a href="details.php">M-Dev Street Shirt Women</a></h3>
                                
                                <p class="price">$45</p>
                                
                            </div><!-- text Finish -->
                            
                        </div><!-- product same-height Finish -->
                   </div><!-- col-md-3 col-sm-6 center-responsive Finish -->
                   
                   <div class="col-md-3 col-sm-6 center-responsive"><!-- col-md-3 col-sm-6 center-responsive Begin -->
                       <div class="product same-height"><!-- product same-height Begin -->
                           <a href="details.php">
                               <img class="img-responsive" src="admin_area/product_images/Product-4a.jpg" alt="Product 6">
                            </a>
                            
                            <div class="text"><!-- text Begin -->
                                <h3><a href="details.php">M-Dev Polo T-Shirt Women</a></h3>
                                
                                <p class="price">$50</p>
                                
                            </div><!-- text Finish -->
                            
                        </div><!-- product same-height Finish -->
                   </div><!-- col-md-3 col-sm-6 center-responsive Finish -->
                   
               </div><!-- #row same-heigh-row Finish -->
               
           </div><!-- col-md-9 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
               
               <div id="order-summary" class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <h3>Order Summary</h3>
                       
                   </div><!-- box-header Finish -->
                   
                   <p class="text-muted"><!-- text-muted Begin -->
                       
                       Shipping and additional costs are calculated based on value you have entered
                       
                   </p><!-- text-muted Finish -->
                   
                   <div class="table-responsive"><!-- table-responsive Begin -->
                       
                       <table class="table"><!-- table Begin -->
                           
                           <tbody><!-- tbody Begin -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Order Sub-Total </td>
                                   <th>INR <?php echo $total; ?> </th>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Shipping and Handling </td>
                                   <td> $0 </td>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Tax </td>
                                   <th> $0 </th>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr class="total"><!-- tr Begin -->
                                   
                                   <td> Total </td>
                                   <th> INR <?php echo $total; ?>  </th>
                                   
                               </tr><!-- tr Finish -->
                               
                           </tbody><!-- tbody Finish -->
                           
                       </table><!-- table Finish -->
                       
                   </div><!-- table-responsive Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-3 Finish -->



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