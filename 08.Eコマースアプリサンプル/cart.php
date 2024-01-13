<?php
session_start();

// カートが空の場合は新しいカートを作成
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// 商品をカートに追加
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price'])) {
    $product = [
      'id' => $_POST['product_id'],
      'name' => $_POST['product_name'],
      'price' => $_POST['product_price']
    ];
    array_push($_SESSION['cart'], $product);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>カート</title>
</head>
<body>
  <h1>カート</h1>

  <?php require 'user_info.php'; ?>

  <ul>
    <?php foreach ($_SESSION['cart'] as $item) : ?>
      <li>
        <span>商品名: <?php echo $item['name']; ?></span>
        <span>価格: <?php echo $item['price']; ?></span>
      </li>
    <?php endforeach; ?>
  </ul>
  <a href="checkout.php">購入手続きへ進む</a>
</body>
</html>
