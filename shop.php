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
					<li>
                    <?php

                    if (!isset($_SESSION['customer_email'])) {
                        echo "<a href='checkout.php'>My Account</a>";
                    }
                    else {
                        echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                    }

                    ?>
                    </li>
					<li><a href="cart.php">Goto Cart</a></li>
					<li><?php

                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>Login</a>";
                            }
                            else {
                                echo "<a href='logout.php'>Logout</a>";
                            }

                            ?> </li>
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
                       <li>
                    <?php

                    if (!isset($_SESSION['customer_email'])) {
                        echo "<a href='checkout.php'>My Account</a>";
                    }
                    else {
                        echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                    }

                    ?>
                    </li>
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
               </ul><!-- breadcrumb Finish -->
           </div>

           <div class="col-md-3"><!-- col-md-3 Begin -->   
            <?php 
            
            include("includes/sidebar.php");
            
            ?>
          </div>

          <div class="col-md-9"><!-- col-md-9 Begin -->
               
               <?php

                if(!isset($_GET['p_cat'])){
                    if(!isset($_GET['cat'])){
                        echo "<div class='box'>

                        <h1>Shop</h1>
                         <p>
                             Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!
                         </p>

                      </div>";
                    }
                }

               ?>
               
                <div class="row"><!-- row Begin -->

                <?php

                if(!isset($_GET['p_cat'])){
                    if(!isset($_GET['cat'])){

                        $per_page=6;
                        if (isset($_GET['page'])) {
                            $page=$_GET['page'];
                        }
                        else {
                            $page=1;
                        }
                        
                        $start_from=($page-1) * $per_page;
                        $get_product="select * from products order by 1 DESC LIMIT $start_from, $per_page";
                        $run_pro=mysqli_query($con,$get_product);

                        while ($row=mysqli_fetch_array($run_pro)) {
                             $pro_id=$row['product_id'];
                             $pro_title=$row['product_title'];
                             $pro_price=$row['product_price'];
                             $pro_img1=$row['product_img1'];

                             echo "<div class='col-md-4 col-sm-6 center-responsive'>

                                <div class='product'>
                                    <a href='details.php?pro_id=$pro_id'>
                                    <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                                    </a>
                                </div>

                                <div class='text'>
                                    <h3><a href='details.php?pro_id=$pro_id'> $pro_title </a></h3>
                                    <p class='price'> INR $pro_price </p>
                                    <p class='buttons'>
                                    <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                                    <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart </a>
                                    </p>
                                </div>


                             </div>";

                        }


                ?>
               
                </div><!-- row Finish -->
               
                <center>

                    <ul class="pagination">
                    <?php

                            $query="select * from products";
                            $result=mysqli_query($con,$query);
                            $total_record=mysqli_num_rows($result);
                            $total_pages=ceil($total_record / $per_page);

                            echo "<li><a href='shop.php?page=1'> ".'First Page'." </a></li>";

                            for ($i=1; $i<=$total_pages; $i++) { 
                                echo "<li><a href='shop.php?page=".$i."'> ".$i." </a></li>";

                            };

                            echo "<li><a href='shop.php?page=$total_pages'> ".'Last Page'." </a></li>";


                        }
                    }
                
                    ?>

                       
                   </ul>
               </center>

                   <?php
                    getPCatPro();
                    getCatPro();
                   ?>


               
           </div>

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