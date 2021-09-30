<?php include "db.php"; ?>




<?php include "./includes/header.php"; ?>


<header id="header" class="sign">
    <div class="container">
        <div class="row height align-items-center">
            <div class="col-md-8">
                <h1 class="text-white text-capitalize font-weight-bold font-italic">
                    <strong>Digital marketing</strong><br>
                    <small>and web development agency</small>
                </h1>
                <p class="text-white lead py-2 w-75">We can increase your sales beyond your imagination within a short period of time, and we solve all backend problems with PHP</p>
                <a href="index.php" class="btn btn-outline-info btn-lg m-2 text-capitalize">Home</a>
                <div class="login">

                    <form action="login.php" method="post">
                        <div class="form-group text-white text-capitalize font-weight-bold mt-3">
                            <input type="email" name="user_email" placeholder="Email" class="form-control form-control-md form-control-lg w-50" id="author">
                        </div>
                        <div class="form-group text-white text-capitalize font-weight-bold mt-3">
                            <input type="password" name="user_password" placeholder="password" class="form-control form-control-md form-control-lg w-50" id="tags">
                        </div>
                        <div class="form-group"><input type="submit" name="login" value="login" class="btn btn-primary text-capitalize  font-weight-bold" id=""></div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="text-white font-weight-bold py-2 w-75 text-capitalize">Sign up today, to have access to all our products</h2>
                <?php
                $nameErr = $emailErr = $passErr = "";
                $user_name = $user_firstname = $user_email = $user_role = $user_password = $user_lastname =$success= "";
                if (isset($_POST['submit'])) {
                    $user_name = $_POST['user_name'];
                    $user_email = $_POST['user_email'];
                    $user_role = $_POST['user_role'];
                    $user_password = $_POST['user_password'];
                    $user_firstname = $_POST['user_firstname'];
                    $user_lastname = $_POST['user_lastname'];
                    /* $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $move = move_uploaded_file($post_image_temp, "../image/$post_image");
    if (!$move) {
        die("QUERY FAILED ." . mysqli_error($connection));
    } */
                    $query = "SELECT * FROM users WHERE user_name ='$user_name' OR user_email='$user_email'";
                    $result_user = mysqli_query($connection, $query);

                    $row = mysqli_fetch_array($result_user);
                    if (!empty($row)) {
                        $db_user_name =  $row['user_name'];
                        $db_user_email =  $row['user_email'];


                        if (!empty($user_name) && !empty($user_email) && !empty($user_password) && $user_name === $db_user_name && $user_email === $db_user_email) {
                            $user_name = mysqli_real_escape_string($connection, $user_name);
                            $user_email = mysqli_real_escape_string($connection, $user_email);
                            $user_role = mysqli_real_escape_string($connection, $user_role);
                            $user_password = mysqli_real_escape_string($connection, $user_password);
                            $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
                            $user_lastname = mysqli_real_escape_string($connection, $user_lastname);

                            $query_insert = "INSERT INTO users (user_name, user_firstname, user_lastname, user_email, user_password, user_role) VALUES ('$user_name', '$user_firstname', '$user_lastname', '$user_email', '$user_password', '$user_role')";
                            $result_create = mysqli_query($connection, $query_insert);
                            $success = "<h6 class=text-success text-center'>Sign up successful</h6>";
                        } elseif ($user_name === $db_user_name) {
                            $nameErr = "username is used by another user";
                        } elseif ($user_email === $db_user_email) {
                            $emailErr = "<h6>The email is used by another user</h6>";
                        } else {
                            echo "<h6 class='text-danger'>All fields must be filled before submission</h6>";
                        }
                    } else {


                        if (!empty($user_name) && !empty($user_email) && !empty($user_password)) {
                            $user_name = mysqli_real_escape_string($connection, $user_name);
                            $user_email = mysqli_real_escape_string($connection, $user_email);
                            $user_role = mysqli_real_escape_string($connection, $user_role);
                            $user_password = mysqli_real_escape_string($connection, $user_password);
                            $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
                            $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
                            $user_password=password_hash($user_password, PASSWORD_BCRYPT, array('cost'=>12));
                            $query_insert = "INSERT INTO users (user_name, user_firstname, user_lastname, user_email, user_password, user_role) VALUES ('$user_name', '$user_firstname', '$user_lastname', '$user_email', '$user_password', '$user_role')";
                            $result_create = mysqli_query($connection, $query_insert);
                            echo "<h6 class=text-success text-center'>Sign up successful</h6>";
                        } else {
                            echo "<h6 class='text-danger'>All fields must be filled before submission</h6>";
                        }
                    }
                }
                ?>
                <?php echo $success ?>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group text-white text-capitalize font-weight-bold mt-3">
                        <label for="author">firstname</label>
                        <input type="text" name="user_firstname" value="<?php echo htmlentities($user_firstname); ?> " class="form-control form-control-lg" id="author">
                    </div>

                    <div class="form-group text-white text-capitalize font-weight-bold mt-3">
                        <label for="title">lastname</label>
                        <input type="text" name="user_lastname" value="<?php echo htmlentities($user_lastname); ?> " class="form-control form-control-lg" id="title">
                    </div>

                    <div class="form-group text-white text-capitalize font-weight-bold mt-3">
                        <label for="user">username <span class="text-danger">*</span> </label>
                        <input type="text" name="user_name" value="<?php echo htmlentities($user_name); ?> " class="form-control form-control-lg" id="user">
                        <span class="text-danger"> <?php echo $nameErr ?></span>
                    </div>


                    <div class="form-group text-white text-capitalize font-weight-bold mt-3">
                        <label for="status"> email <span class="text-danger">*</span></label>
                        <input type="email" name="user_email" value="<?php echo htmlentities($user_email); ?> " class="form-control form-control-lg" id="status">
                        <span class="text-danger"> <?php echo $emailErr ?></span>
                    </div>

                    <!-- <div class="form-group mt-3">
        <label for="image">post_image</label>
        <input type="file" name="post_image" class="form-control form-control-lg" id="image">
    </div> -->

                    <div class="form-group text-white text-capitalize font-weight-bold mt-3">
                        <label for="tags">password<span class="text-danger">*</span></label>
                        <input type="password" name="user_password" class="form-control form-control-lg" id="tags">
                    </div>
                    <div class="form-group text-white text-capitalize font-weight-bold mt-3">
                        <select name="user_role" id="">
                            <option value="subscriber">subscriber</option>
                        </select>
                    </div>
                    <div class="form-group mt-3 mx-auto">
                        <input type="submit" name="submit" value="sign up" class="btn btn-primary text-capitalize  font-weight-bold" id="">
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>