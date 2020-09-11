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
                       <li ><a href="index.php">Home</a></li>
                       <li><a href="shop.php">Shop</a></li>
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
                   <li>Registraion</li>
               </ul><!-- breadcrumb Finish -->
           </div>

           <div class="col-md-3"><!-- col-md-3 Begin -->   
            <?php 
            
            include("includes/sidebar.php");
            
            ?>
          </div>

          <div class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->    
                           <h2>Customer Registration</h2>
                       </center><!-- center Finish -->
                       
                       <form method="post" enctype="multipart/form-data"><!-- form Begin --> 
                           
                           <div class="form-group"><!-- form-group Begin -->
                               <label>Customer Name</label>
                               <input type="text" class="form-control" name="c_name" required>
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               <label>Customer Email</label>
                               <input type="text" class="form-control" name="c_email" required>
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               <label>Customer Password</label>
                               <input type="password" class="form-control" name="c_password" required>
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               <label>Country</label>
                               <input type="text" class="form-control" name="c_country" required>
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               <label>City</label>
                               <input type="text" class="form-control" name="c_city" required>
                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->
                               <label>Contact Number</label>
                               <input type="text" class="form-control" name="c_contact" required>
                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->
                               <label>Address</label>
                               <input type="text" class="form-control" name="c_address" required>
                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->
                               <label>Image</label>
                               <input type="file" class="form-control" name="c_image" required>
                           </div><!-- form-group Finish -->
                           
                           
                           <div class="text-center"><!-- text-center Begin -->
                               
                               <!-- <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa fa-user-md"></i>Register 
                               </button> -->

                               <input name="submit" value="Register" type="submit" class="btn btn-primary form-control">
                               
                           </div><!-- text-center Finish -->
                           
                       </form><!-- form Finish -->
                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->
               
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


<?php

if (isset($_POST['submit'])) {
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_password=$_POST['c_password'];
    $c_country=$_POST['c_country'];
    $c_city=$_POST['c_city'];
    $c_contact=$_POST['c_contact'];
    $c_address=$_POST['c_address'];
    $c_image=$_FILES['c_image']['name'];
    $c_tmp_image=$_FILES['c_image']['tmp_name'];
    $c_ip=getUserIP();

    move_uploaded_file($c_tmp_image, "customer/customer_images/$c_image");

    $insert_customer="insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
    $run_customer=mysqli_query($con,$insert_customer);
    
    $sel_cart="select * from cart where ip_add='$c_ip'";
    $run_cart=mysqli_query($con,$sel_cart);
    $check_cart=mysqli_num_rows($run_cart);

    if($check_cart>0){
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('You have been registered Successfully')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
    else{
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('You have been registered Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }

}

?>







