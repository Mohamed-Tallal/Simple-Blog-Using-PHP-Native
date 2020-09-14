<?php
include '../include/header_admin.php';
include '../connect.php';
$add_cat =@$_POST['add_categorie'];
$remove_cat = @$_POST['remove_categorie'];


?>
<div class="jumbotron top_nav" ></div>

<div class="cat">
<div class="container">
  <?php if(isset($_POST['add_cat'])){
  if(empty($add_cat)){
    echo '<div class="alert alert-danger" role="alert">';
    echo 'أدخل اسم القسم الذي تريد اضافة';
    echo '</div>';
  }
  else{
      $cat_insert = "INSERT INTO blog_cat (cat_name) VALUES ('$add_cat')";
      $run_add = mysqli_query($connect,$cat_insert);
      if(isset($run_add)){
        echo '<div class="alert alert-info" role="alert">';
        echo  'لقد تم أضافت قسم بنجاح ';
        echo   '</div>';
            }
  }
}
elseif(isset($_POST['remove_cat'])){
  if(empty($remove_cat)){
    echo '<div class="alert alert-danger" role="alert">';
    echo 'أدخل اسم القسم الذي تريد حذفه';
    echo '</div>';
  }
  else{
    $cat_insert = "DELETE FROM blog_cat where cat_name = '$remove_cat'";
    $run_add = mysqli_query($connect,$cat_insert);
    if(isset($run_add)){
      echo '<div class="alert alert-info" role="alert">';
      echo  'لقد تم حذف قسم بنجاح ';
      echo   '</div>';
          }
}
}

if ($_COOKIE['admin_login'] ==0){
header('location:login.php');
}

else{
    ?>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">

      <form action="cat.php" method="post">
  
        <div class="form-group">
            <label for="exampleInputPassword1">أضافة قسم</label>
            <input type="TEXT" class="form-control" id="exampleInputPassword1" name="add_categorie">
        </div>
        <input type="submit" class="btn btn-primary" value="أضافة" name="add_cat">
     </form>

      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">

        <form action="cat.php" method="post">
            <div class="form-group">
                <label for="exampleInputPassword1">حذف قسم</label>
                <input type="TEXT" class="form-control" id="exampleInputPassword1" name="remove_categorie">
            </div>
                <input type="submit" class="btn btn-primary" value="حذف" name="remove_cat">
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
