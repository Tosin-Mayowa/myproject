<?php
$query = "SELECT * FROM blog WHERE post_id = $post_id";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_view_count = $row['post_view_count'];
?>
    <h1><?php echo $post_title; ?> </h1>
    <p class="lead text-capitalize">
        post view: <?php echo $post_view_count; ?>
    </p>


    <p class="lead">
        by <?php echo $post_author; ?>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="./image/<?php echo $post_image; ?>" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead"><?php echo $post_content; ?></p>

    <hr>






<?php
}


?>