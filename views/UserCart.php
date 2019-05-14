<?php session_start(); require_once '../business/DatabaseService.php'; require_once '../models/Product.php';

$db = new DatabaseService('');

if (isset($_SESSION['KAVI'])) {
    if ($_SESSION['KAVI'] == true) {
        if (isset($_SESSION['userid'])) {
            $userid = $_SESSION['userid'];

            $cart = $db->getCart($userid);
            
            $products = array();
            
            if ($cart) {
                
                for ($i = 0; $i < count($cart); $i++) {
                    
                    array_push($products, $db->getProduct($cart[$i]['product_id']));
                }
            }
        }
    }
}

?>

<html>

<?php include('layout/_header.php'); ?>

<body>

<div align="center">

<hr/>

<h3>MY CART</h3>

</div>

<hr/><br/>

<div align="center">
    	<div id="content-container">
            <table id="content_table">
                <tr>
                    <th width="30%">Product Name</th>
                    <th width="20%">Category</th>
                    <th width="25%">Sku</th>
                    <th width="20%">Cost</th>
                    <th width="20%">QTY</th>
                    <th width="5%">&nbsp;</th>
                </tr>
        
                <?php
                
                $total = 0;
                
                if ($products){
                    for ($i = 0; $i < count($products); $i++) {
                        echo "<tr>";
                        echo "<td><a href=\"ViewProduct.php?productid=" . $products[$i]->getId() . "\">" . $products[$i]->getName() . "</a></td>";
                        echo "<td>" . $products[$i]->getCategory() . "</td>";
                        echo "<td>" . $products[$i]->getSku() . "</td>";
                        echo "<td>" . $products[$i]->getCost() . "</td>";
                        echo "<td>" . $cart[$i]['qty'] . "</td>";
                        echo "<form action=\"../controllers/CartController.php\">";
                        echo "<input type='hidden' name='productid' value=\"" . $products[$i]->getId() . "\">";
                        echo "<td align=\"center\"><button class=\"btn btn-primary\" id=\"smallbtn\" name='remove' value='" . $products[$i]->getId() . "'>Remove</button></td>";
                        echo "</form>";
                        echo "</tr>";
                        
                        $total += (double)$products[$i]->getCost() * $cart[$i]['qty'];
                    }
                } else {
                    echo "<tr><td colspan='5' align='center'>Nothing in cart.<td></tr>";
                }
                
                
                ?>
                <tr>
                <td colspan="3" align="right">
                	Cart Total&nbsp;&nbsp;
                </td>
                <td id="total">
                	$<?php echo $total; ?>
                </td>
                </tr>
                <tr>
                    <td colspan="6" align="right">
                    	<form action="../controllers/CheckoutController.php">
                      		<button class="btn btn-primary" name="checkout">Checkout</button>
                       		<button class="btn btn-primary" name="shop">Keep Shopping</button>
                    	</form>
                    </td>
                </tr>
            </table>
        </div>
</div>

</body>

<footer>

<?php include('layout/_footer.php'); ?>

</footer>

</html>