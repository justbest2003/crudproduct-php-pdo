<?php 
require_once "layout/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .nav-link {
            margin: 0 5px;
        }
        .nav-link:hover {
            color: #f8f9fa !important;
            text-shadow: 0px 0px 5px rgba(255, 255, 255, 0.7);
        }
        .nav-item.active .nav-link {
            color: #22bb33 !important;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <i class="fas fa-box"></i> CRUD_PRODUCTS
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
          <a class="nav-link" aria-current="page" href="index.php"><i class="fas fa-list"></i> ข้อมูลสินค้าทั้งหมด</a>
        </li>
        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'addForm.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="addForm.php"><i class="fas fa-plus"></i> เพิ่มสินค้า</a>
        </li>
        <?php if (!isset($_SESSION["userid"])) { ?>
          <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'loginForm.php' ? 'active' : ''; ?>">
            <a class="nav-link" href="loginForm.php"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</a>
          </li>
        <?php } else { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user"></i> สวัสดี, <?php echo $_SESSION["username"]; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a></li>
            </ul>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
<div class="container my-3">
