<?php 
$title="แบบฟอร์มแก้ไขข้อมูลพนักงาน";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_admin.php";
if(!isset($_GET["id"])){
    header("Location:index.php");
}else{
    $id=$_GET["id"];
    $pd=$controller->getProductDetail($id);
}
$result=$controller->getCategories();
?>
    <h1 class="text-center"><?php echo "แบบฟอร์มแก้ไขข้อมูล";?></h1>
    <form method="POST" action="updateEmployee.php">
        <input type="hidden" name="product_id" value="<?php echo $pd["product_id"]?>"/>
        <div class="form-group">
            <label for="product_name">ชื่อสินค้า</label>
            <input type="text" name="product_name" class="form-control" value="<?php echo $pd["product_name"]?>">
        </div>
        <div class="form-group">
            <label for="description">รายละเอียดสินค้า</label>
            <input type="text" name="description" class="form-control" value="<?php echo $pd["description"]?>">
        </div>
        <div class="form-group">
            <label for="price">ราคาสินค้า</label>
            <input type="text" name="price" class="form-control" value="<?php echo $pd["price"]?>">
        </div>
        <div class="form-group">
            <label for="category_name">หมวดหมู่สินค้า</label>
            <select name="category_id" class="form-control">
                <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
                    <option 
                    <?php if($row["category_id"] == $pd["category_id"]) echo "selected"?>
                    value="<?php echo $row["category_id"];?>"><?php echo $row["category_name"];?></option>
                <?php } ?>
            </select>
        </div>
        <input type="submit" name="submit" value="อัพเดต" class="btn btn-primary my-3">
    </form>
</div>
</body>
</html>