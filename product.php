<?php
    $conn = new mysqli('localhost','root','','testting1'); //Kết nối mysql
    
    //Lấy dữ liệu từ bảng product
    $q = $conn->query('select * from product');
    $s = '';
    while($r = $q->fetch_array()) {
        $s .= '
        <tr>
            <td>'.$r['product_id'].'</td>
            <td>'.$r['product_name'].'</td>
            <td>'.$r['product_image'].'</td>
            <td>'.$r['product_price'].'</td>
            <td><a href="product.php?id='.$r['product_id'].'">Remove</a></td>
        </tr>
        ';
    }
    //Lấy dữ liệu từ bản category
    $q1 = $conn->query('select * from category');
    $s1 = '';
    while($r1 = $q1->fetch_array()) {
        ;
        $s1 .= '<option value="'.$r1['category_id'].'">'.$r1['category_name'].'</option>';
    }

    //Thêm dữ liệu
    if(isset($_POST['add'])){
        $q = $conn->query('insert into product(category_id,product_id,product_name,product_image,product_price) 
        values("'.$_POST['choice'].'","'.$_POST['productid'].'","'.$_POST['productname'].'","'.$_POST['productimage'].'","'.$_POST['productprice'].'") ');
    }

    //Xóa dữ liệu
    if(isset($_GET['id'])){
        $q = $conn->query('delete from product where product_id='.$_GET['id']);
        header("location: product.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h2>CATEGORY TABLE</h2>
    <form action="" method="post">
        <table>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php echo $s; ?>
        </table>
    </form>
    <br>
    <h2>Input new category</h2>
    <form action="" method="post">
        Choose Category: <br>
        <select name="choice">
            <?php echo $s1; ?>
        </select> <br>
        ID: <br>
        <input type="text" name="productid" placeholder="Enter Product ID"> <br>
        Name: <br>
        <input type="text" name="productname" placeholder="Enter Product Name"> <br>
        Image: <br>
        <input type="text" name="productimage" placeholder="Enter Product Image"> <br>
        Price: <br>
        <input type="text" name="productprice" placeholder="Enter Product Image"> <br> <br>
        <input type="submit" name="add" value="ADD" >
    </form>
</body>
</html>