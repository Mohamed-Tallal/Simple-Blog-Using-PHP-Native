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

<div class="log_admin">
    <div class="container">
    <div class="card" style="width: 40rem; margin:50px 210px 0px 0px; font-size:20px; font-family:Arial;">
  <img src="images/google.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <?php 
    $email = @$_POST['email'];
    $pass = @$_POST['pass'];
    if(isset($_POST['login'])){
      if(empty($email) || empty($pass)){
        echo '<div class="alert alert-danger" role="alert">';
        echo  ' من فضلك أدخل جميع البيانات ';
        echo   '</div>';
      }else{
        $select_log = "SELECT * FROM admin WHERE blog_admin ='$email' AND blog_pass ='$pass'";
        $run_admin = mysqli_query($connect,$select_log);
        $row = mysqli_fetch_assoc($run_admin);
        if(@in_array($email,$row) && @in_array($pass,$row)){
          $_SESSION['id'] = $row['admin_id'];
          setcookie('admin_login' , 1 ,time()+60*60*24);
          header('location:show_post.php');
        }else{
          echo '<div class="alert alert-danger" role="alert">';
          echo  ' من فضلك أدخل البيانات بشكل صحيح ';
          echo   '</div>';
        }
      }
    }    
    
    
    ?>
  <form action="login.php" method="post">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">الايميل :</label>
    <div class="col-sm-10">
    <input type="email" class="form-control" id="formGroupExampleInput" placeholder="قم بأدخال الايميل الخاص بك" name="email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">كلمة السر :</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" placeholder="قم بأدخال كلمة السر الخاص بك" name="pass">
    </div>
  </div>
  <input type="submit" value="تسجيل الدخول " class="btn btn-primary" name="login">
</form>

  </div>
</div>
    </div>
</div>



              <!------end footer ---->
  <!----Add jquery and bootstrap js  ---->
  <script src="js/jquery-3.5.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  
  </body>
  </html>