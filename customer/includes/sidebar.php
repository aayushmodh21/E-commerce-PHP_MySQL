

<div class="panel panel-default sidebar-menu"><!--  panel panel-default sidebar-menu Begin  -->
    <div class="panel-heading"><!--  panel-heading  Begin  -->

        <?php

        $c_email=$_SESSION['customer_email'];

        $get_customer="select * from customers where customer_email='$c_email'";
        $run_customer=mysqli_query($con,$get_customer);
        $row_customer=mysqli_fetch_array($run_customer);

        $customer_name=$row_customer['customer_name'];
        $customer_image=$row_customer['customer_image'];

        echo "<center>
            <img src='customer_images/$customer_image' alt='Customer Profile' class='img-responsive'>
        </center>
        <br/>
        <h3 align='center' class='panel-title'>
            Name: $customer_name 
        </h3>
        "
        ?>

    </div><!--  panel-heading Finish  -->
    <div class="panel-body"><!--  panel-body Begin  -->
        <ul class="nav-pills nav-stacked nav"><!--  nav-pills nav-stacked nav Begin  -->
            <li class="<?php if(isset($_GET['my_order'])){ echo "active"; } ?>">
                <a href="my_account.php?my_order">
                    <i class="fa fa-list"></i> My Orders  
                </a>
            </li>
            <li class="<?php if(isset($_GET['pay_offline'])){ echo "active"; } ?>">
                <a href="my_account.php?pay_offline">
                    <i class="fa fa-bolt"></i> Pay Offline
                </a>
            </li>
            <li class="<?php if(isset($_GET['edit_act'])){ echo "active"; } ?>">
                <a href="my_account.php?edit_act">
                    <i class="fa fa-pencil"></i> Edit Account
                </a>
            </li>
            <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
                <a href="my_account.php?change_pass">
                    <i class="fa fa-pencil"></i> Change Password
                </a>
            </li>
            <li class="<?php if(isset($_GET['delete_ac'])){ echo "active"; } ?>">
                <a href="my_account.php?delete_ac">
                    <i class="fa fa-trash-o"></i> Delete Account
                </a>                
            </li>
            <li>    
                <a href="logout.php">    
                    <i class="fa fa-sign-out"></i> Log Out
                </a>
            </li>
        </ul><!--  nav-pills nav-stacked nav Begin  -->
    </div><!--  panel-body Finish  -->
</div><!--  panel panel-default sidebar-menu Finish  -->