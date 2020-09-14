<?php
include '../connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <!----Add css file and bootstrap file  ---->
 <link rel="shortcut icon" href="../images/icon.png" />
 <link rel="stylesheet" href="../css/bootstrap.min.css">
 <link rel="stylesheet" href="../css/bootstrap-rtl.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">    <link rel="stylesheet" href="css/style.css">


 <title>فلاشة</title>
</head>
<body>
<style>
  .nav-style{
    background-color: #eeeeee !important;
    border: 1px solid #99A3A4 ;
}


.a_style ul li a{
    color: #717D7E !important;
}
.a_style ul li a:hover{
    color: #17202A !important;
}

  </style>
<!------Strat navbar -------->
    <nav class="navbar navbar-expand-lg navbar-light bg-light nav-style">
        <div class="container">

          <!------ LOG OF BLOG -------->

    <a class="navbar-brand" href="../index.php">فلاشة <i class="fas fa-spinner" style="margin-right: 3px;"></i></a>

           <!------TOGGLER ICON  -------->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
       
             <!------Start unorder list  -------->

    <div class="collapse navbar-collapse a_style" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="post.php">أضافة المنشورات  </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="show_post.php">عرض المنشورات </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cat.php" >أضافة قسم </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php" >أضافة ادمن </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="logout.php" >تسجيل خروج </a>
      </li>
      </ul>
      </div>
    </div>
  </nav> 
            <!------End navbar -------->