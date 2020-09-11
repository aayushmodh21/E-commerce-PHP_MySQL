<?php

$db = mysqli_connect("localhost","root","","ecom");


// FOR GETTING USER IP start

function getUserIP(){
    switch (true) {
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
    }
}

function addCart(){
    global $db;
    if (isset($_GET['add_cart'])) {
        $ip_add=getUserIP();
        $p_id=$_GET['add_cart'];
        $product_qty=$_POST['product_qty'];
        $product_size=$_POST['product_size'];

        $check_product="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        $run_check=mysqli_query($db,$check_product);

        if(mysqli_num_rows($run_check)>0){
            echo "<script>alert('This Product is already added in Your Cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }
        else{
            $query="insert into cart (p_id,ip_add,qty,size) values('$p_id','$ip_add','$product_qty','$product_size')";
            $run_query=mysqli_query($db,$query);
            echo "<script>alert('This Product is added in Your Cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        } 

    }
}

//count items

function item(){
    global $db;
    $ip_add=getUserIP();
    $get_items="select * from cart where ip_add='$ip_add'";
    $run_items=mysqli_query($db,$get_items);
    $count=mysqli_num_rows($run_items);
    echo $count;
}

//total price count

function totalPrice(){
    global $db;
    $ip_add=getUserIP();
    $total=0;
    $select_cart="select * from cart where ip_add='$ip_add'";
    $run_cart=mysqli_query($db,$select_cart);
    while ($record=mysqli_fetch_array($run_cart)) { 
        $pro_id=$record['p_id'];
        $pro_qty=$record['qty'];
        $get_price="select * from products where product_id='$pro_id'";
        $run_price=mysqli_query($db,$get_price);
        // if (!$run_price) {
        //     printf("Error: %s\n", mysqli_error($db));
        //     exit();
        // }
        while ($row=mysqli_fetch_array($run_price)) {
            $sub_total=$row['product_price'] * $pro_qty;
            $total += $sub_total;
        }
    }
    echo $total;
}



// FOR GETTING USER IP end


function getPro(){
	global $db;
	$get_products = "select * from products order by 1 LIMIT 0,8";
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


// Product Category

function getPCats(){
    global $db;
    $get_p_cats="select * from product_categories";
    $run_p_cats=mysqli_query($db,$get_p_cats);

    while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
        $p_cat_id=$row_p_cats['p_cat_id'];
        $p_cat_title=$row_p_cats['p_cat_title'];
        echo "<li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a></li>";

    }
}



// Category

function getCats(){
    global $db;
    $get_cats="select * from Categories";
    $run_cats=mysqli_query($db,$get_cats);

    while ($row_cats=mysqli_fetch_array($run_cats)) {
        $cat_id=$row_cats['cat_id'];
        $cat_title=$row_cats['cat_title'];
        echo "<li><a href='shop.php?cat=$cat_id'> $cat_title </a></li>";

    }
}

// Get product category products

function getPCatPro(){
    global $db;
    if (isset($_GET['p_cat'])) {
        $p_cat_id=$_GET['p_cat'];
        $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
        $run_p_cat=mysqli_query($db,$get_p_cat);
        $row_p_cat=mysqli_fetch_array($run_p_cat);
        $p_cat_title=$row_p_cat['p_cat_title'];
        $p_cat_desc=$row_p_cat['p_cat_desc'];

        $get_products="select * from products where p_cat_id='$p_cat_id'";
        $run_products=mysqli_query($db,$get_products);
        $count=mysqli_num_rows($run_products);

        if ($count==0) {
            echo "<div class='box'>
                <h1>No Products Found in this Product Category</h1>
            </div>";
        }
        else{
            echo "<div class='box'>
                <h1>$p_cat_title</h1>
                <p>$p_cat_desc</p>
            </div>";
        }

        while ($row_products=mysqli_fetch_array($run_products)) {
            $pro_id=$row_products['product_id'];
            $pro_title=$row_products['product_title'];
            $pro_price=$row_products['product_price'];
            $pro_img1=$row_products['product_img1'];

            echo "<div class='col-md-4 col-sm-6 center-responsive'>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                        <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                    </a>
                    <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                        <p class='price'>$pro_price</p>
                        <p class='button'>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details </a>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart </a>
                        </p>
                    </div>
                </div>
            </div>";

        }


    }
}


// Get category products

function getCatPro(){
    global $db;
    if (isset($_GET['cat'])) {
        $cat_id=$_GET['cat'];
        $get_cat="select * from Categories where cat_id='$cat_id'";
        $run_cat=mysqli_query($db,$get_cat);
        $row_cat=mysqli_fetch_array($run_cat);
        $cat_title=$row_cat['cat_title'];
        $cat_desc=$row_cat['cat_desc'];

        $get_products="select * from products where cat_id='$cat_id'";
        $run_products=mysqli_query($db,$get_products);
        $count=mysqli_num_rows($run_products);

        if ($count==0) {
            echo "<div class='box'>
                <h1>No Products Found in this Category</h1>
            </div>";
        }
        else{
            echo "<div class='box'>
                <h1>$cat_title</h1>
                <p>$cat_desc</p>
            </div>";
        }

        while ($row_products=mysqli_fetch_array($run_products)) {
            $pro_id=$row_products['product_id'];
            $pro_title=$row_products['product_title'];
            $pro_price=$row_products['product_price'];
            $pro_img1=$row_products['product_img1'];

            echo "<div class='col-md-4 col-sm-6 center-responsive'>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                        <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                    </a>
                    <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                        <p class='price'>$pro_price</p>
                        <p class='button'>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details </a>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart </a>
                        </p>
                    </div>
                </div>
            </div>";

        }


    }
}



?>







