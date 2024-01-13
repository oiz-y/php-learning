<?php
// データベース接続情報ファイル読み込み
include "../inc/dbinfo.inc";

// データベース接続
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// ログイン処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT id, username, password FROM users WHERE username = ?";
  // プリペアドステートメントを作成
  $stmt = $mysqli->prepare($sql);
  // 変数をバインド
  $stmt->bind_param("s", $username);
  // クエリ実行
  $stmt->execute();
  // クエリ実行結果オブジェクト取得
  $result = $stmt->get_result();
  // クエリ実行結果の最初の行を取得
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user['password'])) {
    echo 'ログイン成功';
  } else {
    echo 'ユーザー名またはパスワードが間違っています';
  }
}

// データベース接続切断
$mysqli->close();

?>
