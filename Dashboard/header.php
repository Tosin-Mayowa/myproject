<?php session_start(); ?>
<?php include "db.php"; ?>
<?php ob_start(); ?>
<?php
if (isset($_SESSION['user_id'])) {
    $session = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE user_id= $session";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_array($result);
    if (!empty($user)) {
        $_SESSION['user_name'] =  $user['user_name'];
        $_SESSION['user_firstname'] = $user['user_firstname'];
        $_SESSION['user_secret'] = $user['user_secret'];
        $_SESSION['user_password'] = $user['user_password'];
        $_SESSION['user_email'] =  $user['user_email'];
        $_SESSION['user_role'] = $user['user_role'];
    } else {
        unset($session);
    }
}




?>











<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DM Admin - Digixmarketz</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>