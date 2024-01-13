<!-- ログイン済みユーザーのリダイレクト -->
<?php
session_start();

if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
  // ログイン後のページにリダイレクト
  header('Location: products.php');
  exit;
}
?>

<!DOCTYPE html>
<html>
<body>
  <h1>ログインページ</h1>
  <form method="POST">
    <input type="text" name="username" />
    <input type="submit" value="ログイン" />
  </form>
</body>

<!-- ログイン処理 -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['username'] != '') {

    $_SESSION['username'] = $_POST['username'];

    header('Location: products.php');
    exit;

  } else {
    echo 'ユーザー名を入力してください';
  }
}
?>

</html>
