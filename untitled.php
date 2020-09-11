<?php
// session_start();

include('includes/db.php');
include('functions/functions.php');
?>

<?php echo "<br>aayushshuashu<br>"; 
	
	// echo $_SERVER["REMOTE_ADDR"];

	echo "<br>";

	$ip_add=getUserIP();
	echo $ip_add;

?>

<!DOCTYPE html>
<html>
<head>
	<title>try it yourself!</title>
</head>
<body>

<br>
<br>
	<form method="post" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                      <label> name </label> 
                          <input name="name" type="text" required>
                          <br>
                       <label> email </label> 
                          <input name="email" type="text" required>

                          <br>
                          <input name="submit" value="Insert Product" type="submit">

                   
               </form><!-- form-horizontal Finish -->

</body>
</html>

<?php

if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $ip_add=getUserIP();
    
    $insert_product = "insert into try (name,email,ip_add) values ('$name','$email','$ip_add')";
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        
        echo "yes";
        
    }
    
}

?>





