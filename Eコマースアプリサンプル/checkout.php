<!DOCTYPE html>
<html>
<head>
  <title>購入手続き</title>
</head>
<body>
  <h1>購入手続き</h1>
  <?php require 'user_info.php'; ?>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
  echo '購入しました';
} else {
  echo 'カートに商品がありません';
}
?>
