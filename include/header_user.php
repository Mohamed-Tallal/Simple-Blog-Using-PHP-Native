<?php include 'connect.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!----Add css file and bootstrap file  ---->
    <link rel="shortcut icon" href="images/icon.png" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">    <link rel="stylesheet" href="css/style.css">

    <title>فلاشة</title>
</head>
<body> 
  <!--a----Strat navbar -------->
  <nav class="navbar navbar-light bg-light nav-style">
    <div class="container">
  <a class="navbar-brand" href="index.php">فلاشة <i class="fas fa-spinner" style="margin-right: 3px;"></i></a>
   <?php  if (isset($_POST['search'])) {
     $search_cat =@$_POST['search_cat'];
         $search = "SELECT * FROM blog_post WHERE writer_name ='$search_cat'  || categorie='$search_cat' ";
         $run_search = mysqli_query($connect, $search);
          if(isset($run_search)){
header("location:index.php?index=$search_cat");
          }
        }
           ?>
  <form class="form-inline" action="index.php" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="أبحث" aria-label="Search" name="search_cat">
      <input class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit" value="أبحث">
    </form>
</div>
</nav>
            <!------End navbar -------->
            


          <!------ LOG OF BLOG -------->

