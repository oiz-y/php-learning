<?php
session_start();

// ログインしていない場合、ログインページへリダイレクト
if (!isset($_SESSION['username'])) {
  header('Location: index.php');
  exit;
}

// ログアウト処理
if(isset($_POST['logout'])) {
  // セッション変数をクリア
  $_SESSION = array();

  // セッションを破棄
  session_destroy();

  // ログインページにリダイレクト
  header("Location: index.php");
  exit;
}
?>

<!-- ユーザー名表示 -->
<table cellpadding="10">
  <tr>
    <!-- セッション変数からユーザー名を取得 -->
    <td>ユーザー：<?php echo $_SESSION['username']; ?></td>
    <td>
      <form method="post">
        <input type="submit" name="logout" value="ログアウト">
      </form>
    </td>
  </tr>
</table>
