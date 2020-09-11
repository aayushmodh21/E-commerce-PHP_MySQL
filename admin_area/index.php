<?php

session_start();
include('includes/db.php');

if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
}
else{

?>

<?php

$admin_session=$_SESSION['admin_email'];
$get_admin="select * from admins where admin_email='$admin_session'";
$run_admin=mysqli_query($con,$get_admin);
$row_admin=mysqli_fetch_array($run_admin);
$admin_id=$row_admin['admin_id'];
$admin_name=$row_admin['admin_name'];
$admin_image=$row_admin['admin_image'];
$admin_email=$row_admin['admin_email'];
$admin_contact=$row_admin['admin_contact'];
$admin_country=$row_admin['admin_country'];
$admin_job=$row_admin['admin_job'];
$admin_about=$row_admin['admin_about'];

$get_pro="select * from products";
$run_pro=mysqli_query($con,$get_pro);
$count_pro=mysqli_num_rows($run_pro);

$get_cust="select * from customers";
$run_cust=mysqli_query($con,$get_cust);
$count_cust=mysqli_num_rows($run_cust);

$get_p_cat="select * from product_categories";
$run_p_cat=mysqli_query($con,$get_p_cat);
$count_p_cat=mysqli_num_rows($run_p_cat);

$get_order="select * from pending_order";
$run_order=mysqli_query($con,$get_order);
$count_order=mysqli_num_rows($run_order);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel</title>


	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<link rel="stylesheet" href="css/style.css">

</head>

<body>

	<div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php

                if (isset($_GET['dashboard'])) {
                	include("dashboard.php");
                }

                // products
                if (isset($_GET['insert_product'])) {
                	include("insert_product.php");
                }
                if (isset($_GET['view_product'])) {
                	include("view_product.php");
                }
                if (isset($_GET['delete_product'])) {
                	include("delete_product.php");
                }
                if (isset($_GET['edit_product'])) {
                	include("edit_product.php");
                }

                // product_categories
                if (isset($_GET['insert_pro_cat'])) {
                	include("insert_pro_cat.php");
                }
                if (isset($_GET['view_pro_cat'])) {
                	include("view_pro_cat.php");
                }
                if (isset($_GET['delete_pro_cat'])) {
                	include("delete_pro_cat.php");
                }
                if (isset($_GET['edit_pro_cat'])) {
                	include("edit_pro_cat.php");
                }

                // categories
                if (isset($_GET['insert_cat'])) {
                	include("insert_cat.php");
                }
                if (isset($_GET['view_cat'])) {
                	include("view_cat.php");
                }
                if (isset($_GET['delete_cat'])) {
                	include("delete_cat.php");
                }
                if (isset($_GET['edit_cat'])) {
                	include("edit_cat.php");
                }

                // slides
                if (isset($_GET['insert_slide'])) {
                	include("insert_slide.php");
                }
                if (isset($_GET['view_slide'])) {
                	include("view_slide.php");
                }
                if (isset($_GET['delete_slide'])) {
                	include("delete_slide.php");
                }
                if (isset($_GET['edit_slide'])) {
                	include("edit_slide.php");
                }

                //view customers
                if (isset($_GET['view_customers'])) {
                	include("view_customers.php");
                }
                if (isset($_GET['delete_customer'])) {
                	include("delete_customer.php");
                }

                //view orders
                if (isset($_GET['view_orders'])) {
                	include("view_orders.php");
                }
                if (isset($_GET['delete_order'])) {
                	include("delete_order.php");
                }

                //view payments
                if (isset($_GET['view_payments'])) {
                	include("view_payments.php");
                }
                if (isset($_GET['delete_payment'])) {
                	include("delete_payment.php");
                }

                //users
                if (isset($_GET['insert_user'])) {
                	include("insert_user.php");
                }
                if (isset($_GET['view_users'])) {
                	include("view_users.php");
                }
                if (isset($_GET['user_profile'])) {
                	include("user_profile.php");
                }
                if (isset($_GET['delete_user'])) {
                	include("delete_user.php");
                }

                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->



	<!-- <script src="js/jquery-331.min.js"></script>
	<script src="js/bootstrap-337.min.js"></script> -->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</body>

</html>



<?php

}

?>


