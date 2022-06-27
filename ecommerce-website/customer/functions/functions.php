<?php 
    $servername = 'localhost';
    $username = 'phamhaidang';
    $password = '123456789';
    $db_name = 'ecom-store';

    $db_connection = mysqli_connect( $servername, $username , $password , $db_name) or die(mysqli_error());

     function get_real_ip_user(){
        switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
        }
    }
    
     function total_items(){
        global $db_connection;

        $ip_address = get_real_ip_user();

        $query_total_items = "select * from tbl_cart where ip_add = '$ip_address'";

        $res_total_items = mysqli_query($db_connection, $query_total_items);

        $count_items= mysqli_num_rows($res_total_items);

        echo $count_items;
    }

    function total_price(){
        global $db_connection;

        $total_price = 0;

        $ip_address = get_real_ip_user();

        $query_get_cart_pro = "select * from tbl_cart where ip_add = '$ip_address'";

        $res_get_cart_pro = mysqli_query($db_connection,$query_get_cart_pro);

        while($row_cart_pro = mysqli_fetch_array($res_get_cart_pro)){
            $pro_id = $row_cart_pro['pro_id'];
            $qty = $row_cart_pro['qty'];

            $query_get_pro_info = "select * from tbl_products where product_id = $pro_id";

            $res_pro_info = mysqli_query($db_connection,$query_get_pro_info);

            $row_pro_info = mysqli_fetch_array($res_pro_info);
            
            $product_price = $row_pro_info['product_price'];

            $total_price += $product_price * $qty;
            
        }

        echo $total_price;

    }

?>