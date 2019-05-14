<?php

session_start();

require_once '../models/Product.php';
require_once '../business/DatabaseService.php';

$db = new DatabaseService('');

$product = null;

if (isset($_GET['product'])) {
    $product = $_GET['product'];
} else {
    // fail
}

$product = $db->getProduct($product);

?>

<html>
<head>

</head>

<body>

<?php include 'layout/_menu.php'; ?>

<div align="center">
    <h3>ADD NEW PRODUCT</h3>
</div>

<hr/><br/>

<div align="center">
    <form action="../controllers/ProductController.php">
        <table>
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <input name="name" type="text" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Category
                </td>
                <td>
                    <input name="category" type="text" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Description
                </td>
                <td>
                    <input name="description" type="text" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    SKU
                </td>
                <td>
                    <input name="sku" type="text" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Cost
                </td>
                <td>
                    <input name="cost" type="text" value="" required>
                </td>
            </tr>
            <tr>
                <td align="left">
                	<button id="button" name="cancel" value="cancel">cancel</button>
                </td>
                <td align="right">
                    <button id="button" name="create" value="create">add</button>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                	<span>* All fields required.</span>
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>

</html>