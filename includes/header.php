<?php
session_start();
$lang = 'ru';
// Set Language variable
if(isset($_GET['lang']) && !empty($_GET['lang']))
    $_SESSION['lang'] = $_GET['lang'];

if(isset($_SESSION['lang']) && !empty($_SESSION['lang']))
    $lang = $_SESSION['lang'];

include "language/".$lang.".php";
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="<?= $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title><?= empty($title)? 'Essence': $title; ?></title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <?= empty($style) ? '':$style; ?> 

</head>
<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="/"><img src="img/core-img/logo.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#"><?= _CATEGORIES; ?></a>
                                <ul class="dropdown">
                                    <?php
                                        $sql ="SELECT id, name_".$lang." FROM categories";
                                        $query=mysqli_query($db,$sql);
                                        while($row=mysqli_fetch_array($query)){
                                            printf("<li><a href='category.php?id=%s'>%s</a></li>", $row[0], $row[1]);
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="products.php"><?= _ALLPRO; ?></a></li>
                            <li><a href="#"><?= _ABOUTUS; ?></a></li>
                            <li><a href="#"><?= _CONTACT; ?></a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="?lang=ru"><img src="img/rus.png" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="?lang=uz"><img src="img/uzb.png" alt=""></a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span>3</span></a>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
    <?php include 'cart.php';?>