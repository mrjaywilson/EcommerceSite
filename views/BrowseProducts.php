<?php session_start(); require_once '../business/DatabaseService.php'; require_once '../models/Product.php'; ?>

<html>

<?php include('layout/_header.php'); ?>

<body>

<div align="center">

<hr/>

<h3>PRODUCT CATALOG</h3>

</div>

<hr/><br/>

<div align="center">
    	<div id="content-container">
            <table id="content_table">
                <tr>
                    <th width="30%">Product Name</th>
                    <th width="20%">Category</th>
                    <th width="20%">Sku</th>
                    <th width="20%">Cost</th>
                    <th width="5%">QTY</th>
                    <th width="5%">&nbsp;</th>
                </tr>
        
                <?php
                
                $i = 0;
                
                $db = new DatabaseService('');
                
                if (isset($_GET['page'])) {
                    $limit = $_GET['page'];
                } else {
                    $limit = 0;
                }
                
                $products = $db->getAllProducts(15, $limit);
                
                for ($i = 0; $i < count($products); $i++) {
                    echo "<tr>";
                    echo "<td><a href=\"ViewProduct.php?productid=" . $products[$i]['id'] . "\">" . $products[$i]['name'] . "</a></td>";
                    echo "<td>" . $products[$i]['category'] . "</td>";
                    echo "<td>" . $products[$i]['sku'] . "</td>";
                    echo "<td>" . $products[$i]['cost'] . "</td>";
                    echo "<form action=\"../controllers/CartController.php\">";
                    echo "<td><input type=\"text\" name=\"qty\" style=\"width: 75px;\"></td>";
                    echo "<td align=\"center\"><button class=\"btn btn-primary\" id=\"smallbtn\" name='productid' value='" . $products[$i]['id'] . "'><i class=\"fa fa-shopping-cart\"></i></button></td>";
                    echo "</form>";
                    echo "</tr>";
                    
                }
                
                ?>
            </table>
        </div>
</div>

</body>

<footer>

<?php include('layout/_footer.php'); ?>

</footer>

</html>