<div class="box"><!-- box Begin -->
    <?php 
        $session_email = $_SESSION['customer_email'];

        $select_customer = "select * from tbl_customers where customer_email='$session_email'";
    
        $run_customer = mysqli_query($conn,$select_customer);
        
        $row_customer = mysqli_fetch_array($run_customer);
        
        $customer_id = $row_customer['customer_id'];
    ?>
    
    <h1 class="text-center">Payment Options For You</h1>  
    
     <p class="lead text-center"><!-- lead text-center Begin -->
         
         <a href="order.php?c_id=<?php echo $customer_id ?>"> Offline Payment </a>
         
     </p><!-- lead text-center Finish -->

    
</div><!-- box Finish -->