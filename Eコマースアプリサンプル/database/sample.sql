-- 商品テーブル作成
CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  price INT NOT NULL,
  description TEXT,
  image_url VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 商品テーブルに商品を追加
INSERT INTO products (product_name, price, description, image_url) VALUES ('iPhone', 9999, 'sample description', 'sample url');
INSERT INTO products (product_name, price, description, image_url) VALUES ('コーヒーマグカップ', 500, 'sample description', 'sample url');
