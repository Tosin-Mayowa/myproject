<?php
if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === 'subscriber') {
        header("Location:./Dashboard/index_subscriber.php");
    } else {
        header("Location:./Admin/index.php");
    }
}
?>
<?php include "./function.php"; ?>
<?php include "./db.php"; ?>
<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Digital Marketing and Web Development Agency">
    <meta name="keywords" content="">
    <meta name="author" content="Digix Marketz">
    <meta name="google-site-verification" content="jaT-KeQgDz58piv6oSlRQooa_V70zQUq4bb3KpxBIrs" />
    <title>Digital Marketing Agency</title>

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Roboto&display=swap" rel="stylesheet">
    <script src="js/all.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- navbar-->
   


    <!--end navbar-->










    <!--  <nav class="fixed-top">
            <div class="container-fluid bg-info">
                <div class="row">
                    <div class="col-3 d-flex justify-content-around">
                        <img src="./image/logo60r.png" alt="">
                    </div>
                    <div class="col-9 d-flex justify-content-around">
                        <ul class="nav myset">

                            <li class="nav-item trans">
                                <a class="nav-link text-white text-uppercase active" href="#">home</a>
                            </li>

                            <li class="nav-item trans">
                                <a class="nav-link text-white text-uppercase" href="#skills">services</a>
                            </li>
                            <li class="nav-item trans">
                                <a class="nav-link text-white text-uppercase" href="#about">about</a>
                            </li>
                            <li class="nav-item trans">
                                <a class="nav-link text-white text-uppercase" href="#project">project</a>
                            </li>
                            <li class="nav-item trans">
                                <a class="nav-link text-white text-uppercase" href="#team">our team</a>
                            </li>
                            <li class="nav-item trans">
                                <a class="nav-link text-white text-uppercase" href="#blog">blog post</a>
                            </li>
                            <li class="nav-item trans">
                                <a class="nav-link text-white text-uppercase" href="#contact">contact</a>
                            </li>
                        </ul>

                        <div>
                            <a href="sign_up.php"><button class="btn btn-warning mr-2 my-2" type="submit">sign up</button></a>
                            <a href="sign_up.php"><button class="btn btn-primary my-2" type="submit">login</button></a>
                        </div>

                    </div>
                    </ul>
                </div>
            </div>
        </nav> -->