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
    
    <?php
        $m ='';
        if(isset($_POST['update'])){
            $conn = new mysqli('localhost','root','','testting1');
            $q = $conn->query('update Category set category_name="'.$_POST['categoryupdate'].'" where category_id='.$_GET['id']);
            $m = '<b>Update Successful</b>';
        }
    ?>

    <form action="" method="post">
        <input type="text" name="categoryupdate" value="<?php
            if(isset($_POST['categoryupdate'])) echo $_POST['categoryupdate'];
            else echo $_GET['name'];
        ?>">
        <input type="submit" name="update" value="Update">
    </form>
    <?php echo $m; ?>
    <br>
    <a href="category.php">Back</a>
</body>
</html>