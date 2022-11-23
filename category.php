<?php
    $conn = new mysqli('localhost','root','','testting1');

    if(isset($_POST['add'])){
        $q = $conn->query('insert into category(category_id,category_name) values("'.$_POST['categoryid'].'","'.$_POST['categoryname'].'") ');
    }

    if(isset($_GET['id'])){
        $q = $conn->query('delete from category where category_id='.$_GET['id']);
        header("location: category.php");
    }

    $q = $conn->query('select * from category');
    $s = '';
    while($r = $q->fetch_array()) {
        $s .= '
        <tr>
            <td>'.$r['category_id'].'</td>
            <td>'.$r['category_name'].'</td>
            <td>
                <a href="category.php?id='.$r['category_id'].'">Remove</a> || 
                <a href="update.php?id='.$r['category_id'].'&name='.$r['category_name'].'">Update</a>
            </td>
        </tr>
        ';
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
            <tr><th>ID</th><th>Categoty</th><th>Action</th></tr>
            <?php echo $s; ?>
        </table>
    </form>
    <br>
    <h2>Input new category</h2>
    <form action="" method="post">
        <input type="text" name="categoryid" placeholder="Input category_id new">
        <input type="text" name="categoryname" placeholder="Input category_name new">
        <input type="submit" name="add" value="Add">
    </form>
</body>
</html>