<?php

include '../include/header_admin.php';
$admin_mail = @$_POST['admin_mail'];
$admin_pass = @$_POST['admin_pass'];

 if ($_COOKIE['admin_login'] !=1){
  header('location:login.php');
  }
  
  else{
      ?>
<div class="jumbotron top_nav" ></div>

<div class="admin">
<div class="container">

<div class="row">
  <div class="col-sm-6">
    <div class="card" style="width: 40rem; margin:0px 210px 30px 0px; font-size:20px; font-family:Arial;">
    <div class="card-body">
      <?php
  if (isset($_POST['add_admin'])) {
      if (empty($admin_mail) || empty($admin_pass)) {
          echo '<div class="alert alert-danger" role="alert">';
          echo 'من فضلك ادخل جميع البيانات ';
          echo '</div>';
      } else {
          $admin_insert = "INSERT INTO admin(blog_admin , blog_pass) VALUES ('$admin_mail','$admin_pass')";
          $run_admin = mysqli_query($connect, $admin_insert);
          if (isset($run_admin)) {
              echo '<div class="alert alert-info" role="alert">';
              echo  'لقد تمت الاضافة بنجاح';
              echo   '</div>';
          }
      }
  } ?>
      <form action="admin.php" method="POST">
      <div class="form-group">
            <label for="exampleInputPassword1">الايميل </label>
            <input type="email" class="form-control" id="exampleInputPassword1" name="admin_mail">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">كلمة السر</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="admin_pass">
        </div>
        <input type="submit" class="btn btn-primary" value="أضافة" name="add_admin">
     </form>

      </div>
    </div>
  </div>
</div>

</div>
</div>



<?php
  }
include '../include/footer_admin.php';?>
