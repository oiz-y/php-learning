<!DOCTYPE html>
<html>
  <title>date 関数の検証</title>
  <head>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
  </head>
<body>

<?php
// タイムゾーンを指定
date_default_timezone_set('Asia/Tokyo');

$date = new DateTimeImmutable();
echo '現在の東京の日時（参考）：' . $date->format('r');
?>

<table border="1" cellpadding="10">
  <?php
    date_default_timezone_set('Asia/Tokyo');
    $format_1 = [
      'Y', 'y', 'M', 'm', 'D', 'd', 'j', 'F', 'l', 'T', 'e'
    ];
    $format_2 = [
      'G:i:s', 'g:i:s', 'H:i:s', 'h:i:s', 'A', 'a', 'w', 't', 'c', 'r',
      'l j \of F Y h:i:s A'
    ];
    foreach (array_map(null, $format_1, $format_2) as $array) {
      $a = date($array[0]);
      $b = date($array[1]);
      echo <<<END
        <tr>
          <td class="dateFormatKey">date('$array[0]')</td>
          <td class="dateFormatValue">$a</td>
          <td class="dateFormatKey">date('$array[1]')</td>
          <td class="dateFormatValue">$b</td>
        </tr>
        END;
    }
  ?>
</table>

</body>
</html>
