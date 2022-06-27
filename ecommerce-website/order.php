<?php 

    include("includes/db.php");
    include("functions/functions.php");

?>
<?php 

    if(isset($_GET['c_id'])){
        
        $customer_id = $_GET['c_id'];
        
    }

    $ip_add = get_real_ip_user();

    $status = "pending";

    $invoice_no = mt_rand(); //mt_rand() nhanh hơn 4 lần so với hàm rand(). Và không gian ngẫu nhiên của nó cũng rộng hơn. mt_rand(): sẽ cho ra số nguyên ngẫu nhiên, giá trị lớn nhất có thể là 2147483647 (còn gọi là mt_getrandmax);

    $select_cart = "select * from tbl_cart where ip_add='$ip_add'";

    $run_cart = mysqli_query($conn ,$select_cart);

    while($row_cart = mysqli_fetch_array($run_cart)){
        
        $pro_id = $row_cart['pro_id'];
        
        $pro_qty = $row_cart['qty'];
        
        $pro_size = $row_cart['size'];

        $p_price = $row_cart['p_price'];

        $sub_total = $p_price * $pro_qty;
            
        $insert_customer_order = "insert into tbl_customer_order (customer_id,due_amount,invoice_no,qty,size,order_date,order_status) values ('$customer_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";
            
        $run_customer_order = mysqli_query($conn ,$insert_customer_order);
            
        $insert_pending_order = "insert into tbl_pending_order (customer_id,invoice_no,product_id,qty,size,order_status) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_size','$status')";
            
        $run_pending_order = mysqli_query($conn ,$insert_pending_order);
            
        $delete_cart = "delete from tbl_cart where ip_add='$ip_add'";
            
        $run_delete = mysqli_query($conn,$delete_cart);
            
        echo "<script>alert('Your orders has been submitted, Thanks')</script>";
            
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
            
    }
        
    

?>