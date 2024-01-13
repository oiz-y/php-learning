<!-- セッション変数設定 -->
<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  // 次月・前月要求ではなく、入力エリアも空白である場合
  if(count($_GET) != 0 && !isset($_GET['page']) && (!is_numeric($_GET['year']) || !is_numeric($_GET['month']))) {
    echo '年月を正しく入力してください';
    exit();
  }

  // セッションがない場合
  if (!isset($_SESSION['year'])){
    $_SESSION['year'] = date('Y');
    $_SESSION['month'] = date('m');
  }

  // GETパラメータがサーバ側で保存している値と異なる場合
  if (isset($_GET['year'])) {
    if (!isset($_GET['page']) && ($_SESSION['year'] != $_GET['year'] || $_SESSION['month'] != $_GET['month'])) {
      $_SESSION['year'] = (int)$_GET['year'];
      $_SESSION['month'] = (int)$_GET['month'];
    }
  }

  // 次月・前月要求の場合
  if (isset($_GET['page'])) {
    switch($_GET['page']) {
      case '次月':
        if ($_SESSION['month'] == 12) {
          $_SESSION['year'] = $_SESSION['year'] + 1;
          $_SESSION['month'] = 1;
        } else {
          $_SESSION['month'] = $_SESSION['month'] + 1;
        }
        break;
      case '前月':
        if ($_SESSION['month'] == 1) {
          $_SESSION['year'] = $_SESSION['year'] - 1;
          $_SESSION['month'] = 12;
        } else {
          $_SESSION['month'] = $_SESSION['month'] - 1;
        }
        break;
    }
  }
}
?>
