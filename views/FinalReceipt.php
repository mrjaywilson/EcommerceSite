<?php session_start(); require_once '../business/DatabaseService.php'; require_once '../models/Product.php';

$db = new DatabaseService('');

if (isset($_SESSION['KAVI'])) {
    if ($_SESSION['KAVI'] == true) {
        if (isset($_GET['orderno'])) {
            $orderno = $_GET['orderno'];
            
            $history = $db->getOrderHistory($orderno);
            
            //var_dump($history);
            
            $rec = array();
            
            if ($history) {
                
                foreach($history as $item) {
                    $id = $item->getProduct_id();
                    
                    $obj = $db->getProduct($id);
                    
                    array_push($rec, $obj);
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

<h3>ORDER COMPLETE!</h3>

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
                </tr>
        
                <?php
                
                $total = 0;
                
                if ($rec){
                    for ($i = 0; $i < count($rec); $i++) {
                        echo "<tr>";
                        echo "<td><a href=\"ViewProduct.php?productid=" . $rec[$i]->getId() . "\">" . $rec[$i]->getName() . "</a></td>";
                        echo "<td>" . $rec[$i]->getCategory() . "</td>";
                        echo "<td>" . $rec[$i]->getSku() . "</td>";
                        echo "<td>" . $rec[$i]->getCost() . "</td>";
                        echo "<td>" . $history[$i]->getQuantity() . "</td>";
                        echo "<form action=\"../controllers/CartController.php\">";
                        echo "<input type='hidden' name='productid' value=\"" . $rec[$i]->getId() . "\">";
//                         echo "<td align=\"center\"><button class=\"btn btn-primary\" id=\"smallbtn\" name='remove' value='" . $rec[$i]->getId() . "'>Remove</button></td>";
                        echo "</form>";
                        echo "</tr>";
                        
                        $total += (double)$rec[$i]->getCost() * $history[$i]->getQuantity();
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
                      		<button class="btn btn-primary" name="checkout">Print Receipt</button>
<!--                        		<button class="btn btn-primary" name="shop">Keep Shopping</button> -->
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