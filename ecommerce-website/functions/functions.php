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

    function add_cart(){
    
        global $db_connection;
        
        if(isset($_GET['add_cart'])){
            
            $ip_add = get_real_ip_user();
            
            $p_id = $_GET['add_cart'];
            
            $product_qty = $_POST['product_qty'];
            
            $product_size = $_POST['product_size'];
            
            $check_product = "select * from tbl_cart where ip_add='$ip_add' AND pro_id='$p_id'";
            
            $run_check = mysqli_query($db_connection,$check_product);
            
            if(mysqli_num_rows($run_check)>0){
                
                echo "<script>alert('This product has already added in cart')</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
                
            }else{

                $get_price ="select * from tbl_products where product_id='$p_id'";

                $run_price = mysqli_query($db_connection,$get_price);

                $row_price = mysqli_fetch_array($run_price);

                $pro_price = $row_price['product_price'];

                $pro_sale = $row_price['product_sale'];

                $pro_label = $row_price['product_label'];

                if($pro_label == "sale"){

                    $product_price = $pro_sale;

                }else{

                    $product_price = $pro_price;

                }
                
                $query = "insert into tbl_cart (pro_id,ip_add,qty,p_price,size) values ('$p_id','$ip_add','$product_qty','$product_price','$product_size')";
                
                $run_query = mysqli_query($db_connection,$query);
                
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
                
            }
            
        }
    
    }

    function get_products() {
        global $db_connection;
        
        $query_get_products = "SELECT * FROM tbl_products ORDER BY 1 DESC LIMIT 0,8"; // ORDER BY 1 DESC : sap xep giam dan theo ID

        $res_products = mysqli_query($db_connection, $query_get_products);

        while ($row_product = mysqli_fetch_array($res_products)){
                $pro_id = $row_product['product_id'];
        
                $pro_title = $row_product['product_title'];
                
                $pro_price = $row_product['product_price'];

                $pro_sale_price = $row_product['product_sale'];
                
                $pro_img1 = $row_product['product_img1'];

                $pro_label = $row_product['product_label'];

                $manufacturer_id = $row_product['manufacturer_id'];

                $get_manufacturer = "select * from tbl_manufacturers where manufacturer_id='$manufacturer_id'";

                $run_manufacturer = mysqli_query($db_connection,$get_manufacturer);

                $row_manufacturer = mysqli_fetch_array($run_manufacturer);

                $manufacturer_title = $row_manufacturer['manufacturer_title'];

                if($pro_label == "sale"){

                    $product_price = " <del> $ $pro_price </del> ";

                    $product_sale_price = "/ $ $pro_sale_price ";

                }else{

                    $product_price = "  $ $pro_price  ";

                    $product_sale_price = "";

                }

                if($pro_label == ""){

                }else{

                    $product_label = "
                    
                        <a href='#' class='label $pro_label'>
                        
                            <div class='theLabel'> $pro_label </div>
                            <div class='labelBackground'>  </div>
                        
                        </a>
                    
                    ";

                }

                 echo "
                        <div class='col-md-4 col-sm-6 single'>
                        
                            <div class='product'>
                            
                                <a href='details.php?pro_id=$pro_id'>
                                
                                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                
                                </a>
                                
                                <div class='text'>
                                    <center>
                
                                        <p style='color: rgb(79, 191, 168);'>$manufacturer_title </p>
                                    
                                    </center>
                                
                                    <h3>
                            
                                        <a href='details.php?pro_id=$pro_id'>

                                            $pro_title

                                        </a>
                                    
                                    </h3>
                                    
                                    <p class='price'>
                                    
                                        $product_price &nbsp;$product_sale_price
                                    
                                    </p>
                                    
                                    <p class='button'>
                                    
                                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                            View Details

                                        </a>
                                    
                                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                            <i class='fa fa-shopping-cart'></i> Add to Cart

                                        </a>
                                    
                                    </p>
                                
                                </div>

                                $product_label
                            
                            </div>
                        
                        </div>
                        
                        ";
        }
    }


    function get_product_categories(){
        global $db_connection;

        $query_get_product_categories = "SELECT * FROM tbl_product_categories";

        $res_get_product_categories = mysqli_query($db_connection, $query_get_product_categories);

        while ($row_pro_categories = mysqli_fetch_array($res_get_product_categories)){
                $p_cat_id = $row_pro_categories['p_cat_id'];
                $p_cat_title = $row_pro_categories['p_cat_title'];

                echo"
                    <li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a></li>
                ";
        }
    }

    function get_categories(){
        global $db_connection;

        $query_get_categories = "SELECT * FROM tbl_categories";

        $res_get_categories = mysqli_query($db_connection, $query_get_categories);

        while ($row_categories = mysqli_fetch_array($res_get_categories)){
                $category_id = $row_categories['category_id'];
                $category_title = $row_categories['category_title'];

                echo"
                    <li><a href='shop.php?cat=$category_id'> $category_title </a></li>
                ";
        }
    }

    function get_products_from_pro_categories(){
        global $db_connection;
    
        if(isset($_GET['p_cat'])){
            
            $p_cat_id = $_GET['p_cat'];
            
            $get_p_cat ="select * from tbl_product_categories where p_cat_id='$p_cat_id'";
            
            $run_p_cat = mysqli_query($db_connection,$get_p_cat);
            
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            
            $p_cat_title = $row_p_cat['p_cat_title'];
            
            $p_cat_desc = $row_p_cat['p_cat_desc'];
            
            $get_products ="select * from tbl_products where p_cat_id='$p_cat_id' limit 0,6";
            
            $run_products = mysqli_query($db_connection,$get_products);
            
            $count = mysqli_num_rows($run_products);
            
            if($count==0){
                
                echo "
                
                    <div class='box'>
                    
                        <h1> No Product Found In This Product Categories </h1>
                    
                    </div>
                
                ";
                
            }else{
                
                echo "
                
                    <div class='box'>
                    
                        <h1> $p_cat_title </h1>
                        
                        <p> $p_cat_desc </p>
                    
                    </div>
                
                ";
                
            }
            
            while($row_products=mysqli_fetch_array($run_products)){
                
                $pro_id = $row_products['product_id'];
            
                $pro_title = $row_products['product_title'];

                $pro_price = $row_products['product_price'];

                $pro_img1 = $row_products['product_img1'];
                
                echo "
                
                    <div class='col-md-4 col-sm-6 center-responsive'>
            
                        <div class='product'>
                        
                            <a href='details.php?pro_id=$pro_id'>
                            
                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                            
                            </a>
                            
                            <div class='text'>
                            
                                <h3>
                        
                                    <a href='details.php?pro_id=$pro_id'>

                                        $pro_title

                                    </a>
                                
                                </h3>
                                
                                <p class='price'>
                                
                                    $ $pro_price
                                
                                </p>
                                
                                <p class='button'>
                                
                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                        View Details

                                    </a>
                                
                                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                        <i class='fa fa-shopping-cart'></i> Add to Cart

                                    </a>
                                
                                </p>
                            
                            </div>
                        
                        </div>
                    
                    </div>
                
                ";
                
            }
            
        }
    }

    function get_products_from_categories(){
        global $db_connection;
    
        if(isset($_GET['cat'])){
            
            $cat_id = $_GET['cat'];
            
            $get_cat = "select * from tbl_categories where category_id='$cat_id'";
            
            $run_cat = mysqli_query($db_connection,$get_cat);
            
            $row_cat = mysqli_fetch_array($run_cat);
            
            $cat_title = $row_cat['category_title'];
            
            $cat_desc = $row_cat['category_desc'];
            
            $get_cat = "select * from tbl_products where cat_id='$cat_id' limit 0,6";
            
            $run_products = mysqli_query($db_connection,$get_cat);
            
            $count = mysqli_num_rows($run_products);
            
            if($count==0){
                
                
                echo "
                
                    <div class='box'>
                    
                        <h1> No Product Found In This Category </h1>
                    
                    </div>
                
                ";
                
            }else{
                
                echo "
                
                    <div class='box'>
                    
                        <h1> $cat_title </h1>
                        
                        <p> $cat_desc </p>
                    
                    </div>
                
                ";
                
            }
            
            while($row_products=mysqli_fetch_array($run_products)){
                
                $pro_id = $row_products['product_id'];
                
                $pro_title = $row_products['product_title'];
                
                $pro_price = $row_products['product_price'];
                
                $pro_desc = $row_products['product_desc'];
                
                $pro_img1 = $row_products['product_img1'];
                
                echo "
                
                    <div class='col-md-4 col-sm-6 center-responsive'>
                                        
                        <div class='product'>
                                            
                            <a href='details.php?pro_id=$pro_id'>
                                                
                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                                
                            </a>
                                                
                            <div class='text'>
                                                
                                <h3>
                                                    
                                    <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                                                    
                                </h3>
                                                
                            <p class='price'>

                                $$pro_price

                            </p>

                                <p class='buttons'>

                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                    View Details

                                    </a>

                                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                    <i class='fa fa-shopping-cart'></i> Add To Cart

                                    </a>

                                </p>
                                                
                            </div>
                                            
                        </div>
                                        
                    </div>
                
                ";
                
            }
        
        }
    }

    function recommend_products(){
        global $db_connection;

        $get_offer_product = "select * from tbl_products order by rand() LIMIT 0,3"; // order by rand() sẽ sắp xếp ngẫu nhiên các bản ghi
                   
        $run_offer_product = mysqli_query($db_connection,$get_offer_product);
                   
        while($row_offer_product=mysqli_fetch_array($run_offer_product)){
                       
            $offer_pro_id = $row_offer_product['product_id'];
                       
            $offer_pro_title = $row_offer_product['product_title'];
                       
            $offer_pro_img1 = $row_offer_product['product_img1'];
                       
            $offer_pro_price = $row_offer_product['product_price'];
                       
            echo "
                       
            <div class='col-md-3 col-sm-6 center-responsive'>
                        
                <div class='product same-height'>
                            
                    <a href='details.php?pro_id=$offer_pro_id'>
                                
                        <img class='img-responsive' src='admin_area/product_images/$offer_pro_img1'>
                                
                    </a>
                                
                    <div class='text'>
                                
                        <h3> <a href='details.php?pro_id=$offer_pro_id'> $offer_pro_title </a> </h3>
                                    
                        <p class='price'> $ $offer_pro_price </p>
                                
                    </div>
                            
                </div>
                        
            </div>
                       
            ";
                       
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
            $p_price = $row_cart_pro['p_price'];
         
            $total_price += $p_price * $qty;
        }

        echo $total_price;

    }


    /// Begin getProducts(); functions ///

function getProducts(){

    global $db_connection;
    $aWhere = array();

    /// Begin for Manufacturer ///
    
    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

        foreach($_REQUEST['man'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'manufacturer_id='.(int)$sVal;

            }

        }

    }

    /// Finish for Manufacturer ///  

    /// Begin for Product Categories /// 

    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'p_cat_id='.(int)$sVal;

            }

        }

    }    

    /// Finish for Product Categories /// 

    /// Begin for Categories /// 

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'cat_id='.(int)$sVal;

            }

        }

    }    

    /// Finish for Categories /// 

    $per_page=6;

    if(isset($_GET['page'])){

        $page = $_GET['page'];

    }else{
        $page=1;
    }

    $start_from = ($page-1) * $per_page;
    $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' and ',$aWhere):'').$sLimit;
    $get_products = "select * from tbl_products ".$sWhere;
    $run_products = mysqli_query($db_connection,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){

        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_sale_price = $row_products['product_sale'];
        $pro_img1 = $row_products['product_img1'];
        $pro_label = $row_products['product_label'];
        $manufacturer_id = $row_products['manufacturer_id'];
         
        $get_manufacturer = "select * from tbl_manufacturers where manufacturer_id='$manufacturer_id'";

        $run_manufacturer = mysqli_query($db_connection,$get_manufacturer);

        $row_manufacturer = mysqli_fetch_array($run_manufacturer);

        $manufacturer_title = $row_manufacturer['manufacturer_title'];

        if($pro_label == "sale"){

            $product_price = " <del> $ $pro_price </del> ";

            $product_sale_price = "/ $ $pro_sale_price ";

        }else{

            $product_price = "  $ $pro_price  ";

            $product_sale_price = "";

        }

        if($pro_label == ""){

        }else{

            $product_label = "
            
                <a href='#' class='label $pro_label'>
                
                    <div class='theLabel'> $pro_label </div>
                    <div class='labelBackground'>  </div>
                
                </a>
            
            ";

        }

        echo "
            <div class='col-md-4 col-sm-6 center-responsive'>

                <div class='product'>

                    <a href='details.php?pro_id=$pro_id'>

                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                    </a>

                    <div class='text'>

                        <center>
                
                            <p style='color: rgb(79, 191, 168);'> $manufacturer_title </p>
                    
                        </center>
                    
                        <h3>
                
                            <a href='details.php?pro_id=$pro_id'>

                                $pro_title

                            </a>
                        
                        </h3>

                        <p class='price'>$product_price &nbsp;$product_sale_price </p>
                        <p class='buttons'>

                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>View Details</a>
                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                            
                                <i class='fa fa-shopping-cart'></i> Add To Cart 
                            
                            </a>

                        </p>

                    </div>

                    $product_label

                </div>

            </div>
        ";
    }

}

/// finish getProducts(); functions ///

/// begin getPaginator(); functions ///

function getPaginator(){

    global $db_connection;

    $per_page=6;
    $aWhere = array();
    $aPath = '';

    /// Begin for Manufacturer ///
    
    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

        foreach($_REQUEST['man'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'manufacturer_id='.(int)$sVal;
                $aPath .= 'man[]='.(int)$sVal.'&';

            }

        }

    }

    /// Finish for Manufacturer ///  

    /// Begin for Product Categories /// 

    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'p_cat_id='.(int)$sVal;
                $aPath .= 'p_cat[]='.(int)$sVal.'&';

            }

        }

    }    

    /// Finish for Product Categories /// 

    /// Begin for Categories /// 

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'cat_id='.(int)$sVal;
                $aPath .= 'cat[]='.(int)$sVal.'&';

            }

        }

    }    

    /// Finish for Categories ///   
    
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' and ',$aWhere):'');
    $query = "select * from tbl_products".$sWhere;
    $result = mysqli_query($db_connection,$query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records / $per_page);

    echo "<li> <a href='shop.php?page=1";
    if(!empty($aPath)){

        echo "&".$aPath;

    }

    echo "'>".'First Page'."</a></li>";

    for($i=1; $i<=$total_pages; $i++){

        echo "<li> <a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a></li>";

    };

    echo "<li> <a href='shop.php?page=$total_pages";

    if(!empty($aPath)){

        echo "&".$aPath;

    }

    echo "'>".'Last Page'."</a></li>";

}

/// finish getPaginator(); functions ///

?>