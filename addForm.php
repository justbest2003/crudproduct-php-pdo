<?php
    $title="แบบฟอร์มบันทึกข้อมูลสินค้า";
    require_once "layout/header.php";
    require_once "db/connect.php";
    require_once "layout/check_admin.php";
    $result=$controller->getCategories();

    if(isset($_POST["submit"])){
        $product_name=$_POST["product_name"];
        $description=$_POST["description"];
        $price=$_POST["price"];
        $category_id=$_POST["category_id"];
        $status=$controller->insert($product_name,$description,$price,$category_id);
        if($status){
            $message="บันทึกข้อมูลเรียบร้อยแล้ว";
            require_once "layout/success_message.php";
        }else{
            require_once "layout/error_message.php";
        }
    }
?>
    <h1 class="text-center my-4"><?php echo "แบบฟอร์มบันทึกข้อมูลสินค้า"; ?></h1>
<div class="container">
    <form method="POST" action="addForm.php" class="shadow p-4 rounded bg-light">
        <div class="form-group mb-3">
            <label for="product_name" class="form-label">ชื่อสินค้า</label>
            <input type="text" id="product_name" name="product_name" class="form-control" placeholder="กรอกชื่อสินค้า" required>
        </div>
        <div class="form-group mb-3">
            <label for="description" class="form-label">รายละเอียดสินค้า</label>
            <textarea id="description" name="description" class="form-control" placeholder="กรอกรายละเอียดสินค้า" rows="3" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="price" class="form-label">ราคาสินค้า</label>
            <input type="number" id="price" name="price" class="form-control" placeholder="กรอกราคา (บาท)" min="0" required>
        </div>
        <div class="form-group mb-3">
            <label for="category" class="form-label">หมวดหมู่สินค้า</label>
            <select id="category" name="category_id" class="form-select" required>
                <option value="" disabled selected>เลือกหมวดหมู่สินค้า</option>
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $row["category_id"]; ?>"><?php echo $row["category_name"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="text-center">
            <input type="submit" name="submit" value="บันทึก" class="btn btn-primary px-4 py-2">
        </div>
    </form>
</div>
</body>
</html>
