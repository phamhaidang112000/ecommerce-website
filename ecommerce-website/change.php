<?php 

session_start();

$active='Cart';

include("includes/db.php");
include("functions/functions.php");

?>

<?php 

$ip_add = get_real_ip_user();

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $qty = $_POST['quantity'];
    $update_qty = "update tbl_cart set qty='$qty' where pro_id='$id' AND ip_add='$ip_add'";

    $run_qty = mysqli_query($conn,$update_qty);

}

?>