<?php
    require 'include/product-item.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $s = "select * from category";
    $s .= " where category_id=2";
    echo getData($s);
?>
</body>
</html>