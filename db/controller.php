<?php 
class Controller{
    private $db;

    function __construct($con){
        $this->db=$con;
    }

    function getCategories(){
        try{
            $sql = "SELECT * FROM categories";
            $result=$this->db->query($sql);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getProducts(){
        try{
            $sql = "SELECT * FROM products a INNER JOIN categories b ON a.category_id = b.category_id ORDER BY a.product_id";
            $result=$this->db->query($sql);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function insert($product_name,$description,$price,$category_id){
        try{
            $sql="INSERT INTO 
            products(product_name,description,price,category_id)
            VALUES (:product_name,:description,:price,:category_id)
            ";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":product_name",$product_name);
            $stmt->bindParam(":description",$description);
            $stmt->bindParam(":price",$price);
            $stmt->bindParam(":category_id",$category_id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    function delete($id){
        try{
            $sql="DELETE FROM products WHERE product_id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getProductDetail($id){
        try{
            $sql="SELECT * FROM products a 
            INNER JOIN categories b
            ON a.category_id = b.category_id
            WHERE product_id = :id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function update($product_name,$description,$price,$category_id,$product_id){
        try{
            $sql="UPDATE products 
            SET product_name=:product_name,description=:description,
            price=:price,category_id = :category_id 
            WHERE product_id = :product_id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":product_name",$product_name);
            $stmt->bindParam(":description",$description);
            $stmt->bindParam(":price",$price);
            $stmt->bindParam(":category_id",$category_id);
            $stmt->bindParam(":product_id",$product_id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}


?>