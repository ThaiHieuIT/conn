<?php require '../include/product-item.php'; ?>
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
                        <?php
                        $arr = getArray('Select * from category');
                        $s = '';
                        for ($i = 0; $i < count($arr); $i++) {
                            $s .= '<li><a href="menu.php?category_id=' .
                                $arr[$i]->category_id . '">' . $arr[$i]->category_name . '</a></li>';
                        }
                        echo $s;
                        ?>
                        <!-- <li><a href="">Electrics & Computers</a></li>
                        <li><a href="">Home, Garden & Tools</a></li>
                        <li><a href="">Handmade</a></li> -->
                    </ul>
                </li>
                <li><a href="">Contact</a></li>
                <li><a href="">About</a></li>,
                <li><a href="">Tour</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </div>
        <?php 
        $s ="Select * from category";
        if(isset($_GET['category_id'])){
          $s .= " where category_id = ".$_GET['category_id'];
        }
        echo getData($s);
        ?>
        
        <div class="content">
        </div>
    </div>
</body>

</html>