<?php

$db = mysqli_connect("localhost","root","","ecom");

function getPro(){
	global $db;
	$get_products = "select * from products order by 1 LIMIT 0,6";
	$run_products = mysqli_query($db,$get_products);

	while ($row_product=mysqli_fetch_array($run_products)) {
		$pro_id=$row_product['product_id'];
		$pro_title=$row_product['product_title'];
		$pro_price=$row_product['product_price'];
		$pro_img1=$row_product['product_img1'];

		echo "        
        <div class='col-md-4 col-sm-6 single'>        
            <div class='product'>           

                <a href='details.php?pro_id=$pro_id'>               
                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>               
                </a>  

                <div class='text'>                
                    <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                    <p class='price'> INR $pro_price</p>
                    <p class='button'>
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>View Details</a>
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                            <i class='fa fa-shopping-cart'></i> Add to Cart
                        </a>
                    </p>
                </div>
            </div>
        </div>
        ";

	}	


}

?>



