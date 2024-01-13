<!DOCTYPE html>
<html>
<head>
  <title>商品リスト</title>
</head>
<body>
<h1>商品リスト</h1>

<!-- ユーザー情報 -->
<?php require 'user_info.php'; ?>

<table border="1" cellpadding="10" cellspacing="1">
  <tr>
    <td>商品名</td>
    <td>価格</td>
    <td>カートに追加</td>
  </tr>

  <!-- テーブル表示 -->
  <?php require 'get_products.php'; ?>
</table>

</body>
</html>
