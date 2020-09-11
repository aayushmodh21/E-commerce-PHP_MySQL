<center><!--  center Begin  -->
    
    <h1> My Orders </h1>
    
    <p class="lead"> Your orders on one place</p>
    
    <p class="text-muted">
        
        If you have any questions, feel free to <a href="../contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>
        
    </p>
    
</center><!--  center Finish  -->


<hr>


<div class="table-responsive"><!--  table-responsive Begin  -->
    
    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->
        
        <thead><!--  thead Begin  -->
            
            <tr><!--  tr Begin  -->
                
                <th> Sr.No: </th>
                <th> Due Amount: </th>
                <th> Invoice No: </th>
                <th> Qty: </th>
                <th> Size: </th>
                <th> Order Date:</th>
                <th> Paid / Unpaid: </th>
                <th> Status: </th>
                
            </tr><!--  tr Finish  -->
            
        </thead><!--  thead Finish  -->
        
        <tbody><!--  tbody Begin  -->
            
            <?php

            $customer_session=$_SESSION['customer_email'];
            $get_customer="select * from customers where customer_email='$customer_session'";
            $run_customer=mysqli_query($con,$get_customer);
            $row_customer=mysqli_fetch_array($run_customer);
            $customer_id=$row_customer['customer_id'];

            $get_order="select * from customer_order where customer_id='$customer_id'";
            $run_order=mysqli_query($con,$get_order);
            $i=0;
            while ($row_order=mysqli_fetch_array($run_order)) {
                $order_id=$row_order['order_id'];
                $due_amount=$row_order['due_amount'];
                $invoice_no=$row_order['invoice_no'];
                $qty=$row_order['qty'];
                $size=$row_order['size'];
                $order_date=substr($row_order['order_date'], 0,11);
                $order_status=$row_order['order_status'];

                $i++;

                if ($order_status=='pending') {
                    $order_status='Unpaid';
                }
                else {
                    $order_status='Paid';
                }
 
            ?>

            <tr><!--  tr Begin  -->    
                <th> <?php echo $i ?> </th>
                <td> <?php echo $due_amount ?> </td>
                <td> <?php echo $invoice_no ?> </td>
                <td> <?php echo $qty ?> </td>
                <td> <?php echo $size ?> </td>
                <td> <?php echo $order_date ?> </td>
                <td> <?php echo $order_status ?> </td>
                <td>
                    <a href="confirm.php?order_id=<?php echo $order_id ?>" target="_blank" class="btn btn-primary btn-sm"> Confirm if Paid </a>   
                </td>
            </tr>

        <?php } ?>
            
        </tbody><!--  tbody Finish  -->
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  -->