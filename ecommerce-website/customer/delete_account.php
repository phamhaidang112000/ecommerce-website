<center>
    <h1>Do you realy want to delete your account?</h1>
    <form action="" method="POST">
        <input type="submit" name="Yes" value="Yes, I want to delete" class="btn btn-danger" />
        <input type="submit" name="No" value="No, I don't want to delete" class="btn btn-primary" />
    </form>
</center>

<?php 

$c_email = $_SESSION['customer_email'];

if(isset($_POST['Yes'])){
    
    $delete_customer = "delete from tbl_customers where customer_email='$c_email'";
    
    $run_delete_customer = mysqli_query($conn,$delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('Successfully delete your account, feel sorry about this. Good Bye')</script>";
        
        echo "<script>window.open('../index.php','_self')</script>";
        
    }
    
}

if(isset($_POST['No'])){
    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    
}

?>