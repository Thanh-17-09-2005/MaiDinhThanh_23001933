<?php

require_once "common/auth.php";

require_once __DIR__ . "/model/product.php";

$products = getAllProducts();

require_once __DIR__ . "/view/header.php";

?>

<h2 style="text-align: center">Danh sách sản phẩm</h2>

<div class="table-container">
    <table>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Chức năng</th>
        </tr>

        <?php if (empty($products)): ?>
            <tr>
                <td colspan="5">
                    Không có sản phẩm nào.
                </td>
            </tr>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td style="text-align: center"><?php echo $product['id']; ?></td>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td style="text-align: right;"><?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ</td>
                    <td style="text-align: center;"><?php echo $product['quantity']; ?></td>
                    <td style="text-align:center">
                        <a href="product_edit.php?id=<?php echo $product['id']; ?>"
                        >
                            Sửa
                        </a>

                        |

                        <a
                            href="product_delete.php?id=<?php echo $product['id']; ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');"
                        >
                            Xóa
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php endif; ?>

    </table>

    <div class="button-container">
        <button><a href="product_add.php"><u>+ Thêm sản phẩm</u></a></button>
    </div>

</div>

<br><br>

<?php

require_once "view/footer.php";

?>