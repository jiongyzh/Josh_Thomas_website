<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'topper.php';?>
    <title>Checkout</title>
    <?php
    function cardNumCheck() {
        $NumArr = str_split($_SESSION["checkout"][0]['card']);
        $cardType = $_SESSION["checkout"][0]['cardtype'];
        if ($cardType == "master") {
            if ((count($NumArr) == 16) && ($NumArr[0] == 5) && ($NumArr[1] > 0) && ($NumArr[1] < 6)) {
                return true;
            } else {
                return false;
            }
        } else if ($cardType == "visa") {
            if ((count($NumArr) == 13 || count($NumArr) == 16) && ($NumArr[0] == 4)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function expireCheck() {
        $mmyy = explode('/', $_SESSION["checkout"][0]['expiredate']);
        $month = $mmyy[0];
        $year =  $mmyy[1];
        $today = date("d.m.y");
        $currddmmyy = explode('.', $today);
        if ($year < $currddmmyy[2]) {
            return false;
        } else if ($year == $currddmmyy[2]) {
            if ($month > $currddmmyy[1]) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    function setTotalPrice() {
        $totalPrice = 0.00;
        for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
            foreach ($_SESSION["cart"][$i]['plm'] as $key => $value) {
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
                    $totalPrice = $totalPrice + $unitprice * $value;
                    $totalPrice = number_format($totalPrice,2);
                  }
            }
        }
        echo "<script>document.getElementById('checkouttotal').innerHTML = $totalPrice.toFixed(2);</script>";
    }

    function localStorageManagement() {
        echo "<script>
                if(typeof(Storage) !== \"undefined\") {
                    if (localStorage.getItem(\"firstname\") !== null) {
                        document.getElementById('cfirstName').value = localStorage.getItem(\"firstname\");
                    }
                    if (localStorage.getItem(\"lastname\") !== null) {
                        document.getElementById('clastName').value = localStorage.getItem(\"lastname\");
                    }
                    if (localStorage.getItem(\"email\") !== null) {
                        document.getElementById('cemailAddress').value = localStorage.getItem(\"email\");
                    }
                    if (localStorage.getItem(\"phone\") !== null) {
                        document.getElementById('cphoneNumber').value = localStorage.getItem(\"phone\");
                    }
                    if (localStorage.getItem(\"address\") !== null) {
                        document.getElementById('caddress').innerHTML = localStorage.getItem(\"address\");
                    }
                } else {
                    alert('Sorry, your browser does not support web storage...');
                }
          </script>";
    }
    ?>
</head>
    <script>
        function cardNumCheck(){
            var cardType;
            var carRadio = document.getElementsByName('cardtype');
            for ( var i = 0; i < carRadio.length; i++) {
                if (carRadio[i].checked) {
                    cardType = carRadio[i].value;
                    break;
                }
            }
            var cardNum = document.getElementById('ccard').value;
            var numberArr = cardNum.split("");
            var errorMessage = "Card number is not correct";
            if (cardType == "master") {
                if ((numberArr.length == 16) && (numberArr[0] == 5) && (numberArr[1] > 0) && (numberArr[1] < 6)) {
                    document.getElementById('cardNumError').innerHTML = "";
                } else {
                    document.getElementById('cardNumError').innerHTML = errorMessage;
                }
            } else if (cardType == "visa") {
                if ((numberArr.length == 13 || numberArr.length == 16) && (numberArr[0] == 4)) {
                    document.getElementById('cardNumError').innerHTML = "";
                } else {
                    document.getElementById('cardNumError').innerHTML = errorMessage;
                }
            } else {
                document.getElementById('cardNumError').innerHTML = errorMessage;
            }
        }

        function expireCheck() {
            var value = document.getElementById('cexpiredate').value;
            var mmyy = value.split("/");
            var month = mmyy[0];
            var year =  "20" + mmyy[1];
            var errorMessage = "Your card is expired";
            today = new Date();
            if (year < today.getFullYear()) {
                document.getElementById('expireError').innerHTML = errorMessage;
            } else if (year == today.getFullYear()) {
                if (!((month -1) > today.getMonth())) {
                    document.getElementById('expireError').innerHTML = errorMessage;
                } else {
                    document.getElementById('expireError').innerHTML = "";
                }
            } else {
                document.getElementById('expireError').innerHTML = "";
            }

        }

        function updateTotal(value){
           var totalprice = <?php
            $totalPrice = 0.00;
            for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
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
                        $totalPrice = $totalPrice + $unitprice * $value;
                    }
                }
            }
            echo $totalPrice;
            ?>;
            totalprice = totalprice + value;
            document.getElementById('checkouttotal').innerHTML=totalprice.toFixed(2);
        }

    </script>
<body>
<?php include 'header.php';?>
        <main id="smain">
            <div id="title"> </div>
            <form id="cform" action="process.php" method="post"">
                <div id="checkoutlist">
                    <div class="checkoutbox" id="checkout1">
                        <br>
                        <h3>Contact details</h3>
                        <div class="checkinputformat">
                          <!--  <label for="cfirstName">First Name*</label> -->
                            <input class="cinput" type="text" id="cfirstName" name="firstname" placeholder="Josh" maxlength="128"
                                   pattern="[A-Z][a-z' ]{2,62}[a-z]" required> </div>
                        </br>
                        <div class="checkinputformat">
                            <input class="cinput" type="text" id="clastName" name="lastname" placeholder="Thomas"  maxlength="128"
                                   pattern="[A-Za-z- ']{2,62}[a-z.]" required> </div>
                        </br>
                        <div class="checkinputformat">
                            <input class="cinput" type="email" id="cemailAddress" name="email" placeholder="abc1@gmail.com"  maxlength="128" required> </div>
                        </br>
                        <div class="checkinputformat">
                            <input class="cinput" type="tel" id="cphoneNumber" name="phone" placeholder="+61 12345678"
                                   pattern="[\+]?[0-9][0-9-]{0,4}[- ]?(\(\d{3,4}\)|\d{3,4})[- ]?\d{3,4}[- ]?\d{0,4}" required> </div>

                        </br>
                        <div class="checkinputformat">
                            <textarea class="cinput" id="caddress" name="address" placeholder="1/1 Fake St North Melbourne Melbourne VIC Australia 3051"
                                      pattern="[0-9a-zA-Z ,.-]" cols="25" rows="3" required></textarea>
                        </div>
                        </br>
                        <div class="checkinputformat">
                            <input type="radio" name="saveinfo" value="remember" checked> Remember me<br>
                            <input type="radio" name="saveinfo" value="forget"> Forget me</div>
                        </br>
                        <h3>Delivery methods</h3>
                        <div class="checkinputformat">
                            <input type="radio" name="delivery" value="regular" checked onclick="updateTotal(0.00)"> Regular delivery price: free<br>
                            <input type="radio" name="delivery" value="courier" onclick="updateTotal(7.00)"> Regular Courier price: $7.00<br>
                            <input type="radio" name="delivery" value="express" onclick="updateTotal(10.50)"> Express Courier price: $10.50
                        </div>
                    </div>

                    <div class="checkoutbox" id="checkout2">
                        <br>
                        <h3>Payment by Credit card</h3>
                        <div class="checkinputformat">
                            <input type="radio" id="master" name="cardtype" value="master" checked> Master<br>
                            <input type="radio" id="visa" name="cardtype" value="visa"> Visa</div>
                        <br>
                        <div class="checkinputformat">
                            <label for="ccard">Card Number</label>
                            <input class="cinput" type="text" id="ccard" name="card" placeholder="5534123412341234" onfocusout="cardNumCheck()" required> <br>
                            <span id=cardNumError style="color:red"></span>
                        </div>
                        <div class="checkinputformat">
                            <p>
                            <label for="cexpiredate">Expire Date</label>
                            <input class="cinput" type="text" id="cexpiredate" name="expiredate" placeholder="MM/YY" onfocusout="expireCheck()"
                                       pattern="(0[123456789]|1[012]{1})\/(1[6789]{1}|[23]{1}[0-9]{1})" required> <br>
                            <span id=expireError style="color:red"></span>
                        </div>
                  <!--          <select class="c-expire" id="cmonth" name="month" required>
                                <?php
                                for ($i=1; $i<=12; $i++)
                                {
                                    ?>
                                    <option value="<?php echo $i;?>"><?php
                                        if ($i < 10) {
                                        echo 0, "$i";
                                        } else {
                                            echo "$i";
                                        }?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <select class="c-expire" id="cyear" name="year">
                                <?php
                                for ($i=16; $i<=35; $i++)
                                {
                                    ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php
                                }
                                ?>
                            </select> -->
                        </div>
                    </div>

                    <div class="checkoutbox" id="checkout3">
                        <br>
                        <h3>Total Price: </h3>
                        <p id="checkouttotal"></p>
                        <?php setTotalPrice(); ?>
                        <br>
                        <button id="pay">Pay</button>
                    </div>
                </div>
            <?php

            if(isset($_SESSION['checkout']) && !empty($_SESSION['checkout'])) {
                localStorageManagement();
                if (!cardNumCheck()) {
                    $cardNumb = $_SESSION["checkout"][0]['card'];
                    echo "<script>document.getElementById('ccard').value = '$cardNumb';</script>";
                    echo "<script>document.getElementById('cardNumError').innerHTML = 'Card number is not correct';</script>";
                }
                if (!expireCheck()) {
                    $cexpiredate = $_SESSION["checkout"][0]['expiredate'];
                  echo "<script>document.getElementById('cexpiredate').value = '$cexpiredate';</script>";
                    echo "<script>document.getElementById('expireError').innerHTML = 'Your card is expired';</script>";
                }
            }
            ?>
            </form>
        </main>
    </div>
    <?php include 'footer.php';?>
    </body>

    </html>