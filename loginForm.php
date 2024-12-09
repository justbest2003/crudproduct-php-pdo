<?php
    $title="แบบฟอร์มลงชื่อเข้าใช้";
    require_once "layout/header.php";
    require_once "db/connect.php";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $new_password=md5($password.$username);
        $result=$user->getUser($username,$new_password);

        if(!$result){
            echo '<div class="alert alert-danger">ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</div>';
        }else{
            $_SESSION["username"]=$username;
            $_SESSION["userid"]=$result["id"];
            header("Location:index.php");
        }
        
    }
?>
    <h1 class="text-center my-4"><?php echo "แบบฟอร์มลงชื่อเข้าใช้"; ?></h1>
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-4">เข้าสู่ระบบ</h3>
        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
            <div class="form-group mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" 
                       name="username" 
                       value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo htmlspecialchars($_POST["username"]); ?>" 
                       class="form-control" 
                       placeholder="กรอกชื่อผู้ใช้" 
                       required>
            </div>
            <div class="form-group mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" 
                       name="password" 
                       class="form-control" 
                       placeholder="กรอกรหัสผ่าน" 
                       required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">เข้าสู่ระบบ</button>
        </form>
        <div class="mt-3 text-center">
            <a href="register.php" class="text-decoration-none">Register Coming Soon!</a>
        </div>
    </div>
</div>
</body>
</html>
