<?php include "header.php"; ?>

<?php

$_SESSION['user_name'] = null;
$_SESSION['user_firstname'] = null;
$_SESSION['user_lastname'] = null;
$_SESSION['user_password'] = null;
$_SESSION['user_email'] = null;
$_SESSION['user_name'] = null;
$_SESSION['user_role'] = null;
?>

<section id="logout" class="p-5">
    <div class="container bg-primary">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h1 class="text-white">Digix Marketz</h1>
                <p class="lead text-white">Logout successfully</p>
                <a href="../sign_up.php" class="btn btn-warning text-white btn-lg mb-3  text-capitalize">Back</a>
            </div>
        </div>
    </div>
</section>






<?php include "footer.php"; ?>