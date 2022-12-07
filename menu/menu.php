<?php 
    require '../include/product-item.php'; 
    require '../include/masterpage.php';
    myHeader();                            
?>
            <?php
            $s = "Select * from category";
            if (isset($_GET['category_id'])) {
                $s .= " where category_id = " . $_GET['category_id'];
            }
            echo getData($s);
            ?>
    <?php 
    myFooter() 
    ?>