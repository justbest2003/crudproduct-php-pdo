<?php 
$title="หน้าแรกของเว็บไซต์";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_admin.php";
$result=$controller->getProducts();
?>
<h1 class="text-center my-4"><?php echo "ข้อมูลสินค้า"; ?></h1>
<div class="container">
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">ชื่อสินค้า</th>
                <th scope="col">รายละเอียดสินค้า</th>
                <th scope="col">ราคาสินค้า</th>
                <th scope="col">หมวดหมู่สินค้า</th>
                <th scope="col" class="text-center">ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row["product_name"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td><?php echo number_format($row["price"], 2); ?></td>
                    <td><?php echo $row["category_name"]; ?></td>
                    <td class="text-center">
                        <a onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" 
                           href="delete.php?id=<?php echo $row["product_id"]; ?>" 
                           class="btn btn-danger btn-sm me-1">
                            ลบข้อมูล
                        </a>
                        <a href="editForm.php?id=<?php echo $row["product_id"]; ?>" 
                           class="btn btn-warning btn-sm">
                            แก้ไขข้อมูล
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
