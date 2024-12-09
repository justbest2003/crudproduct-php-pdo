<?php 
require_once "db/connect.php";
if(isset($_POST["submit"])){
    $product_id = $_POST["product_id"];
    $product_name=$_POST["product_name"];
    $description=$_POST["description"];
    $price=$_POST["price"];
    $category_id=$_POST["category_id"];

    $result = $controller->update($product_name,$description,$price,$category_id,$product_id);
    if($result){
        header("Location:index.php");
    }
}

?>