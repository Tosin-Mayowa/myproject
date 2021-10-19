<?php include "includes/header.php"; ?>

<!-- Page Content -->
<section id="post_individual" class="bg-primary text-white">
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
                <?php
                if (isset($_GET['p_id'])) {
                    $post_id=$_GET['p_id'];
                    $source = $_GET['source'];
                   $query_select= "SELECT * FROM blog WHERE post_id=$post_id";
                    $result_selct = mysqli_query($connection, $query_select);
                    $collect= mysqli_fetch_array($result_selct);

                    $post_view_count = $collect['post_view_count'];
                    

                    $query= "UPDATE blog SET post_view_count=$post_view_count+1 WHERE post_id=$post_id";
                     $result=mysqli_query($connection, $query);
                    // the above source is not define, no link with variable source
                } else {
                    $source = '';
                    // we did this to remove error of undefine source
                }
                
                switch ($source) {
                    case '34';
                        echo 'nice 34';
                        break;

                    case 'individual_post';
                        include "includes/individual_post.php";
                        break;

                    default:
                       echo "nothing found";
                        break;
                        // the default value wil always be echo out because the source has no value of 34
                }
                ?>
                <!-- Title -->

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <?php
                    if (isset($_POST['submit_comment'])) {
                        $post_id = $_GET['p_id'];
                        $comment_post_id = $post_id;
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_phone_no = $_POST['comment_phone_no'];
                        $comment_content = $_POST['comment_content'];
                        $comment_status = 'unapproved';
                        $comment_date = date('d-m-y');
                        $comment_response = 'put your response';
                        $comment_response_status = 'no response yet';
                        $comment_response_count = 0;

                        $query = "INSERT INTO comment (comment_post_id, comment_author, comment_email, comment_phone_no, comment_content, comment_status, comment_date, comment_response, comment_response_status,comment_response_count) VALUES ('$comment_post_id', '$comment_author', '$comment_email', '$comment_phone_no', '$comment_content', '$comment_status', now(), '$comment_response', '$comment_response_status',$comment_response_count)";
                        $result_comment = mysqli_query($connection, $query);
                        if (!$result_comment) {
                            die("QUERY FAILED ." . mysqli_error($connection));
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <div class="form-group mt-3">
                            <label for="author">Author</label>
                            <input type="text" name="comment_author" class="form-control form-control-lg" id="author">
                        </div>
                        <div class="form-group mt-3">
                            <label for="mail">Email</label>
                            <input type="email" name="comment_email" class="form-control form-control-lg" id="mail">
                        </div>
                        <div class="form-group mt-3">
                            <label for="phone">Phone No</label>
                            <input type="tel" name="comment_phone_no" class="form-control form-control-lg" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="">Your comment</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit_comment" class="btn btn-danger">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->

                <div class="row mt-3">
                    <?php
                    $query = "SELECT * FROM comment WHERE comment_post_id = $post_id ORDER BY comment_id DESC";
                    $result_individual_comment = mysqli_query($connection, $query);
                    if (!$result_individual_comment) {
                        die("QUERY FAILED ." . mysqli_error($connection));
                    } else {
                        while ($row = mysqli_fetch_assoc($result_individual_comment)) {
                            $comment_id = $row['comment_id'];
                            $comment_post_id = $row['comment_post_id'];
                            $comment_author = $row['comment_author'];
                            $comment_email = $row['comment_email'];
                            $comment_phone_no = $row['comment_phone_no'];
                            $comment_content = $row['comment_content'];
                            $comment_status = $row['comment_status'];
                            $comment_date = $row['comment_date'];
                            $comment_response = $row['comment_response'];
                            $comment_response_count = $row['comment_response_count'];
                    ?>
                            <div class="col-md-8 col-lg-8 d-flex">
                                <a class="pull-left" href="#">
                                    <img class="media-object mr-3" src="http://placehold.it/64x64" alt="">
                                </a>
                                <div class="my-5">
                                    <h4 class=""><?php echo $comment_author; ?>
                                        <small><?php echo $comment_date ?></small>
                                    </h4>
                                    <div class="comment">

                                        <?php echo $comment_content; ?>
                                        <a class="text-warning" href="">Replies</a>
                                    </div>

                                </div>

                                <!-- Nested Comment -->

                                <!-- End Nested Comment -->
                            </div>
                </div>


        <?php
                        }
                    }
        ?>

            </div>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled text-white">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2021</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

    </div>
    <!-- /.container -->
</section>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery-3.6.0.min.js"></script>
</body>