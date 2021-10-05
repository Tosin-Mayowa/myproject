<?php session_start(); ?>
<?php include "./db.php"; ?>

<?php
if (isset($_POST['login'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_email_clean = mysqli_real_escape_string($connection, $user_email);
    $user_password_clean = mysqli_real_escape_string($connection, $user_password);



    $query = "SELECT * FROM users WHERE user_email='$user_email_clean'";
    $result_user_login = mysqli_query($connection, $query);
    if (!$result_user_login) {
        die("QUERY FAILED" . mysqli_error($connection));
    } else {
        while ($row = mysqli_fetch_assoc($result_user_login)) {
            $db_user_id = $row['user_id'];
            $db_user_name = $row['user_name'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_password = $row['user_password'];

            $db_user_email = $row['user_email'];
            $db_user_role = $row['user_role'];
        }
    }
    if ($user_email_clean !== $db_user_email && $user_password_clean !== $db_user_password) {
        header("Location:login.php");
    } elseif (password_verify($user_password_clean, $db_user_password)) {

        $_SESSION['user_name'] = $db_user_name;
        $_SESSION['user_firstname'] = $db_user_firstname;
        $_SESSION['user_lastname'] = $db_user_lastname;
        $_SESSION['user_password'] = $db_user_password;
        $_SESSION['user_email'] =  $db_user_email;
        $_SESSION['user_name'] = $db_user_name;
        $_SESSION['user_role'] = $db_user_role;
    }
}



?>

<?php include "./includes/header.php"; ?>

<section id="filler" class="p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h1 class="text-primary">Digix Marketz</h1>
                <p class="lead text-white">Login failed, invalid email or password</p>
                <a href="sign_up.php" class="btn btn-outline-info btn-lg m-2 text-capitalize">Back</a>
            </div>
        </div>
    </div>
</section>






<?php include "includes/footer.php"; ?>