<?php
include("./layout/header.php")
?>

<div class="main">
    <!--slider-->
    <div class="main__slide">
        <div class="home_slide__item">
            <div class="home_slide__background" style="background-image: url(styles/images/bana-slide.jpg)"></div>
            <div class="home_slider__content">
                <div class="home_slider_content_inner animated bounceInLeft">
                    <h1>tour</h1>
                    <h1>Bana Hill</h1>
                    <div class="button home_slider__button">
                        <div class="button_bcg"></div>
                        <a href="#">Check Now<span></span><span></span><span></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="home_slide__item">
            <div class="home_slide__background" style="background-image: url(styles/images/hoian-slide.jpg)"></div>
            <div class="home_slider__content">
                <div class="home_slider_content_inner animated bounceInRight">
                    <h1>tour</h1>
                    <h1>Hội An</h1>
                    <div class="button home_slider__button">
                        <div class="button_bcg"></div>
                        <a href="#">Check Now<span></span><span></span><span></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="home_slide__item">
            <div class="home_slide__background" style="background-image: url(styles/images/phuquoc_slide.jpg)"></div>
            <div class="home_slider__content">
                <div class="home_slider_content_inner animated bounceInDown">
                    <h1>tour</h1>
                    <h1>Phú Quốc</h1>
                    <div class="button home_slider__button">
                        <div class="button_bcg"></div>
                        <a href="#">Check Now<span></span><span></span><span></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_slide__nav nav__prev"><i onclick="plusSlides(-1)" class="fas fa-chevron-circle-left"></i>
        </div>
        <div class="main_slide__nav nav__next"><i onclick="plusSlides(1)" class="fas fa-chevron-circle-right"></i></i>
        </div>
        <div class="main_slide__dots">
            <ul class="customs_dots">
                <li class="customs_dot active" onclick="currentSlide(1)">01.</li>
                <li class="customs_dot" onclick="currentSlide(2)">02.</li>
                <li class="customs_dot" onclick="currentSlide(3)">03.</li>
            </ul>
        </div>
    </div>
    <div class="main_search">
        <div id="tabs" class="main_search__tabs">
            <ul class="search_tabs__list">
                <li class="search_tabs__item"><a href="#tabs-1"><i class="fas fa-hotel"></i><span>Hotels</span></a>
                </li>
            </ul>
            <div id="tabs-1" class="tabs_content animated fadeIn">
                <form action="" class="search_content">
                    <div class="search_content__item">
                        <div>Places to go</div>
                        <select name="adults" class="search_content__input">
                            <option>Hà Nội</option>
                            <option>Đà Nẵng</option>
                            <option>TP.Hồ Chí Minh</option>
                        </select>
                    </div>
                    <div class="search_content__item">
                        <div>Check-in</div>
                        <input type="text" class="search_content__input" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="search_content__item">
                        <div>Check-out</div>
                        <input type="text" class="search_content__input" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="search_content__item">
                        <div>Guest</div>
                        <select name="adults" class="search_content__input">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                        </select>
                    </div>
                    <div class="search_content__item">
                        <div>Rooms</div>
                        <select name="children" class="search_content__input">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                        </select>
                    </div>
                    <button class="button search_content__button">Search<span></span><span></span><span></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!--        Intro-->
    <div class="main_intro">
        <h2>The best travel tours</h2>
        <p>Here are our best tours right now.</p>
        <p>You will be satisfied when you sign up for the tours below.</p>
        <div class="main_intro__items">

            <?php
            include("./connect.php");
            function currency_format($number)
            {
                if (!empty($number)) {
                    return number_format($number, 0, ',', '.') . '$';
                }
            }
            $query = "select * from tours limit 3";
            $result = $con->query($query);
            $html = "";
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $money = currency_format($row['Price']);
                    echo " <div class='intro_item'>
                            <div class='intro_item__backgroud' style='background-image: url(styles/images/intro_1.jpg)'></div>
                            <div class='intro_item__content'>
                                <div class='intro_date'>from $row[StartDate] - $row[EndDate]</div>
                                <div class='intro_text'>
                                    <h1>$row[Address]</h1>
                                    <div class='intro_price'>$money</div>
                                    <div class='rating rating_$row[Rate]'>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                    </div>
                                </div>
                                <div class='button intro_button'>
                                    <div class='button_bcg'></div>
                                    <a href='detailTours.php?id=$row[Id]'>Check Now<span></span><span></span><span></span></a>
                                </div>
                            </div>
                        </div>";
                }
            }
            ?>
        </div>
    </div>
    <!--        CTA-->
    <div class="main_cta" style="background-image: url(styles/images/cta.jpg)">
        <div class="box main_cta__box">
            <div class="slider" id="single_item">
                <div>
                    <div class="cta_item">
                        <div class="cta_item__title">Luxury Đà Nẵng tour package</div>
                        <div class="cta_item__text">Da Nang tour 4 days 3 nights takes visitors to a city in the South Central region, Vietnam. This is the economic, cultural, educational, scientific and technological center of the Central - Central Highlands region. Da Nang is currently one of 13 cities of grade 1 and one of five cities directly under the Central Government of Vietnam. The origin of the word "Da Nang" is a variation of the ancient Cham word "DAKNAN", which means a large body of water or "big river", "big estuary". In 1835, with the decree of King Minh Mang, Cua Han (named Da Nang at that time) became the largest trading port in the Central region.
                        </div>
                        <div class="button cta_button">
                            <div class="button_bcg"></div>
                            <a href="#">More<span></span> <span></span> <span></span> <span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--        Offers-->
    <div class="main_offers">
        <div class="box main_offers__box">
            <h2 class="offers_title">The best deals</h2>
            <div class="offers_items">
                <?php
                include("./connect.php");
                $query = "select * from tours limit 4";
                $result = $con->query($query);
                $html = "";
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $money2 = currency_format($row['Price']);

                        echo "<div class='offers_item'>
                            <div class='offers_image'>
                                <div class='offers_image_background' style='background-image: url(./admin/upload/$row[Image]'></div>
                                <div class='offers_name'><a href='#'>Tour $row[Address]</a></div>
                            </div>
                            <div class='offers_content'>
                                <div class='offers_price'>$money2</div>
                                <div class='rating rating_$row[Rate] offers_rating'>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                </div>
                                <p class='offers_text'>$row[SortTitle]</p>
                                <div class='offers_icons'>
                                    <ul class='offers_icons_list'>
                                        <li class='offers_icons_item'><img src='styles/images/post.png' alt=''></li>
                                        <li class='offers_icons_item'><img src='styles/images/compass.png' alt=''></li>
                                        <li class='offers_icons_item'><img src='styles/images/bicycle.png' alt=''></li>
                                        <li class='offers_icons_item'><img src='styles/images/sailboat.png' alt=''></li>
                                    </ul>
                                </div>
                                <div class='offers_link'><a href='offers.php'>More</a></div>
                            </div>
                          </div>";
                    }
                }

                ?>


            </div>
        </div>
    </div>
    <!--        testmonials-->
    <div class="main_testimonials">
        <div class="box main_testimonials__box">
            <h2>What do customers say about us?</h2>
            <div id="testimonials" data-slick='{"slidesToShow": 3, "slidesToScroll": 1}'>
                <div>
                    <div class="test_item">
                        <div class="test_item_box">
                            <div class="test_image"><img src="styles/images/test_1.jpg" alt="">
                            </div>
                            <div class="test_icon"><img src="styles/images/island_t.png" alt=""></div>
                            <div class="test_content_container">
                                <div class="test_content">
                                    <div class="test_item_info">
                                        <div class="test_name">Sơn Tùng M-TP</div>
                                        <div class="test_date">12-04-2021</div>
                                    </div>
                                    <div class="test_quote_title">"Vacation was great!!!"</div>
                                    <p class="test_quote_text">The sights were so beautiful that I couldn't forget them. I am very satisfied with VietViVu's translation tools.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="test_item">
                        <div class="test_item_box">
                            <div class="test_image"><img src="styles/images/test.jpg" alt="">
                            </div>
                            <div class="test_icon"><img src="styles/images/island_t.png" alt=""></div>
                            <div class="test_content_container">
                                <div class="test_content">
                                    <div class="test_item_info">
                                        <div class="test_name">Nguyễn Hải Long</div>
                                        <div class="test_date">12-04-2020</div>
                                    </div>
                                    <div class="test_quote_title">"Wonderful vacation!!!"</div>
                                    <p class="test_quote_text">The sights were so beautiful that I couldn't forget them. I am very satisfied with the service of VietViVu.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="test_item">
                        <div class="test_item_box">
                            <div class="test_image"><img src="styles/images/test_3.jpg" alt="">
                            </div>
                            <div class="test_icon"><img src="styles/images/island_t.png" alt=""></div>
                            <div class="test_content_container">
                                <div class="test_content">
                                    <div class="test_item_info">
                                        <div class="test_name">Văn Quân</div>
                                        <div class="test_date">12-04-2019</div>
                                    </div>
                                    <div class="test_quote_title">" Vacation was great!!! "</div>
                                    <p class="test_quote_text">The sights were so beautiful that I couldn't forget them. I am very satisfied with the service of VietViVu.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--        Hotel-->
    <div class="main_hotel">
        <div class="box main_hotel__box">
            <h2 class="main_hotel_title">MOST FAVORITE HOTEL</h2>
            <div class="hotel_items">
                <div class="hotel_item">
                    <div class="hotel_image">
                        <img src="styles/images/hotel_1.jpg" alt="">
                    </div>
                    <div class="hotel_content">
                        <div class="hotel_title"><a href="#">Green Plaza Hotel</a></div>
                        <div class="hotel_price">1,000,000đ</div>
                        <div class="hotel_location">Hải Châu, Đà Nẵng</div>
                    </div>
                </div>
                <div class="hotel_item">
                    <div class="hotel_image">
                        <img src="styles/images/hotel_2.jpg" alt="">
                    </div>
                    <div class="hotel_content">
                        <div class="hotel_title"><a href="#">Hilton Đà Nẵng</a></div>
                        <div class="hotel_price">3,000,000đ</div>
                        <div class="hotel_location">Hải Châu, Đà Nẵng</div>
                    </div>
                </div>
                <div class="hotel_item">
                    <div class="hotel_image">
                        <img src="styles/images/hotel_3.jpg" alt="">
                    </div>
                    <div class="hotel_content">
                        <div class="hotel_title"><a href="#">Hanoi Hotel</a></div>
                        <div class="hotel_price">1,900,00đ</div>
                        <div class="hotel_location">Hà Nội</div>
                    </div>
                </div>
                <div class="hotel_item">
                    <div class="hotel_image">
                        <img src="styles/images/hotel_4.jpg" alt="">
                    </div>
                    <div class="hotel_content">
                        <div class="hotel_title"><a href="#">Sofitel Sài Gòn</a></div>
                        <div class="hotel_price">4,100,000đ</div>
                        <div class="hotel_location">Quận 1, HCM</div>
                    </div>
                </div>
                <div class="hotel_item">
                    <div class="hotel_image">
                        <img src="styles/images/hotel_1.jpg" alt="">
                    </div>
                    <div class="hotel_content">
                        <div class="hotel_title"><a href="#">Green Plaza Hotel</a></div>
                        <div class="hotel_price">1,000,000đ</div>
                        <div class="hotel_location">Hải Châu, Đà Nẵng</div>
                    </div>
                </div>
                <div class="hotel_item">
                    <div class="hotel_image">
                        <img src="styles/images/hotel_2.jpg" alt="">
                    </div>
                    <div class="hotel_content">
                        <div class="hotel_title"><a href="#">Hilton Đà Nẵng</a></div>
                        <div class="hotel_price">3,000,000đ</div>
                        <div class="hotel_location">Hải Châu, Đà Nẵng</div>
                    </div>
                </div>
                <div class="hotel_item">
                    <div class="hotel_image">
                        <img src="styles/images/hotel_3.jpg" alt="">
                    </div>
                    <div class="hotel_content">
                        <div class="hotel_title"><a href="#">Hanoi Hotel</a></div>
                        <div class="hotel_price">1,900,00đ</div>
                        <div class="hotel_location">Hà Nội</div>
                    </div>
                </div>
                <div class="hotel_item">
                    <div class="hotel_image">
                        <img src="styles/images/hotel_4.jpg" alt="">
                    </div>
                    <div class="hotel_content">
                        <div class="hotel_title"><a href="#">Sofitel Sài Gòn</a></div>
                        <div class="hotel_price">4,100,000đ</div>
                        <div class="hotel_location">Quận 1, HCM</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("./layout/footer.php")
?>
</div>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="./styles/js/main_js.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.min.js"></script>

<script>
    window.onscroll = function() {
        scrollFunction(),
            backTop()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 35 || document.documentElement.scrollTop > 35) {
            $(document).ready(function() {
                $(".top_bar").hide('slow');
            });

        } else {
            $(document).ready(function() {
                $(".top_bar").show();
            });
        }
    }

    $(function() {
        $("#tabs").tabs();
    });

    $(document).ready(function() {
        $(".search__item").click(function() {
            $(".input_search").toggle("slow");
        });
    })
</script>

<script>
    $("#single_item").slick({
        dots: true
    });
    $("#testimonials").slick({
        dots: false
    });
</script>

</html>