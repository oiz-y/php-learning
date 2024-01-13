<!DOCTYPE html>
<html>
<head>
  <title>カレンダーアプリ</title>
  <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<h1>カレンダーアプリ</h1>

<?php

session_start();

// Web ページのルートにアクセスした場合に年月と次月・前月遷移情報を初期化する
if ($_SERVER['REQUEST_URI'] == '/' && count($_GET) == 0) {
  // セッション変数をクリア
  unset($_SESSION['year']);
  unset($_SESSION['month']);
  unset($_SESSION['page']);
}

// タイムゾーンを指定
date_default_timezone_set('Asia/Tokyo');

?>

<!-- 入力フォーム -->
<?php include 'input_form.php'; ?>

<!-- セッション変数設定 -->
<?php include 'set_variables.php'; ?>

<!-- 閲覧中のカレンダーの年月 -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo '<h2>' . $_SESSION['year'] . '年' . $_SESSION['month'] . '月</h2>';
}
?>

<!-- カレンダー -->
<table class="calendarTable">
  <tr class="calendarTableRow">
    <th class="calendarTableHeader">日</th>
    <th class="calendarTableHeader">月</th>
    <th class="calendarTableHeader">火</th>
    <th class="calendarTableHeader">水</th>
    <th class="calendarTableHeader">木</th>
    <th class="calendarTableHeader">金</th>
    <th class="calendarTableHeader">土</th>
  </tr>

  <!-- カレンダー取得処理 -->
  <?php
    include 'get_calendar.php';
    get_calendar($_SESSION['year'], $_SESSION['month']);
  ?>
</table>

</body>
</html>
