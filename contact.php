<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViVuViet - Contact</title>
    <link rel="stylesheet" type="text/css" href="styles/css/main_style.css">
    <link rel="stylesheet" type="text/css" href="styles/css/Animation.css">

    <!--    CSS-->
    <!--    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>-->
    <!--    JS-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
    <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
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


    </script>
    <script language="javascript">
        function validateForm() {
            var check_email = /^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/;
            var a = document.getElementById('form_name').value;
            var b = document.getElementById('form_email').value;
            var c = document.getElementById('form_subject').value;
            var d = document.getElementById('form_mess').value;

            if (a == '') {
                swal('Vui lòng nhập Tên');
            } else if (!check_email.test(b)) { //so sanh
                swal('Email không đúng, vui  lòng nhập lại');
            } else if (c == '') {
                swal("Vui lòng nhập chủ đề")
            } else if (d == '') {
                swal("Vui lòng nhập nội dung")
            } else {
                //Lấy all dữ liệu trong form
                var data = $('form#form_contact').serialize();

                $.ajax({
                    type: 'POST', //kiểu post
                    url: 'test.php', //gửi dữ liệu sang trang test.php
                    data: data,
                    success: function (data) {
                        if (data == 'false') {
                            swal('Gởi thất bại');
                        } else {
                            swal("Thành công!", "Nội dung đã được gởi", "success");
                            $('#contact').html(data);
                        }
                    }
                });
                // return true;
            }

            return false;
        }
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
                     style="background-image: url(styles/images/offers_slide.jpg)"></div>
                <div class="home__content">
                    <div class="home__title animated bounceInDown">
                        Contact
                    </div>
                </div>
            </div>
        </div>
        <!--        contact-->
        <div class="contact_form_container">
            <div class="box contact_form__box">
                <div class="contact_form__title">Contact form</div>
                <form action="" id="form_contact" class="contact__form" method="post" name="form_contact"
                      onsubmit="return validateForm()">
                    <label>
                        <input id="form_name" class="contact__form_name input_field" name="name" placeholder="Fullname"
                               type="text" value="">
                    </label>
                    <label>
                        <input id="form_email" class="contact__form_email input_field" name="email" placeholder="E-mail"
                               type="text" value="">
                    </label>
                    <label>
                        <input id="form_subject" class="contact__form_subject input_field" name="subject"
                               placeholder="Subject" type="text">
                    </label>
                    <textarea name="mess" id="form_mess" placeholder="Message" rows="4"
                              class="contact__form_mess input_field"></textarea>
                    <input type="submit" class="contact__form_button button trans_200" value="Send">
                </form>
            </div>
        </div>

        <div class="contact__info">
            <div class="box contact__info_box">
                <h2>Address</h2>
                <p>- 107 Nguyễn Phong Sắc, Cầu Giấy, Hà Nội -</p>
            </div>
        </div>
        <div class="contact__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.808799367444!2d105.7880043148836!3d21.0403350859921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab36e43cf6eb%3A0xc420d35b1d1a47ac!2zMTA3IE5ndXnhu4VuIFBob25nIFPhuq9jLCBE4buLY2ggVuG7jW5nIEjhuq11LCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2sus!4v1648150158723!5m2!1svi!2sus"
                    width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen></iframe>
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