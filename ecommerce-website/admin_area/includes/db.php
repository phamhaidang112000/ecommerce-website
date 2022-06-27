<?php 

     // Create contants to store non repeating value
    define("SEVERNAME",'localhost');
    define("DB_USERNAME",'phamhaidang');
    define("DB_PASSWORD",'123456789');
    define("DB_NAME",'ecom-store');

    $conn = mysqli_connect( SEVERNAME, DB_USERNAME , DB_PASSWORD , DB_NAME) or die(mysqli_error()); //Database conection

?>