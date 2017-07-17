<?php session_start();?>
<?php
$order = fopen("order.txt", "a") or die("Unable to open file!");
flock($order,LOCK_EX);
for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
	$sub_total = 0.00;
	foreach ($_SESSION['cart'][$i]['plm'] as $key => $value) {
		if ($value != 0) {
			$product_type = $_SESSION['cart'][$i]['Media'];
			if ($key == 's1') {
				$product_name = 'PLM Season1'.' '.$product_type;
				$unitprice = 17.00;
			} elseif ($key == 's2') {
				$product_name = 'PLM Season2'.' '.$product_type;
				$unitprice = 22.50;
			} else {
				$product_name = 'PLM Season3'.' '.$product_type;
				$unitprice = 26.75;
			}
			$subtotal = $unitprice * $value;
			$txt = getdate()['mday'].'-'.getdate()['month'].'-'.getdate()['year'].','.$product_name.','.$value.','.$unitprice.','.$subtotal;
			fwrite($order, $txt."\n");
		}
	}
}
flock($order,LOCK_UN);
fclose($order);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'topper.php';?>
	<title>Confirmation</title>
</head>
<script>
	function returnInfo(value){
		var info = "Your purchase is completed successfully"
		document.getElementById('returninfo').innerHTML=info;
	}

</script>

<body>
<?php include 'header.php';?>
<?php
$total = 0.00;
$dd = getdate()['mday'];
$mm = getdate()['month'];
$yyyy = getdate()['year'];
$today = $dd.'-'.$mm.'-'.$yyyy;
echo "<p id=\"purchsedate\">$today</p>";
echo "<div class='confirmation'>";
echo "<table id='confirm-table'>";
echo "<th>Item</th>";
echo "<th>Quantity</th>";
echo "<th>Unit Price</th>";
echo "<th>Subtotal</th>";
echo "<th></th>";
echo "<tr>";


for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
	$sub_total = 0.00;
	foreach ($_SESSION['cart'][$i]['plm'] as $key => $value) {
		if ($value != 0) {
			$product_type = $_SESSION['cart'][$i]['Media'];
			if ($key == 's1') {
				$product_name = 'PLM Season1'.' '.$product_type;
				$unitprice = 17.00;
			} elseif ($key == 's2') {
				$product_name = 'PLM Season2'.' '.$product_type;
				$unitprice = 22.50;
			} else {
				$product_name = 'PLM Season3'.' '.$product_type;
				$unitprice = 26.75;
			}
			//--------Item------------------------------------------
			echo "<td>";
			echo $product_name;
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
session_destroy();
?>
<button id="confirmbutton" onclick="returnInfo()">Confirm</button></a><br>
<span id="returninfo"></span>

<?php include 'footer.php';?>
</body>

</html>