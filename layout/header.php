<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>VietViVu</title>
    <link rel="stylesheet" type="text/css" href="styles/css/main_style.css">
    <link rel="stylesheet" type="text/css" href="styles/css/Animation.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <?php
    // // Start the session
    session_start();
    ?>
    <div id="wrapper">
        <!-- Header -->
        <header class="header">
            <!-- Top Bar -->
            <div class="top_bar">
                <div class="bar__info">
                    <div class="phone">0988 410 926</div>
                    <div class="social">
                        <ul class="social_list">
                            <li class="social_list_item"><a href="https://www.facebook.com/longbap0326"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social_list_item"><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li class="social_list_item"><a href="https://www.youtube.com/channel/UCsBqPByq9mEAibLYxhPodXA"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>

                </div>

                <div class="bar__user">
                    <?php
                        if(isset($_SESSION["FullName"])){
                            echo "<div class='bar__user-login'><a href='logout.php'>Logout</a></div>";
                        }
                        else{
                            echo "<div class='bar__user-login'><a href='admin/login.php'>login</a></div>
                            <div class='bar__user-regis'><a href='admin/register.php'>register</a></div>";
                        }
                    ?>
                   
                </div>
            </div>

            <div class="main_nav">
                <div class="main_nav__logo"><a href="./"><img src="styles/images/logo.png" alt="logo"> VIETVIVU</a></div>
                <div class="main_nav__menu">
                    <ul class="main_nav__list">
                        <li class="main_nav__item"><a href="index.php">HOME</a></li>
                        <li class="main_nav__item"><a href="about.php">INTRODUCE</a></li>
                        <li class="main_nav__item"><a href="offers.php">OFFERS</a></li>
                        <li class="main_nav__item"><a href="blog.php">NEWS</a></li>
                        <li class="main_nav__item"><a href="contact.php">CONTACT</a></li>
                        <?php 
                        if (isset($_SESSION['RoleName'])) {
                            echo '<li class="main_nav__item"><a href="admin">Admin</a></li>';
                        } 
                        ?>
                    </ul>
                </div>
                <div class="main_nav__search">
                    <form action=""><input class="input_search" type="text"></form>
                    <div class="search__item"><i class="fas fa-search"></i></div>
                </div>
            </div>
        </header>