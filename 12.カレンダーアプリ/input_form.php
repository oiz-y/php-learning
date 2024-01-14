<!-- 初期化処理 -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['init'])) {
  header('Location: /');
  exit();
}
?>

<!-- 入力フォーム -->
<form method="GET">
  <table class="yearAndMonthPulldown">
    <tr>
      <td>年を入力してください：</td>
      <td>
        <input type="text" name="year" />
      </td>
    </tr>
    <tr>
      <td>月を入力してください：</td>
      <td>
        <input type="text" name="month" />
      </td>
    </tr>
  </table>
  <input type="submit" value="カレンダーを表示" class="generalButton" />
</form>

<!-- 初期化ボタン -->
<form method="POST" style="display: inline-block;">
  <input type="hidden" name="init" />
  <input type="submit" value="今月" class="generalButton" />
</form>

<!-- 前月ボタン -->
<form style="display: inline-block;">
  <input type="submit" value="前月" class="backButton generalButton" />
  <input type="hidden" name="direction" value="previous" />
  <input type="hidden" name="year" value="<?php echo isset($_SESSION['year']) ? $_SESSION['year'] : NULL ?>" />
  <input type="hidden" name="month" value="<?php echo isset($_SESSION['month']) ? $_SESSION['month'] : NULL ?>" />
</form>

<!-- 次月ボタン -->
<form style="display: inline-block;">
  <input type="submit" value="次月" class="backButton generalButton" />
  <input type="hidden" name="direction" value="next" />
  <input type="hidden" name="year" value="<?php echo isset($_SESSION['year']) ? $_SESSION['year'] : NULL ?>" />
  <input type="hidden" name="month" value="<?php echo isset($_SESSION['month']) ? $_SESSION['month'] : NULL ?>" />
</form>
