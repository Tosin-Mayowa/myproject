 <?php include "header.php"; ?>

 <div id="wrapper">

     <!-- Navigation -->
     <?php include "navigation.php"; ?>
     <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
     <?php include "sidebar_nav_subs.php"; ?>
     <div id="page-wrapper">

         <div class="container-fluid">

             <!-- Page Heading -->
             <?php include "pageheading.php"; ?>


             <br>
             <!-- /.row -->

             <div class="row">
                 <div class="col-lg-12">



                     <?php

                        
                        if (isset($_POST['checkBoxArray'])) {
                            foreach ($_POST['checkBoxArray'] as $value) {
                                $bulk_options = $_POST['bulk_options'];

                                switch ($bulk_options) {


                    


                                    default:
                                        echo "nothing is found";
                                        break;
                                }
                            }
                        }

                        ?>
                     <form action="" method="post">
                         <table class="table table-bordered table-striped table-hover">
                             <div class="col-xs-4" id="bulkOptionsContainer">
                                 <select name="bulk_options" class="form-control" id="">
                                     <option value="">Select options</option>
                                     <option value="delete">Delete</option>
                                 </select>
                             </div>
                             <div class="col-xs-4">
                                 <input type="submit" name="submit" class="btn btn-success text-uppercase" value="apply">
                                 <a href="./blog.php" class="btn btn-primary text-uppercase">view posts </a>
                             </div>

                             <thead>
                                 <tr>
                                     <th><input type="checkbox" name="all_boxes" id="selectAllBoxes"></th>
                                     <th>Id</th>
                                     <th>Author</th>
                                     <th>Title</th>
                                     <th>Cat_id</th>
                                     <th>Post_view</th>
                                     <th>Status</th>
                                     <th>Images</th>
                                     <th>post_status</th>
                                     <th>Contents</th>
                                     <th>Date</th>

                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $query = "SELECT * FROM blog";
                                    $result_blog = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_assoc($result_blog)) {
                                        $post_id = $row['post_id'];
                                        $post_title = $row['post_title'];
                                        $post_author = $row['post_author'];
                                        $post_date = $row['post_date'];
                                        $post_content = substr($row['post_content'], 0, 50);
                                        $post_tags = $row['post_tags'];
                                        $post_status = $row['post_status'];
                                        $post_content_count = $row['post_content_count'];
                                        $post_image = $row['post_image'];
                                        $post_category_id = $row['post_category_id'];
                                        $post_view_count = $row['post_view_count'];
                                    ?>

                                     <tr>

                                         <td><input type="checkbox" class="checkboxes text-danger" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>

                                         <td><?php echo $post_id; ?></td>
                                         <td><?php echo $post_author; ?></td>
                                         <td><?php echo $post_title; ?></td>

                                         <?php
                                            $query = "SELECT * FROM category WHERE cat_id =$post_category_id";
                                            $result = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $cat_title = $row['cat_title'];
                                                $cat_id = $row['cat_id'];
                                            ?>

                                             <td><?php echo $cat_title ?></td>
                                         <?php }

                                            ?>
                                         <td><?php echo $post_view_count; ?></td>

                                         <td><?php echo $post_status ?></td>
                                         <td> <img width='100' src='../image/<?php echo $post_image ?>'></td>
                                         <td><?php echo $post_tags ?></td>
                                         <td><?php echo $post_content ?></td>
                                         <td><?php echo $post_date ?></td>


                                     </tr>
                                     <!--                 once i click on delete, it will take me to post.php, since no value for source the default command       
will be activated i.e view_post.php will be added to post.php
 -->

                             </tbody>
                         <?php } ?>

                         </table>
                     </form>
                 </div>
             </div>
         </div>
         <!-- /.container-fluid -->

     </div>
     <!-- /#page-wrapper -->

 </div>

 <!-- /#wrapper -->

 <?php include "footer.php"; ?>