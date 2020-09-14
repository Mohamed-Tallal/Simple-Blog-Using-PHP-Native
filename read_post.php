
<?php include 'include/header_user.php'?>
<style>
                  #p_style a:hover{
                    text-decoration: none;
                  }
 </style>
            <!------Start show posts  -------->
  <div class="contant">
    <div class="container">
      <div class="row">

        <!------ Start show main post -------->
        
        <div class="col-md-8 ">
<?php 
$id =$_GET['show'];
$show_post = "SELECT * FROM blog_post where blog_id='$id'";
$run_show = mysqli_query($connect,$show_post);
$row = mysqli_fetch_array($run_show) ?>
          <div class="card card-style">
            <img src="admin/images/<?php echo $row['post_img']?>" class="card-img-top" alt="first post ">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['post_intro']?></h5>
              <span class="edit-font"><i class="fas fa-user-tag"></i><?php echo $row['writer_name']?> </span>
              <span class="edit-font"><i class="far fa-calendar-alt"></i> <?php echo $row['blog_date']?></span>
              <span class="edit-font"><i class="far fa-clipboard"></i><?php echo $row['categorie']?></span>
              <p class="card-text" >      
              <?php
                  echo $row['post'];
              ?>
              </p>

            </div>
          </div>

        </div>

        <!------End show main posts  -------->

        <!------ start show first post  -------->

        <div class="col-md-4">
          <div class="card" >
            <div class="card-header" style="text-align: center;">
              المنشورات الحديثة 
            </div>
            <ul class="list-group list-group-flush ">
            <?php
                            
                            $show_post = "SELECT * FROM blog_post ORDER BY blog_id DESC LIMIT 3";
                            $run_show = mysqli_query($connect,$show_post);
                            while ($row = mysqli_fetch_array($run_show)) {
                                ?>  
                        <li class="list-group-item">
                        <a href="read_post.php?show=<?php echo $row['blog_id']?>" >
                            <img src="admin/images/<?php echo $row['post_img']?>" class="card-img-top" alt="first img post">
                            </a>
                            
                            <div class="card-body" id="p_style">
                            <a href="read_post.php?show=<?php echo $row['blog_id']?>" >
                              <p class="card-text post" style="color:black">
                                <?php echo $row['post_intro']?>
                               </p></a>
                            </div>              
                          </li>
                            <?php
                            }?>
            </ul>
          </div>
        </div>

                <!------ End show first post  -------->

      </div>
    </div>
  </div>
  
              <!------End show posts  -------->
              <?php include 'include/footer_user.php'?>
