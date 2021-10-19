<?php include "includes/header.php"; ?>

<!-- blog Page section -->
<section id="blog" class="bg-primary">
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8 text-white">
                <?php

                $query = "SELECT * FROM blog";
                $result_blog = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result_blog)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                ?>
                <!-- Blog Post -->

                <!-- Title -->
                <h1><a class="text-white btitle" href="post.php?source=individual_post&p_id=<?php echo $post_id; ?>">
                        <?php echo $post_title; ?>
                    </a></h1>

                <!-- Author -->
                <p class="lead">
                    by <?php echo $post_author; ?>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>

                <hr>

                <!-- Preview Image -->
                <a class="text-white btitle" href="post.php?source=<?php echo $post_id; ?>"><img class="img-responsive" src="./image/<?php echo $post_image; ?>" alt=""> </a></h1>


                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $post_content; ?></p>

                <hr>

            <?php
                }
            ?>




            <!-- Blog Comments -->



            <!-- Posted Comments -->

            <!-- Comment -->
            <div class="media mt-3">
                <a class="pull-left" href="#">
                    <img class="media-object mr-3" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2021 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <!-- Comment -->
            <div class="media mt-3">
                <a class="pull-left" href="#">
                    <img class="media-object mr-3" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body mt-3">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2021 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    <!-- Nested Comment -->
                    <div class="media mt-2">
                        <a class="pull-left" href="#">
                            <img class="media-object mr-3" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2021 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>

            </div>
            <!--end of Blog col -->
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/blog_sidebar.php"; ?>
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy;Developed by Digixmarketz 2021</p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>

        </div>
        <!-- /.container -->
</section>


<?php include "includes/footer.php" ?>