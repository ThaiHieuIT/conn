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
    <style>
        .title-name{
            line-height: 80px;
            height: 80px;
            color: #fff;
            background-color: #009EFF;
        }
        .img-item{
            width: 24%;
            height: 300px;
            border: 1px solid #000;
            margin: 0 5px;
            border-radius: 5px;
        }
    </style>
    <?php
        class Category{
            var $category_id;
            var $category_name;
            function __construct( $category_id,$category_name){
                $this -> category_id = $category_id;
                $this -> category_name = $category_name;
            }
        }
    
        function getArray($s){
            $con = new mysqli('localhost','root','','testting1');
            $q = $con->query($s);
            while($r=$q->fetch_array()){
                $arr[] = new Category($r['category_id'],$r['category_name']);
            }
            return $arr;
        }

        function getData($s){
            $con = new mysqli('localhost','root','','testting1');
            $q = $con->query($s);
            $xau ='';
            while($r=$q->fetch_array()){
                $xau .= '<h1 class="title-name">'.$r['category_name'].'<br>'.'</h1>';
                $q1 = $con->query('select * from product where category_id='.$r['category_id']);
                while($r1=$q1->fetch_array()){
                    $xau .='<img class="img-item" src="../images/'
                    .$r1["product_image"].'"/>';
                }
            if($q1->num_rows==0)$xau.="<h3>Chưa có sản phẩm cho mục này</h3><br>";
            }  
            
            $con->close();
            return $xau;
        }
       
    ?>

    
</body>
</html>