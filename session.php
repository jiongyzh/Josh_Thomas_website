<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <?php
    function checkQuantity($qty1, $qty2, $qty3) {
        if ($qty1 < 0 || $qty2 < 0 || $qty3 < 0) {
            $message = "Quantity cannot be less than 0";
            echo "<script>alert('$message');
            window.location.href='shop.php';</script>";
        } elseif ($qty1 > 5 || $qty2 > 5 || $qty3 > 5) {
            $message = "No more than 5 for each";
            echo "<script>alert('$message');
            window.location.href='shop.php';</script>";
        } elseif ($qty1 == 0 && $qty2 == 0 && $qty3 == 0) {
            if (count($_SESSION["cart"]) == 0 || count($_SESSION["cart"]) == 1) {
                $message = "Please select one product at least";
                echo "<script>alert('$message');
                window.location.href='shop.php';</script>";
                return false;
            }
        }
        return ture;
    }

    function setValue(&$var1,$var2) {
        $var1 = $var1 + $var2;
    }

    $quantity = [];
    foreach ($_POST['plm'] as $key => $value) {
        $quantity[] = $value;
    }
  //  checkQuantity($quantity[0], $quantity[1], $quantity[2]);

    $countnum = count($_SESSION["cart"]);

    if ($countnum == 0 && checkQuantity($quantity[0], $quantity[1], $quantity[2])) {
        $_SESSION["cart"][] = $_POST;
    } elseif ($countnum == 1) {
        if ($_SESSION["cart"][0]['Media'] == $_POST['Media']) {
            $valueArray = [];
            foreach ($_SESSION['cart'][0]['plm'] as $key => $value) {
                $value = $value + $_POST['plm'][$key];
                if ($value > 5) {
                    $message = "No more than 5 for each product";
                    echo "<script>alert('$message');
                    window.location.href='shop.php';</script>";
                } else {
                    $valueArray[$key] = $_POST['plm'][$key];
                }
            }
            foreach ($valueArray as $key => $value) {
                setValue($_SESSION['cart'][0]['plm'][$key], $value);
            }
         } elseif(checkQuantity($quantity[0], $quantity[1], $quantity[2])) {
            $_SESSION["cart"][] = $_POST;
        }
    } else {
        for ($i =0; $i <2; $i++) {
            if ($_SESSION["cart"][$i]['Media'] == $_POST['Media']) {
                $valueArray = [];
                foreach ($_SESSION['cart'][$i]['plm'] as $key => $value) {
                    $value = $value + $_POST['plm'][$key];
                    if ($value > 5) {
                        $message = "No more than 5 for each product";
                        echo "<script>alert('$message');
                        window.location.href='shop.php';</script>";
                    } else {
                        $valueArray[$key] = $_POST['plm'][$key];
                    }
                }
                foreach ($valueArray as $key => $value) {
                    setValue($_SESSION['cart'][$i]['plm'][$key], $value);
                }
            }
        }
    }
    echo "<script>window.location.href='cart.php';</script>";
 //   header("Location: cart.php");
    ?>
</head>

<body>

</body>
<?php include_once('/home/eh1/e54061/public_html/wp/debug.php'); ?>
</html>