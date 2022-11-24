<?php
    //Kết Nối CSDL
    $connect = mysqli_connect("localhost","root","","testting1");

    $q="Select * from category order by category_id ASC";
    $tab_result=mysqli_query($connect, $q);
    $s='';
    
    while($row = mysqli_fetch_array($tab_result)){
        $s .= '<br>'.$row["category_id"].' - '.$row["category_name"]; 
        $product_query = "select * from product where category_id='".$row["category_id"]."'";
        $product_result = mysqli_query($connect, $product_query);
        while($sub_row = mysqli_fetch_array($product_result))
            $s .= '<br>-----'.$sub_row["product_name"]." - ".'<img src="images/'.$sub_row["product_image"].'" width="30" height="30" />';
    }
?>
<html>
    <head>
        <title>Đọc dữ liệu từ Database</title>
        <meta http-equiv="content-type" charset="utf-8">
    </head>
    <body>
        <p><b>Đọc dữ liệu từ Database</b></p>
        <div class="product">
        <?php echo $s; ?>
        </div>
    </body>
</html>
