<h1 align="center">Change Password</h1>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label >Your Old Password: </label>
        <input type="password" name="old_pass" class="form-control" required>
    </div>

    <div class="form-group">
        <label >Your New Password: </label>
        <input type="password" name="new_pass" class="form-control" required>
    </div>

    <div class="form-group">
        <label >Confirm your new password: </label>
        <input type="password" name="new_pass_again" class="form-control" required>
    </div>

    <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Update Now
        </button>
    </div>



</form>

<?php 

if(isset($_POST['submit'])){
    
    $c_email = $_SESSION['customer_email'];
    
    $c_old_pass = $_POST['old_pass'];
    
    $c_new_pass = $_POST['new_pass'];
    
    $c_new_pass_again = $_POST['new_pass_again'];

    
    $sel_c_old_pass = "select * from tbl_customers where customer_email='$c_email'";
    
    $run_c_old_pass = mysqli_query($conn ,$sel_c_old_pass);
    
    $row_cus = mysqli_fetch_array($run_c_old_pass);

    $cus_old_pass = $row_cus['customer_pass'];

    
    if($c_old_pass != $cus_old_pass){
        
        echo "<script>alert('Sorry, your old password did not match. Please try again')</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('Sorry, your new password did not match')</script>";
        
        exit();
        
    }
    
    $update_c_pass = "update tbl_customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
    
    $run_c_pass = mysqli_query($conn ,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('Your password has been updated')</script>";
        
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        
    }
    
}

?>