<!-- セッション変数設定 -->
<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // 年または月の入力エリアが空白でカレンダー表示ボタンを押下した場合
  if(
    isset($_GET['year']) &&
    (!is_numeric($_GET['year']) || !is_numeric($_GET['month']))
  ) {
    echo '年月を正しく入力してください<br>';
    echo '<a href="/">ホーム</a>';
    exit();
  }

  // 次月・前月要求の場合
  if (isset($_GET['direction'])) {
    switch($_GET['direction']) {
      case 'next':
        if ($_SESSION['month'] == 12) {
          $_SESSION['year'] = $_GET['year'] + 1;
          $_SESSION['month'] = 1;
        } else {
          $_SESSION['month'] = $_GET['month'] + 1;
        }
        break;
      case 'previous':
        if ($_SESSION['month'] == 1) {
          $_SESSION['year'] = $_GET['year'] - 1;
          $_SESSION['month'] = 12;
        } else {
          $_SESSION['month'] = $_GET['month'] - 1;
        }
        break;
    }
  } elseif (isset($_GET['year'])) {
    $_SESSION['year'] = $_GET['year'];
    $_SESSION['month'] = $_GET['month'];
  }
}
?>
