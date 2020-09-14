<?php 

include '../include/header_admin.php';
$witer_name= @$_POST['writer_name'];
$titel = @$_POST['title'];
$post_img = @$_FILES['post_img']['name'];
$post_img_tmp = @$_FILES['post_img']['tmp_name'];
$post_date =@$_POST['post_date'];
$post_cat = @$_POST['post_cat'];
$post_content =@$_POST['post_content'];
move_uploaded_file($post_img_tmp,"images/$post_img");
if(isset($_POST['add_post'])){
  if(empty($witer_name) || empty($titel) || empty($post_img) || empty($post_date) || empty($post_cat) || empty($post_content)){
    echo '<div class="alert alert-danger" role="alert">';
    echo  ' من فضلك أدخل جميع البيانات ';
    echo   '</div>'; 
  }else{
    $post_insert = "INSERT INTO blog_post(writer_name,post_img,post_intro,blog_date,categorie,post)
     VALUES ('$witer_name','$post_img' , '$titel' ,'$post_date' ,'$post_cat','$post_content') ";
    $run_post = mysqli_query($connect,$post_insert);
    if(isset($run_post)){
      echo '<div class="alert alert-info" role="alert">';
      echo  'لقد تم أضافت البيانات بنجاح ';
      echo   '</div>';
    }
  }
}



?>

<style>
  body{
     background: #D0D3D4;
  }
.post_style{
    margin: 50px 270px 0px 0px;

}
.top_nav{
  background: url('images/back.png') no-repeat; 
        background-size: cover;
        height: 250px;
}
</style>


    <!-------- start add post  ------->
    <?php if ($_COOKIE['admin_login'] ==0){
header('location:login.php');
}

else{
    ?>
    <div  class="post_style">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                  <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="post.php" method="post">
                            <div class="form-group">
                              <label for="formGroupExampleInput">أسم الكاتب </label>
                              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="أسم الكاتب " name="writer_name">
                            </div>
                            <div class="form-group">
                              <label for="formGroupExampleInput2">عنوان المقالة </label>
                              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="عنوان المقالة " name="title">
                            </div>
                            <div class="form-group ">
                                <label for="formGroupExampleInput2">صورة المقالة </label>
                                <input type="file" class="form-control-file"  id="inputFile" name="post_img">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                  <label for="inputCity">تاريخ النشر </label>
                                  <input type="text" class="form-control" id="inputCity" name="post_date">
                                </div>
                                <div class="form-group col-md-5">
                                  <label for="inputState">القسم </label>
                                  <select id="inputState" class="form-control" name="post_cat">
                                   <?php
                                   $show_cat = "SELECT * FROM blog_cat";
    $run_show_cat = mysqli_query($connect, $show_cat);
    while ($row_show_cat = mysqli_fetch_array($run_show_cat)) {
        ?> 
                                     <option value="<?php echo $row_show_cat['cat_name'] ?>"><?php echo $row_show_cat['cat_name']?></option>
                                   <?php
    } ?>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">المقالة </label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="post_content"></textarea>
                              </div>
                              <input type="submit" class="btn btn-primary" value="أضافة مقالة" name="add_post">

                          </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>




    <!----Add jquery and bootstrap js  ---->
    <?php
}
    include '../include/footer_admin.php';?>
