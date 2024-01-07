<!DOCTYPE html>
<head>
  <title>ログイン</title>
</head>
<body>
  <h1>ログインフォーム</h1>
  <form method="post">
    <table>
      <tr>
        <td>
          <label for="username">ユーザー名:</label>
          <input type="text" id="username" name="username" required>
        </td>
      </tr>
      <tr>
        <td>
          <label for="password">パスワード:</label>
          <input type="password" id="password" name="password" required>
        </td>
      </tr>
    </table>
  <input type="submit" value="ログイン">
  </form>

</body>
</html>

<!-- ログイン処理 -->
<?php
require 'login.php';
?>
