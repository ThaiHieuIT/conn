<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./menu.css">
</head>

<body>
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <img src="../images/logofavicon.png" alt="">
            </div>
            <div class="search">
                <input type="text" placeholder="Search...">
            </div>
            <ul id="nav">
                <li>
                    <a href="">All</a>
                    <ul class="subnav">
                        <li><a href="">Electrics & Computers</a></li>
                        <li><a href="">Home, Garden & Tools</a></li>
                        <li><a href="">Handmade</a></li>
                    </ul>
                </li>
                <li><a href="">Contact</a></li>
                <li><a href="">About</a></li>,
                <li><a href="">Tour</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </div>
        <?php
        $con = new mysqli('localhost', 'root', '', 'testting1');
        $q = $con->query('select * from category');
        $xau = '';
        while ($r = $q->fetch_array()) {
            $xau .= '<h1 class="title-name">' . $r['category_name'] . '<br>' . '</h1>';
            $q1 = $con->query('select * from product where category_id=' . $r['category_id']);
            while ($r1 = $q1->fetch_array()) {
                $xau .= '<img class="img-item" src="../images/'
                    . $r1["product_image"] . '"/>';
            }
            if ($q1->num_rows == 0) $xau .= "<h3>Chưa có sản phẩm cho mục này</h3><br>";
        }
        ?>
        <div class="content">
            <?php echo $xau; ?>
        </div>
    </div>
</body>

</html>