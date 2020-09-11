<div class="box">

	<center>
		<h1>Change Your Password</h1>
	</center>

	<form action="" method="post">
	<div class="form-group">
		<label>Enter your Current Password</label>
		<input type="Password" name="old_password" class="form-control">
	</div>
	<div class="form-group">
		<label>Enter your New Password</label>
		<input type="Password" name="new_password" class="form-control">
	</div>
	<div class="form-group">
		<label>Confirm your New Password</label>
		<input type="Password" name="c_n_password" class="form-control">
	</div>

	<div class="text-center">
		<button class="btn btn-primary btn-lg" name="update" type="submit">Update Now</button>
	</div>
	</form>
</div>


<?php

if (isset($_POST['update'])) {
	$c_email=$_SESSION['customer_email'];
	$old_password=$_POST['old_password'];
	$new_password=$_POST['new_password'];
	$c_n_password=$_POST['c_n_password'];

	$select_customers="select * from customers where customer_email='$c_email' AND customer_pass='$old_password'";
	$run_cust=mysqli_query($con,$select_customers);
	$check_old_pass=mysqli_num_rows($run_cust);
	if ($check_old_pass==0) {
		echo "<script>alert('Your current password is invalid!')</script>";
		exit();
	}

	if ($new_password!=$c_n_password) {
		echo "<script>alert('Your new password is not matched with confirm!')</script>";
		exit();
	}

	$update_query="update customers set customer_pass='$new_password' where customer_email='$c_email'";
	$run_q=mysqli_query($con,$update_query);
	echo "<script>alert('Your Password is Changed!')</script>";
	echo "<script>window.open('my_account.php?my_order','_self')</script>";

}

?>




