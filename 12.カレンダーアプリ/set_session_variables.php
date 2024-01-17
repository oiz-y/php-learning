<!-- セッション変数設定 -->
<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $year_options = array(
    'options' => array(
      'min_range'=> 1,
    )
  );
  $month_options = array(
    'options' => array(
      'min_range'=> 1,
      'max_range'=> 12,
    )
  );

  $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT, $year_options);
  $month = filter_input(INPUT_GET, 'month', FILTER_VALIDATE_INT, $month_options);

  if (isset($_GET['direction'])) {
    // 次月・前月要求の場合

    // エラーメッセージをクリア
    $_SESSION['inputValidation'] = '';

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
  } elseif (isset($_GET['year'], $_GET['month'])) {
    if ($year && $month) {
      // 有効な年月が入力された場合
      $_SESSION['year'] = $_GET['year'];
      $_SESSION['month'] = $_GET['month'];
      // エラーメッセージをクリア
      $_SESSION['inputValidation'] = '';
    } elseif (!(is_numeric($_GET['year']) && is_numeric($_GET['month']))) {
      $_SESSION['inputValidation'] = '入力された文字列に数字以外の文字が含まれています';
    } elseif ((int)$_GET['year'] <= 0) {
      $_SESSION['inputValidation'] = '年は 0 より大きい値でなければなりません';
    } elseif (!((int)$_GET['month'] >= 1 && (int)$_GET['month'] <= 12)) {
      $_SESSION['inputValidation'] = '月は 1 から 12 の値でなければなりません';
    }
  }
}
?>
