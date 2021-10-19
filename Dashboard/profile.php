<?php include "header.php"; ?>





<div id="wrapper">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include "sidebar_nav_subs.php"; ?>
    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div id="img" class="text-center">
                    <img src="./image/<?php echo $proj_image ?>" alt="project1" class="img-fluid rounded mx-auto">
                </div>
            </div>
            <div class="row">
                <div>
                    <h1 class="text-center text-uppercase display-1 font-weight-bold">
                        <?php echo $_SESSION['user_firstname']; ?> <span> <?php echo " " . $_SESSION['user_lastname']; ?> </span>
                    </h1>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include "footer.php"; ?>