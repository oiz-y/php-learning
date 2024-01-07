-- ユーザーテーブル作成
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ユーザーテーブルにユーザーを追加。
-- パスワードのハッシュ値は「test」をハッシュ化したもの。
-- ハッシュ化は $password = password_hash('test', PASSWORD_DEFAULT); で実施。
INSERT INTO users (username, password) VALUES ('Alice', '$2y$10$M3NzmG6EC3GKRBp0J5az..u17cAyucOW8gGMykRfYBzDPia1AeQc2');
