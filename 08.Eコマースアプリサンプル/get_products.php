<!-- 商品リストを products テーブルから取得して表示 -->
<?php
include "../inc/dbinfo.inc";

$connection = mysqli_connect(
  DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT
);

$result = mysqli_query($connection, "SELECT * FROM products");

while($query_data = mysqli_fetch_row($result)) {
  $html = <<<END
    <tr>
        <td>{$query_data[1]}</td>
        <td>{$query_data[2]}</td>
        <td>
            <form method='post' action='cart.php'>
                <input type='hidden' name='product_id' value='{$query_data[0]}'>
                <input type='hidden' name='product_name' value='{$query_data[1]}'>
                <input type='hidden' name='product_price' value='{$query_data[2]}'>
                <input type='submit' value='カートに追加'>
            </form>
        </td>
    </tr>
    END;
  echo $html;
}

mysqli_free_result($result);
mysqli_close($connection);
?>
