<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

</head>

<body>
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

  function localStorageManagement() {
      $firstNmae = $_SESSION["checkout"][0]['firstname'];
      $lastName = $_SESSION["checkout"][0]['lastname'];
      $email = $_SESSION["checkout"][0]['email'];
      $phone = $_SESSION["checkout"][0]['phone'];
      $Address = $_SESSION["checkout"][0]['address'];
      $localStorageFlag = $_SESSION["checkout"][0]['saveinfo'];
      $remember = 'remember';
      $forget = 'forget';

      echo "<script>
                if(typeof(Storage) !== \"undefined\") {
                    if (\"$localStorageFlag\" == \"$remember\") {
                        localStorage.firstname = \"$firstNmae\";
                        localStorage.lastname = \"$lastName\";
                        localStorage.email = \"$email\";
                        localStorage.phone = \"$phone\";
                        localStorage.address = \"$Address\";
                     } else if (\"$localStorageFlag\" == \"$forget\") {
                        localStorage.removeItem(\"firstname\");
                        localStorage.removeItem(\"lastname\");
                        localStorage.removeItem(\"email\");
                        localStorage.removeItem(\"phone\");
                        localStorage.removeItem(\"address\");
                     }
                } else {
                    alert('Sorry, your browser does not support web storage...');
                }
          </script>";
  }

  $_SESSION["checkout"][0] = $_POST;

  localStorageManagement();

  if (cardNumCheck() && expireCheck()) {
      //header("Location: confirmation.php");
      echo "<script>window.location.href='confirmation.php';</script>";
  } else {
      echo "<script>window.location.href='checkout.php';</script>";
  }

  ?>
</body>
<?php include_once('/home/eh1/e54061/public_html/wp/debug.php'); ?>
</html>