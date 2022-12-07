<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./cart.css">
    <link rel="stylesheet" href="./menu.css">
    <link rel="stylesheet" href="./banner.css">
</head>
<body>
    
    <?php
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
        function tongtien($A){
            $tong=0;
            for($i=0; $i<count($A); $i++) $tong += $A[$i]->gia*$A[$i]->soluong;
            return $tong;
        }
        if(isset($_POST['add'])){
            //array_push($A, array($_POST['tensp'], $_POST['gia'],1));
            them($A,$_POST['category_id'], $_POST['product_id'], $_POST['tensp'], $_POST['gia']);
            $_SESSION['A']=$A; 
        }
        if(isset($_GET['xoatatca'])){
            session_destroy();
            unset($_SESSION['A']);
            header("location: cart.php");
        }
        if(isset($_GET['vitri'])){
            unset($A[$_GET['vitri']]);
            $A = array_values($A);
            $_SESSION['A']=$A;
            header("location: cart.php");
        }
        if(isset($_POST['soluong'])){
            for($i=0; $i<count($A); $i++){
                $A[$i]->soluong = $_POST['soluong'][$i];
            }
            $_SESSION['A']=$A;
        }
    ?>
    <h2>DANH SÁCH CÁC MẶT HÀNG TRONG GIỎ HÀNG</h2>
    <form action="index.php" method="post">
        <div style="text-align: right; width: 60%;">
            <a href="cart.php?xoatatca=*">Xóa giỏ hàng</a>
        </div>
        <table>
            <tr><th>TT</th><th>Tên sản phẩm</th><th>Đơn giá</th><th>Số lượng</th>
            <th>Thành tiền</th><th>Action</th></tr>
            <?php
            for($i=0; $i<count($A); $i++){
                $s='<tr><td>'.($i+1).'</td><td>'.$A[$i]->tensp.'</td><td>'.
                number_format($A[$i]->gia).'</td>
                <td><input type="text" style="width: 70px; text-align:right;" name=
                "soluong[]" value="'.$A[$i]->soluong.'">
                </td><td>'.($A[$i]->gia*$A[$i]->soluong).'</td><td>
                <a href="cart.php?vitri='.$i.'">Remove || </a>
                <a href="cart.php" onclick="document.forms[1].submit(); return false;">Update</a>
                </td></tr>';
                echo $s;
            }
            ?>
            <tr><td colspan="4"><b>Tổng tiền:</b></td><td colspan="2">
                <?php echo tongtien($A); ?></td></tr>
        </table>
    </form>
    <br>
    <a href="/conn/menu/menu.php">Trở Về Trang Chủ</a>
</body>
</html>