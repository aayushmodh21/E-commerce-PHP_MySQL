<?php

session_start();
include('includes/db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>


	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<link rel="stylesheet" href="css/login.css">

</head>

<body>

	<div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Admin Login </h2>
           
           <input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
           <h4 class="forget-password">
           		<a href="forget_password.php">Lost Your Password? Forget Password</a>
           </h4>

       </form><!-- form-login finish -->
   </div><!-- container finish -->


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</body>

</html>


<?php

if (isset($_POST['admin_login'])) {
    $admin_email=mysqli_real_escape_string($con,$_POST['admin_email']);
    $admin_pass=mysqli_real_escape_string($con,$_POST['admin_pass']);
    $get_admin="select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
    $run_admin=mysqli_query($con,$get_admin);
    $count=mysqli_num_rows($run_admin);

    if ($count==1) {
        $_SESSION['admin_email']=$admin_email;
        echo "<script>alert('You are Logged in!')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    }
    else{
        echo "<script>alert('Email/Password Wrong')</script>";
        // echo "<script>window.open('login.php','_self')</script>";
    }

}

?>





