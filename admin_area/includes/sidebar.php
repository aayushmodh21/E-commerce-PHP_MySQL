<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else{


?>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background: black">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button>
        <a href="index.php?dashboard" class="navbar-brand" >Admin Panel</a>
        
    </div>

    <ul class="nav navbar-right top-nav">
        <li class="dropdown">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo $admin_name; ?>
                <i class="fa fa-fw fa-caret-down"></i>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile?id=<?php echo $admin_id; ?>">
                        <i class="fa fa-fw fa-user"></i> Profile
                    </a>
                </li>
                <li>
                    <a href="index.php?view_product">
                        <i class="fa fa-fw fa-envelope"></i> Products
                        <span class="badge"><?php echo $count_pro; ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customer">
                        <i class="fa fa-fw fa-users"></i> Customer
                        <span class="badge"><?php echo $count_cust; ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?pro_cat">
                        <i class="fa fa-fw fa-gear"></i> Product Categories
                        <span class="badge"><?php echo $count_p_cat; ?></span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                    </a>
                </li>
            </ul>

        </li>
    </ul>

    <div class="collapse navbar-collapse navnar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i> Dashboard
                </a>
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-fw fa-tag"></i> Products
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
            
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_product"> Insert Product </a>
                    </li>
                    <li>
                        <a href="index.php?view_product"> View Products </a>
                    </li>
                </ul>
            </li>

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#p_cat"><!-- a href begin -->
                        <i class="fa fa-fw fa-edit"></i> Products Categories
                        <i class="fa fa-fw fa-caret-down"></i> 
                </a><!-- a href finish -->
                <ul id="p_cat" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_pro_cat"> Insert Product Category </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_pro_cat"> View Products Categories </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#cat"><!-- a href begin -->
                        <i class="fa fa-fw fa-book"></i> Categories
                        <i class="fa fa-fw fa-caret-down"></i>    
                </a><!-- a href finish -->
                <ul id="cat" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_cat"> Insert Category </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_cat"> View Categories </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#slides"><!-- a href begin -->
                        <i class="fa fa-fw fa-gear"></i> Slides
                        <i class="fa fa-fw fa-caret-down"></i>
                </a><!-- a href finish -->
                <ul id="slides" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_slide"> Insert Slide </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_slide"> View Slides </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="index.php?view_customers"><!-- a href begin -->
                    <i class="fa fa-fw fa-users"></i> View Customers
                </a><!-- a href finish -->
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="index.php?view_orders"><!-- a href begin -->
                    <i class="fa fa-fw fa-book"></i> View Orders
                </a><!-- a href finish -->
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="index.php?view_payments"><!-- a href begin -->
                    <i class="fa fa-fw fa-money"></i> View Payments
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#users"><!-- a href begin -->
                        <i class="fa fa-fw fa-users"></i> Users
                        <i class="fa fa-fw fa-caret-down"></i>
                </a><!-- a href finish -->
                <ul id="users" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_user"> Insert User </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_users"> View Users </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?user_profile?id=<?php echo $admin_id; ?>"> Edit User Profile </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
            </li><!-- li finish -->
            
            <!-- <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a>
            </li>
 -->
        </ul>
    </div>

    
    
</nav>

<?php

}

?>



