<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'topper.php';?>
	<title>Cart</title>
</head>

<body>
<?php include 'header.php';?>
<?php
$total = 0.00;

echo "<div class='shopcart'>";
echo "<table id='cart-table'>";
echo "<th>Product Name</th>";
echo "<th>Product Type</th>";
echo "<th>Quantity</th>";
echo "<th>Unit Price</th>";
echo "<th>Subtotal</th>";
echo "<th></th>";
echo "<tr>";


for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
	$sub_total = 0.00;
	foreach ($_SESSION['cart'][$i]['plm'] as $key => $value) {
		if ($value != 0) {
			if ($key == 's1') {
				$product_name = 'PLM Season1';
				$unitprice = 17.00;
			} elseif ($key == 's2') {
				$product_name = 'PLM Season2';
				$unitprice = 22.50;
			} else {
				$product_name = 'PLM Season3';
				$unitprice = 26.75;
			}
			//--------Product Name----------------------------------
			echo "<td>";
			echo $product_name;
			echo "</td>";
			//--------Product Type----------------------------------
			echo "<td>";
			$product_type = $_SESSION['cart'][$i]['Media'];
			echo $product_type;
			echo "</td>";
			//--------Quantity--------------------------------------
			echo "<td>";
			echo $value;
			echo "</td>";
			//--------Unit Price------------------------------------
			echo "<td>";
			echo '$', $unitprice;
			echo "</td>";
			//--------Subtotal--------------------------------------
			echo "<td>";
			$subtotal = $unitprice * $value;
			echo '$', $subtotal;
			echo "</td>";
			//--------Delete Button---------------------------------
			echo "<td>";
			echo "<div class = 'sc_delete' >";
			echo "<form method='post' action='delete.php' >";
			$deleteKey = $key.' '.$product_type;
			echo "<input type='hidden' name='key' value = '$deleteKey' />";
			echo "<button class=\"delete-button\">Delete</button>";
			echo "</form></div>";
			echo "</td>";
			echo "</tr>";
			$total = $total + $subtotal;
		}
	}
}


echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td>";

echo "</td>";
echo "<td>";
echo "<h3>Total Price is: ", '$';
echo sprintf("%0.2f", $total);
echo "</h3></td>";

echo "</table>";
echo "</div>";
?>
<a href="checkout.php" id="custbutton"><button>Checkout</button></a>

<?php include 'footer.php';?>
</body>

</html>