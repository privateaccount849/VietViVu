<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>VietViVu - Blog</title>
    <link rel="stylesheet" type="text/css" href="styles/css/main_style.css">
    <link rel="stylesheet" type="text/css" href="styles/css/Animation.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/tooltipster/dist/css/tooltipster.bundle.min.css" />
    <script type="text/javascript" src="styles/tooltipster/dist/js/tooltipster.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 35 || document.documentElement.scrollTop > 35) {
                $(document).ready(function() {
                    $(".top_bar").hide();
                });

            } else {
                $(document).ready(function() {
                    $(".top_bar").show();
                });
            }
        }

        $(document).ready(function() {
            $('.tooltip').tooltipster();
        });
        $(document).ready(function() {
            $(".zoom_img").mouseover(function() {
                $(this).css({
                    width: "110%"
                })
            })
        });
        $(document).ready(function() {
            $(".zoom_img").mouseout(function() {
                $(this).css({
                    width: "100%"
                })
            })
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
                    <div class="home_slide__background" style="background-image: url(styles/images/offers_slide.jpg)"></div>
                    <div class="home__content">
                        <div class="home__title animated bounceInDown">
                            News
                        </div>
                    </div>
                </div>
            </div>
            <!--        blog-->
            <div class="blog">
                <div class="box blog__box">
                    <div class="blog__list">
                        <div class="blog_post">
                            <div class="blog_post_image">
                                <img class="zoom_img" src="styles/images/blog_1.jpg" alt="">
                                <div class="blog_post_date"><span>21/04/2021</span></div>
                            </div>
                            <div class="blog_post_meta">
                                <ul>
                                    <li class="blog_post_meta_item"><a href="#">by VietViVu</a></li>
                                    <li class="blog_post_meta_item"><a href="#">Mid Side</a></li>
                                    <li class="blog_post_meta_item"><a href="#">99 comments</a></li>
                                </ul>
                            </div>
                            <div class="blog_post_title"><a href="#">ABOUT MID SIDE</a></div>
                            <div class="blog_post_text">
                                <p>I will tell you about my poetic, idyllic trip in the beloved Central region. It's sunny, windy, beautiful scenery and many unique cultural heritages. There are warm smiles, great food and even "lost" hearts that don't want to go back…</p>
                            </div>
                            <div class="blog_post_link"><a href="#">Read More...</a></div>
                        </div>
                        <div class="blog_post">
                            <div class="blog_post_image">
                                <img class="zoom_img" src="styles/images/blog_2.jpg" alt="">
                                <div class="blog_post_date"><span>21/04/2019</span></div>
                            </div>
                            <div class="blog_post_meta">
                                <ul>
                                    <li class="blog_post_meta_item"><a href="#">by VietViVu</a></li>
                                    <li class="blog_post_meta_item"><a href="#">North Side</a></li>
                                    <li class="blog_post_meta_item"><a href="#">54 comments</a></li>
                                </ul>
                            </div>
                            <div class="blog_post_title"><a href="#">A NEW JOURNEY - THREE DESTINATIONS TO THE NORTHERN HEALTHY</a>
                            </div>
                            <div class="blog_post_text">
                                <p>Only one journey, visitors can discover three famous heritages of Vietnam: Ha Long Bay, Trang An and Ho Dynasty citadel... Especially, high-class resort services, the combination of Vietravel and airlines no Bambo Airways has brought you the best price this summer.</p>
                            </div>
                            <div class="blog_post_link"><a href="#">Read More...</a></div>
                        </div>
                        <div class="blog_post">
                            <div class="blog_post_image">
                                <img class="zoom_img" src="styles/images/blog_3.jpg" alt="">
                                <div class="blog_post_date"><span>21/04/2019</span></div>
                            </div>
                            <div class="blog_post_meta">
                                <ul>
                                    <li class="blog_post_meta_item"><a href="#">by VietViVu</a></li>
                                    <li class="blog_post_meta_item"><a href="#">North Side</a></li>
                                    <li class="blog_post_meta_item"><a href="#">54 comments</a></li>
                                </ul>
                            </div>
                            <div class="blog_post_title"><a href="#">FESTIVAL TOUR 30/4 AND 1/5: WHY ARE PACKAGE TOURS STILL BEST SELLERS?</a>
                            </div>
                            <div class="blog_post_text">
                                <p>With 5 consecutive days off, this year's April 30 & May 1 holiday promises to be a "golden holiday" for many families and office workers. According to the survey, package tours from well-known travel agencies still dominate the market with many outstanding advantages such as: stable prices, many new destinations and discounts. interesting…</p>
                            </div>
                            <div class="blog_post_link"><a href="#">Read More...</a></div>
                        </div>
                        <div class="blog_navigation">
                            <ul>
                                <li class="blog_dot active">01.</li>
                                <li class="blog_dot"> 02.</li>
                                <li class="blog_dot"> 03.</li>
                                <li class="blog_dot">...</li>
                            </ul>
                        </div>

                    </div>
                    <div class="blog__sidebar">
                        <div class="sidebar_times">
                            <div class="sidebar_title">Archives</div>
                            <div class="sidebar_list">
                                <ul>
                                    <li><a href="">March 2021</a></li>
                                    <li><a href="">April 2020</a></li>
                                    <li><a href="">May 2021</a></li>
                                    <li><a href="">March 2022</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar_categories">
                            <div class="sidebar_title">Categories</div>
                            <div class="sidebar_list">
                                <ul>
                                    <li><a href="">Đà Nẵng</a></li>
                                    <li><a href="">Quảng Năm</a></li>
                                    <li><a href="">Huế</a></li>
                                    <li><a href="">Hà Nội</a></li>
                                    <li><a href="">Hồ Chí Minh</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar_latest_posts">
                            <div class="sidebar_title">Latest Posts</div>
                            <div class="latest_posts">
                                <div class="latest_post">
                                    <div class="latest_post_image"><img src="styles/images/latest_1.jpg" alt=""></div>
                                    <div class="latest_post_content">
                                        <div class="latest_post_title"><a href="#">A simple blog post</a></div>
                                        <div class="latest_post_meta">by VietViVu - 21/04/2019</div>
                                    </div>
                                </div>
                                <div class="latest_post">
                                    <div class="latest_post_image"><img src="styles/images/latest_1.jpg" alt=""></div>
                                    <div class="latest_post_content">
                                        <div class="latest_post_title"><a href="#">Dream destination for you/a></div>
                                        <div class="latest_post_meta">by VietViVu - 21/04/2019</div>
                                    </div>
                                </div>
                                <div class="latest_post">
                                    <div class="latest_post_image"><img src="styles/images/latest_1.jpg" alt=""></div>
                                    <div class="latest_post_content">
                                        <div class="latest_post_title"><a href="#">Tips to travel light</a></div>
                                        <div class="latest_post_meta">by VietViVu - 21/04/2019</div>
                                    </div>
                                </div>
                                <div class="latest_post">
                                    <div class="latest_post_image"><img src="styles/images/latest_1.jpg" alt=""></div>
                                    <div class="latest_post_content">
                                        <div class="latest_post_title"><a href="#">How to pick your vacation</a></div>
                                        <div class="latest_post_meta">by VietViVu - 21/04/2019</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="sidebar_gallery">
                            <div class="sidebar_title">Photos</div>
                            <div class="gallery_content">
                                <ul class="gallery_items">
                                    <li class="gallery_item"><a href="#"><img class="imggg" src="styles/images/gallery_1.jpg" alt=""></a>
                                    </li>
                                    <li class="gallery_item"><a href="#"><img src="styles/images/gallery_2.jpg" alt=""></a>
                                    </li>
                                    <li class="gallery_item"><a href="#"><img src="styles/images/gallery_3.jpg" alt=""></a>
                                    </li>
                                    <li class="gallery_item"><a href="#"><img src="styles/images/gallery_4.jpg" alt=""></a>
                                    </li>
                                    <li class="gallery_item"><a href="#"><img src="styles/images/gallery_5.jpg" alt=""></a>
                                    </li>
                                    <li class="gallery_item"><a href="#"><img src="styles/images/gallery_6.jpg" alt=""></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
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

</html>