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
                
                <th> ON: </th>
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
                $stt = 0;

                $cus_session = $_SESSION['customer_email'];

                $get_cus = "SELECT * FROM tbl_customers WHERE customer_email = '$cus_session'";

                $run_get_cus = mysqli_query($conn , $get_cus);

                $rows_cus = mysqli_fetch_array($run_get_cus);

                $cus_id = $rows_cus['customer_id'];

                $get_cus_order = "SELECT * FROM tbl_customer_order WHERE customer_id = $cus_id";

                $run_get_cus_order = mysqli_query($conn , $get_cus_order);

                while($row_cus_order = mysqli_fetch_array($run_get_cus_order)){
                    $order_id = $row_cus_order['order_id'];
                    $due_amount = $row_cus_order['due_amount'];
                    $invoice_no = $row_cus_order['invoice_no'];
                    $qty = $row_cus_order['qty'];
                    $size = $row_cus_order['size'];
                    $order_date = substr($row_cus_order['order_date'],0,11);
                    $order_status = $row_cus_order['order_status'];
                    if($order_status == 'pending'){
                        $order_status = 'Unpaid';
                    }else{
                        $order_status = 'Paid';
                    }
                    $stt++;

                    ?>
                        <tr><!--  tr Begin  -->
                
                            <th> <?php echo $stt ?></th>
                            
                            <td> <?php echo '$'.$due_amount ?></td>
                            <td> <?php echo $invoice_no ?> </td>
                            <td> <?php echo $qty ?></td>
                            <td> <?php echo $size ?></td>
                            <td> <?php echo $order_date ?></td>
                            <td> <?php echo $order_status ?></td>
                            
                            <td>
                                
                                <a href='confirm.php?order_id=<?php echo $order_id ?>' target='_blank' class='btn btn-primary btn-sm'> Confirm Paid </a>
                                
                            </td>
                            
                        </tr><!--  tr Finish  -->
            <?php
                }
            ?>
        </tbody><!--  tbody Finish  -->
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  -->