<?php include "./includes/header.php"; ?>
<section id="forgot" class="p-5">
    <div class="container mt-5  reg">
        <div class="row">
            <div class="col-md-4">
                <?php
                $emailErr=$secretErr = $passErr="";
                if (isset($_POST['submit'])) {
                    $user_email = $_POST['user_email'];
                    $user_password = $_POST['user_password'];
                    $confirm_pass = $_POST['password_repeat'];
                    $user_secret = $_POST['user_secret'];
                    $user_password = mysqli_real_escape_string($connection, $user_password);
                    $new_user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
                    $query= "SELECT * FROM users WHERE user_email='$user_email'";
                    $result_select= mysqli_query($connection, $query);
                   $user= mysqli_fetch_array( $result_select);
                   
                    if( !empty($user) ){
                        $db_user_id = $user['user_id'];
                        $db_user_secret = $user['user_secret'];
                        echo $db_user_id;

                        if (!empty($user_email) && !empty($user_password) && !empty($confirm_pass) && !empty($user_secret) && $user_password === $confirm_pass && $user_secret === $db_user_secret) {
                            $query =  "UPDATE users SET user_password= '$new_user_password' WHERE user_id= $db_user_id";
                            $result = mysqli_query($connection, $query);
                       
                        } elseif ($user_secret!==$db_user_secret) {
                            $secretErr= "<h6>wrong secret question</h6>";
                        }elseif (empty($user_email)) {
                            $emailErr= "<h6>field cannot be empty</h6>";
                        }
                      
                      
}
                    
                }

                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group text-white text-capitalize font-weight-bold mt-3">
                        <label for="status"> email <span class="text-danger">*</span></label>
                        <input type="email" name="user_email" class="form-control form-control-lg" id="status">
                        <span class="text-danger"> <?php echo $emailErr ?></span> 
                    </div>

                    <div class="form-group text-white text-capitalize font-weight-bold mt-3">
                        <label for="status"> your secret question? <span class="text-danger">*</span></label>
                        <input type="text" name="user_secret" class="form-control form-control-lg" id="status">
                         <span class="text-danger"> <?php echo $secretErr ?></span> 
                    </div>

                    <div class="form-group text-white text-capitalize font-weight-bold mt-3">
                        <label for="tags">password<span class="text-danger">*</span></label>
                        <input type="password" name="user_password" class="form-control form-control-lg" id="tags">
                    </div>
                    <div class="form-group text-white text-capitalize font-weight-bold mt-3">
                        <label for="tags">confirm password<span class="text-danger">*</span></label>
                        <input type="password" name="password_repeat" class="form-control form-control-lg" id="tags">
                        <span class="text-danger"> <?php echo $passErr ?></span>
                    </div>

                    <div class="form-group mt-3 mx-auto">
                        <input type="submit" name="submit" value="update" class="btn btn-primary text-capitalize  font-weight-bold" id="">
                    </div>

                </form>

            </div>
        </div>
    </div>




</section>