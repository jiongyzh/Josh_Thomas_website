
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <?php
    function setValue(&$var) {
        $var = 0;
    }
    $postvalue = $_POST['key'];
    $keyArray = explode(" ", $postvalue);
    for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
        foreach ($_SESSION['cart'][$i]['plm'] as $key => $value) {
            if ($key == $keyArray[0] && $_SESSION['cart'][$i]['Media'] == $keyArray[1]) {
                setValue($_SESSION['cart'][$i]['plm'][$key]);
            }
        }
    }
    header("Location: cart.php");
    ?>
</head>

<body>

</body>
<?php include_once('/home/eh1/e54061/public_html/wp/debug.php'); ?>
</html>