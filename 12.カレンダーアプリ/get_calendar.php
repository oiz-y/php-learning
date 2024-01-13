<!-- カレンダー取得処理 -->
<?php

function get_calendar($year, $month) {
  // 月の日数を取得
  $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

  // 月初めの曜日を取得
  $first_day_of_month = date("w", mktime(0, 0, 0, $month, 1, $year));

  echo '<tr class="calendarTableRow">';

  $day = 1;
  $day_count_per_week = 1;

  // 日付を出力
  while ($day <= $days_in_month) {
    // 新しい週が始まったら行を改行する
    if ($day_count_per_week > 7) {
      echo "</tr><tr>";
      $day_count_per_week = 1;
    }

    if ($first_day_of_month > 0) {
      // 初日まで空白セルで埋める
      echo '<td class="calendarTableColumn emptyCell"></td>';
      $first_day_of_month--;
    } else {
      echo '<td class="calendarTableColumn dayCell">' . $day . '</td>';
      $day++;
    }

    $day_count_per_week++;
  }

  // 月の最後の日の曜日を取得
  $last_day_of_month = date("w", mktime(0, 0, 0, $month, $days_in_month, $year));

  // 最後の週の空白を埋める
  while ($last_day_of_month < 6) {
    echo '<td class="calendarTableColumn emptyCell"></td>';
    $last_day_of_month++;
  }
}
?>
