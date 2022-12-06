<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/product1.css">
</head>

<body>
    <style>
        .title-name {
            line-height: 80px;
            height: 80px;
            color: #fff;
            background-color: #009EFF;
        }

        .img-item {
            width: 24%;
            height: 300px;
            border: 1px solid #000;
            margin: 0 5px;
            border-radius: 5px;
        }
    </style>
    <?php
    class Category
    {
        var $category_id;
        var $category_name;
        function __construct($category_id, $category_name)
        {
            $this->category_id = $category_id;
            $this->category_name = $category_name;
        }
    }

    class SP{
        var $category_id;
        var $product_id;
        var $tensp;
        var $gia;
        var $soluong;
        function __construct($category_id,$product_id,$tensp, $gia, $soluong){
            $this->tensp=$tensp; 
            $this->gia=$gia; 
            $this->soluong=$soluong;
            $this->category_id=$category_id;
            $this->product_id=$product_id; 
        }
    }
    session_start();
    if(isset($_SESSION['A']))$A=$_SESSION['A'];
    else $A = array();

    function them(&$A,$category_id, $product_id, $tensp, $gia){
        for($i=0; $i<count($A); $i++)
            if($A[$i]->tensp==$tensp)break;
        if($i<count($A))$A[$i]->soluong++;
        else //array_push($A, array($tensp, $gia,1));
            $A[] = new SP($category_id, $product_id,$tensp, $gia,1);
    }

    function getArray($s)
    {
        $con = new mysqli('localhost', 'root', '', 'testting1');
        $q = $con->query($s);
        while ($r = $q->fetch_array()) {
            $arr[] = new Category($r['category_id'], $r['category_name']);
        }
        return $arr;
    }

    function getData($s)
    {
        $con = new mysqli('localhost', 'root', '', 'testting1');
        $q = $con->query($s);
        $xau = '<div>';
        while ($r = $q->fetch_array()) {
            $xau .= '<div class="title-name">' . $r['category_name'] . '<br>' . '</div>
                    <div class="product">';
            $q1 = $con->query('select * from product where category_id=' . $r['category_id']);
            while ($r1 = $q1->fetch_array()) {
                $xau .= '<div class="myImg"><img class="img-item" src="../images/' . $r1["product_image"] . '"/>
                            <h4>' . $r1['product_name'] . '</h4>
                            Price: ' . $r1['product_price'] . '
                            <h4><a href="menu.php?category_id='.$r['category_id'].'&product_id='.$r1['product_id'].' &product_name='.$r1['product_name'].' &product_price='.$r1['product_price'].'">Buy</a></h4>
                    </div>';
            }
            $xau .= '</div>';
            if ($q1->num_rows == 0) $xau .= "<h3>Chưa có sản phẩm cho mục này</h3><br>";
        }

        $con->close();
        return $xau;
    }

    ?>


</body>

</html>