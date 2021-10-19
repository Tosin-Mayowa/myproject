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

        
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   
                                    <div class='huge'><?php echo $_SESSION['user_firstname']; ?> </div>
                                    <div>Profile</div>
                                </div>
                            </div>
                        </div>
                        <a href="view_all_post.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                     

                                    $query = "SELECT * FROM blog";
                                    $result_count = mysqli_query($connection, $query);
                                    $blog_post_count = mysqli_num_rows($result_count);

                                    
                                    ?>
                                    <div class='huge'><?php echo $blog_post_count?></div>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="view_all_comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM users";
                                    $result_count = mysqli_query($connection, $query);
                                    $user_count = mysqli_num_rows($result_count);

                                    ?>
                                    <div class='huge'><?php echo $user_count ?></div>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="view_all_users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM category";
                                    $result_count = mysqli_query($connection, $query);
                                    $category_count = mysqli_num_rows($result_count);

                                    ?>
                                    <div class='huge'><?php echo $category_count ?></div>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <?php
            $query = "SELECT * FROM blog WHERE post_status='draft'";
            $result_draft = mysqli_query($connection, $query);
            $post_draft_count = mysqli_num_rows($result_draft);

            $query = "SELECT * FROM users WHERE user_role='subscriber'";
            $result_subscr = mysqli_query($connection, $query);
            $subscriber_count = mysqli_num_rows($result_subscr);

            $query = "SELECT * FROM comment WHERE comment_status='unapproved'";
            $result_unapp = mysqli_query($connection, $query);
            $unapproved_count = mysqli_num_rows($result_unapp);


            ?>
            <div class="row">
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],
                            <?php
                            $element_text = ['Active post', 'Draft', 'Comments', 'Unapproved', 'Users', 'Subcriber'];
                            $element_count = [$blog_post_count, $post_draft_count, $comment_count, $unapproved_count, $user_count, $subscriber_count];
                            for ($i = 0; $i < 6; $i++) {

                                echo "['$element_text[$i]' " . "," .  "$element_count[$i]],";
                            }
                            ?>


                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>

                <div id="columnchart_material" style="width: auto; height: 500px;"></div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
</div>
</div>
</div>
<?php include "footer.php"; ?>