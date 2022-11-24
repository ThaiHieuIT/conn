<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/product.css">
</head>
<body>
    <?php
        $con = new mysqli('localhost','root','','testting1');
        $q = $con->query('select * from category');
        $xau ='';
        while($r=$q->fetch_array()){
            $xau .= '<h1 class="title-name">'.$r['category_name'].'<br>'.'</h1>';
            $q1 = $con->query('select * from product where category_id='.$r['category_id']);
            while($r1=$q1->fetch_array()){
                $xau .='<img class="img-item" src="images/'
                .$r1["product_image"].'"/>';
        }}
    ?>

    <div class="product">
        <div class="product-name">
            <?php echo $xau ?>
        </div>
    </div>
</body>
</html>