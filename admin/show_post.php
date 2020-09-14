<?php 
include '../include/header_admin.php';
?>
<style>
.search_style{
    margin: 50px 0px 20px 0px;

}

    </style>
<!---- style="background: #616A6B" --->


<div class="jumbotron top_nav" ></div>
<?php if ($_COOKIE['admin_login'] ==0){
header('location:login.php');
}

else{
    ?>
<div class="search_style">
    <div class="container">
    <nav class="navbar navbar-light">
            <a class="navbar-brand" href="show_post.php">المنشورات</a>
        <form class="form-inline" method="post" action="show_post.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_input">
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="أبحث" name="search">
        </form>
    </nav>
    </div>
</div>



    <div class="container">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">أسم الكاتب </th>
      <th scope="col">عنوان المقالة</th>
      <th scope="col">صورة </th>
      <th scope="col">قسم </th>
      <th scope="col">تاريخ </th>
      <th scope="col">حذف </th>
    </tr>
  </thead>
  <tbody>
   <?php
     $search = @$_POST['search_input'];
    if (isset($_POST['search'])) {
        $search = "SELECT * FROM blog_post WHERE writer_name ='$search' || post_intro ='$search' || blog_date	='$search' || categorie='$search' || post='$search'  ";
        $run_search = mysqli_query($connect, $search);
        while ($row = mysqli_fetch_array($run_search)) {
            ?>
           <tr>
      <th style="padding-top:5px "><?php echo $row['writer_name'] ; ?></th>
      <td><?php echo $row['post_intro'] ; ?></td>
      <td><img src ="images/<?php echo $row['post_img'] ; ?>" height="60px"></td>
      <td><?php echo $row['categorie'] ; ?></td>
      <td><?php echo $row['blog_date']?></td>
      <td><a href="show_post.php?delete_post=<?php echo $row['blog_id']?>" >  حذف</a></td>
    </tr>
           
           <?php
        }
    } elseif (isset($_GET['delete_post'])) {
        $delete = (int)@$_GET['delete_post'];
        $qu_delete = " DELETE FROM blog_post where blog_id='$delete'";
        $run_delete = mysqli_query($connect, $qu_delete);
        if (isset($run_delete)) {
            header("Location:show_post.php");
        }
    } else {
        $show_post = "SELECT * FROM blog_post";
        $run_show = mysqli_query($connect, $show_post);
        while ($row = mysqli_fetch_array($run_show)) {
            ?>
    <tr>
      <th style="padding-top:25px "><?php echo $row['writer_name'] ; ?></th>
      <td style="padding-top:25px "><?php echo $row['post_intro'] ; ?></td>
      <td><img src ="images/<?php echo $row['post_img'] ; ?>" height="60px"></td>
      <td style="padding-top:25px "><?php echo $row['categorie'] ; ?></td>
      <td style="padding-top:25px "><?php echo $row['blog_date']?></td>
      <td style="padding-top:25px "><a href="show_post.php?delete_post=<?php echo $row['blog_id']?>" >  حذف</a></td>
    </tr>
   <?php
        }
    } ?>
  </tbody>
</table>

    </div>
</div>






<?php
}
 include '../include/footer_admin.php';?>
