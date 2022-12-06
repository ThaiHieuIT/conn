<?php require '../include/product-item.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./banner.css">
    <!-- <link rel="stylesheet" href="./menu.css"> -->
    <link rel="stylesheet" href="./menu2.css">
</head>

<body>
    <?php 
        if(isset($_GET['category_id']) && isset($_GET['product_id']) && isset($_GET['product_name']) && isset($_GET['product_price'])){
            them($A, $_GET['category_id'], $_GET['product_id'], $_GET['product_name'], $_GET['product_price']);
            $_SESSION['A']=$A;
            header("location: menu.php");
        }
    ?>
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
                    <a href="/conn/menu/menu.php">All</a>
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
                    </ul>
                </li>
                <li><a href="">Contact</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Sign In</a></li>
                <li>
                    <a href="/conn/cart/cart.php">Cart</a>
                    <span class="number_cart">
                        <?php
                            if(isset($_SESSION['A'])){
                                $A= $_SESSION['A'];
                                echo count($A);
                            }else echo "0";
                        ?>
                    </span>
                </li>
            </ul>
        </div>
        <div class="banner">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="//cdn.shopify.com/s/files/1/0263/9501/7288/files/slide2_1920x780.jpg?v=1614725307" style="width:100%">
                        <div class="text">Caption Text</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="//cdn.shopify.com/s/files/1/0273/1697/7739/files/slide3_1920x780.jpg?v=1613534819" style="width:100%">
                        <div class="text">Caption Two</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="//cdn.shopify.com/s/files/1/0271/0057/7840/files/sl1_1920x780.jpg?v=1613725225" style="width:100%">
                        <div class="text">Caption Three</div>
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>

                <script>
                    let slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                        showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                        showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                        let i;
                        let slides = document.getElementsByClassName("mySlides");
                        let dots = document.getElementsByClassName("dot");
                        if (n > slides.length) {
                            slideIndex = 1
                        }
                        if (n < 1) {
                            slideIndex = slides.length
                        }
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex - 1].style.display = "block";
                        dots[slideIndex - 1].className += " active";
                    }
                </script>
        </div>
        <div class="content">
            <?php
            $s = "Select * from category";
            if (isset($_GET['category_id'])) {
                $s .= " where category_id = " . $_GET['category_id'];
            }
            echo getData($s);
            ?>
        </div>
    </div>
</body>

</html>