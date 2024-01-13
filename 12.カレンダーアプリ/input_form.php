<!-- 初期化ボタン -->
<form method="POST">
  <input type="hidden" name="init" />
  <input type="submit" value="初期化" class="generalButton" />
</form>

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
  <input type="submit" name="page" value="前月" class="backButton generalButton" />
  <input type="submit" name="page" value="次月" class="nextButton generalButton" />
</form>
