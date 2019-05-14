<html>
<head>

</head>

<body>

<?php include 'layout/_menu.php'; ?>

<div align="center">
    <h3>PRODUCT MANAGEMENT</h3>
</div>

<hr/><br/>

<div align="center">
    <form action="../controllers/ProductController.php">
		<button id="smallbtn" name="add">Add New Product</button><br/>
        <div id="content-container">
            <table id="content_table">
                <tr>
                    <th width="15%">Product Name</th>
                    <th width="20%">Category</th>
                    <th width="20%">Sku</th>
                    <th width="20%">Cost</th>
                    <th width="20%">Action</th>
                    <th width="20%">&nbsp;</th>
                </tr>
        
                <?php
                
                require_once '../business/DatabaseService.php';
                
                $i = 0;
                
                $db = new DatabaseService('');
                
                $products = $db->getAllProducts(200, 0);
                
                for ($i = 0; $i < count($products); $i++) {
                    echo "<tr>";
                    echo "<td>" . $products[$i]['name'] . "</td>";
                    echo "<td>" . $products[$i]['category'] . "</td>";
                    echo "<td>" . $products[$i]['sku'] . "</td>";
                    echo "<td>" . $products[$i]['cost'] . "</td>";
                    echo "<td align=\"center\"><button id=\"smallbtn\" name='edit' value='" . $products[$i]['id'] . "'>Edit</button></td>";
                    echo "<td align=\"center\"><button id=\"smallbtn\" name='delete' value='" . $products[$i]['id'] . "'>Delete</button></td>";
                    echo "</tr>";
                }
                
                ?>
            </table>
        </div>
    </form>
</div>