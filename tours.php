<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VietViVu - Tours</title>
    <link rel="stylesheet" type="text/css" href="styles/css/main_style.css">

    <link rel="stylesheet" type="text/css" href="styles/css/Animation.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/tooltipster/dist/css/tooltipster.bundle.min.css" />
    <script type="text/javascript" src="styles/tooltipster/dist/js/tooltipster.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script>
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 35 || document.documentElement.scrollTop > 35) {
                $(document).ready(function () {
                    $(".top_bar").hide();
                });

            } else {
                $(document).ready(function () {
                    $(".top_bar").show();
                });
            }
        }

        $(document).ready(function () {
            $('.bar_1').animate({
                width: "70%"
            });
            $('.bar_2').animate({
                width: "40%"
            });
            $('.bar_3').animate({
                width: "43%"
            });
            $('.bar_4').animate({
                width: "65%"
            });
        });
        $(document).ready(function() {
            $('.tooltip').tooltipster();
        });
    </script>
</head>
<body>  
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
            <!-- <div class="bar__user">
                <div class="bar__user-login"><a href="#">login</a></div>
                <div class="bar__user-regis"><a href="#">register</a></div>
            </div> -->
        </div>

        <div class="main_nav">
            <div class="main_nav__logo"><a href="#"><img src="styles/images/logo.png" alt="logo"> VIETVIVU</a></div>
            <div class="main_nav__menu">
                <ul class="main_nav__list">
                    <li class="main_nav__item"><a href="index.html">HOME</a></li>
                    <li class="main_nav__item"><a href="about.html">INTRODUCE</a></li>
                    <li class="main_nav__item"><a href="offers.html">OFFERS</a></li>
                    <li class="main_nav__item"><a href="blog.html">NEWS</a></li>
                    <li class="main_nav__item"><a href="contact.html">CONTACT</a></li>
                </ul>
            </div>
            <div class="main_nav__search">
                <form action=""><input class="input_search" type="text"></form>
                <div class="search__item"><i class="fas fa-search"></i></div>
            </div>
        </div>
    </header>
    <div class="main">
        <div class="main__slide_offers">
            <div class="home_slide__item">
                <div class="home_slide__background"
                     style="background-image: url(styles/images/bana-slide.jpg)"></div>
                <div class="home__content">
                    <div class="home__title animated bounceInDown">
                        Welcome to Vietnam
                    </div>      
                </div>
            </div>
        </div>

        <!--        tours-->
        <div class="small-container">
            <div class="row row-2"></div>

            <div class="intro_date">from 15/04 - 15/05</div>
                <div class="intro_text">
                    <h1>Hội An</h1>
                    <div class="intro_price">Price: 1,200,000đ</div>
                    <div class="rating rating_4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="button intro_button">
                    <div class="button_bcg"></div>
                    <a href="#">Check Now<span></span><span></span><span></span></a></div>
            </div>
        </div>







    </div>
    <footer class="footer">
        <button onclick="topFunction()" id="back_top" title="Go to top"><i class="fas fa-rocket"></i></button>
        <div class="box footer__box">
            <div class="footer__about">
                <div class="footer__logo">
                    <div class="logo">
                        <a href="#"><img src="styles/images/logo.png" alt="">VIETVIVU</a>
                    </div>
                </div>
                <p class="footer_about__text">
                    VietViVu is proud to be a typical unit in the field of tours receiving the most prestigious award for the Vietnamese business community.
                </p>
                <ul class="footer_social_list">
                    <li class="footer_social_item"><a href="https://www.facebook.com/longbap0326"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="footer_social_item"><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li class="footer_social_item"><a href="https://www.youtube.com/channel/UCsBqPByq9mEAibLYxhPodXA"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="footer__blog">
                <div class="footer_title">News</div>
                <div class="footer_blog__item">
                    <div class="footer_blog__image"><img src="styles/images/footer_blog_1.jpg" alt=""></div>
                    <div class="footer_blog__content">
                        <div class="footer_blog__title"><a href="#">Summer travel destination 2022</a></div>
                        <div class="footer_blog__date">30/04/2019</div>
                    </div>
                </div>
                <div class="footer_blog__item">
                    <div class="footer_blog__image"><img src="styles/images/footer_blog_1.jpg" alt=""></div>
                    <div class="footer_blog__content">
                        <div class="footer_blog__title"><a href="#">Summer travel destination 2022</a></div>
                        <div class="footer_blog__date">30/04/2019</div>
                    </div>
                </div>
                <div class="footer_blog__item">
                    <div class="footer_blog__image"><img src="styles/images/footer_blog_1.jpg" alt=""></div>
                    <div class="footer_blog__content">
                        <div class="footer_blog__title"><a href="#">Summer travel destination 2022</a></div>
                        <div class="footer_blog__date">30/04/2019</div>
                    </div>
                </div>
            </div>
            <div class="footer__tags">
                <div class="footer_title">Tags</div>
                <ul class="tags_list">
                    <li class="tags_item"><a href="#">North Side</a></li>
                    <li class="tags_item"><a href="#">Mid Side</a></li>
                    <li class="tags_item"><a href="#">South Side</a></li>
                    <li class="tags_item"><a href="#">Đà Nẵng</a></li>
                    <li class="tags_item"><a href="#">Quảng Nam</a></li>
                    <li class="tags_item"><a href="#">Huế</a></li>
                </ul>
            </div>
            <div class="footer__contact">
                <div class="footer_title">Contact</div>
                <ul class="contact_list">
                    <li class="contact_item">
                        <div class="contact_icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="contact_text">107 Nguyễn Phong Sắc, Cầu Giấy, Hà Nội</div>
                    </li>
                    <li class="contact_item">
                        <div class="contact_icon"><i class="fas fa-phone-square"></i></div>
                        <div class="contact_text">+84 988 410 926</div>
                    </li>
                    <li class="contact_item">
                        <div class="contact_icon"><i class="fas fa-envelope"></i></div>
                        <div class="contact_text">longbap20@gmail.com</div>
                    </li>
                    <li class="contact_item">
                        <div class="contact_icon"><i class="fas fa-globe-asia"></i></div>
                        <div class="contact_text">www.vietvivu.com</div>
                    </li>

                </ul>
            </div>
        </div>
    </footer>
</div>
</body>
<script src="styles/js/main_js.js"></script>
<script>
    $(function () {
        $("#tabs").tabs();
    });

</script>

</html>