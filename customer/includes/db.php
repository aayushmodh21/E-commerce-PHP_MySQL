<?php 
$con = mysqli_connect("localhost","root","","ecom");

if(!$con){
  echo "sorry";
}
else{
  echo "success";
}

?>