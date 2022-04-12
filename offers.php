<?php
include("./layout/header.php")
?>
<div class="main">
    <div class="main__slide_offers">
        <div class="home_slide__item">
            <div class="home_slide__background" style="background-image: url(styles/images/offers_slide.jpg)"></div>
            <div class="home__content">
                <div class="home__title animated bounceInLeft">
                    Voucher
                </div>
            </div>
        </div>
    </div>
    <!--        Intro-->
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
    <div class="offers">
        <div class="box offers__box1">
            <div class="offers_sorting_container">
                <ul class="offers_sorting">
                    <li id="offer_1">
                        <span class="sorting_text">Giá</span>
                        <i class="fas fa-angle-down"></i>
                        <ul id="offer_box_1" class="animated fadeInUp">
                            <li class="sort_btn"><span>Hiện tất cả</span></li>
                            <li class="sort_btn"><span>Tăng dần</span></li>
                            <li class="sort_btn"><span>Giảm dần</span></li>
                        </ul>
                    </li>
                    <li id="offer_2">
                        <span class="sorting_text">Thứ tự</span>
                        <i class="fas fa-angle-down"></i>
                        <ul id="offer_box_2">
                            <li class="sort_btn"><span>Mặc định</span></li>
                            <li class="sort_btn"><span>Bảng chữ cái</span></li>
                        </ul>
                    </li>
                    <li id="offer_3">
                        <span class="sorting_text">Sao</span>
                        <i class="fas fa-angle-down"></i>
                        <ul id="offer_box_3">
                            <li class="filter_btn" data-filter="*"><span>Hiện tất cả</span></li>
                            <li class="sort_btn"><span>Giảm dần</span></li>
                            <li class="filter_btn" data-filter=".rating_3"><span>3</span></li>
                            <li class="filter_btn" data-filter=".rating_4"><span>4</span></li>
                            <li class="filter_btn" data-filter=".rating_5"><span>5</span></li>
                        </ul>
                    </li>
                    <li id="offer_4">
                        <span class="sorting_text">Khoảng cách</span>
                        <i class="fas fa-angle-down"></i>
                        <ul id="offer_box_4">
                            <li class="num_sorting_btn"><span>50Km</span></li>
                            <li class="num_sorting_btn"><span>100Km</span></li>
                            <li class="num_sorting_btn"><span>200Km</span></li>
                        </ul>
                    </li>
                    <li id="offer_5">
                        <span class="sorting_text">Đánh giá</span>
                        <i class="fas fa-angle-down"></i>
                        <ul id="offer_box_5">
                            <li class="num_sorting_btn"><span>Very Good</span></li>
                            <li class="num_sorting_btn"><span>Good</span></li>
                            <li class="num_sorting_btn"><span>Medium</span></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="box offers__box2">
            <div class="offers_grid" style="position: relative;">
                <?php
                require_once './admin/common/Paginator.class.php';

                require_once("./connect.php");

                $limit      = (isset($_GET['limit'])) ? $_GET['limit'] : 10;
                $page       = (isset($_GET['page'])) ? $_GET['page'] : 1;
                $links      = (isset($_GET['links'])) ? $_GET['links'] : 7;
                $query      = "SELECT * FROM `tours`";

                $Paginator  = new Paginator($con, $query);

                $results    = $Paginator->getData($limit, $page);
                function currency_format($number, $suffix = 'đ')
                {
                    if (!empty($number)) {
                        return number_format($number, 0, ',', '.') . "{$suffix}";
                    }
                }
                for ($i = 0; $i < count($results->data); $i++) : ?>
                    <div class="offers_item2">
                        <div class="offers_image f_image">
                            <div class="offers_image_background" style="background-image:url(./admin/upload/<?php echo $results->data[$i]['Image']; ?>)"></div>
                            <div class="offers_name"><a href="#"><?php echo $results->data[$i]['Name']; ?></a></div>
                        </div>
                        <div class="offers_content">
                            <div class="offers_price"><?php echo currency_format($results->data[$i]['Price']); ?></div>
                            <div class="rating rating_<?php echo $results->data[$i]['Rate']; ?> offers_rating" data-rating="4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="offers_text"><?php echo $results->data[$i]['SortTitle']; ?>.</p>
                            <div class="offers_icons">
                                <ul class="offers_icons_list">
                                    <li class="offers_icons_item"><img src="styles/images/post.png" alt=""></li>
                                    <li class="offers_icons_item"><img src="styles/images/compass.png" alt=""></li>
                                    <li class="offers_icons_item"><img src="styles/images/bicycle.png" alt=""></li>
                                    <li class="offers_icons_item"><img src="styles/images/sailboat.png" alt=""></li>
                                </ul>
                            </div>
                            <div class="button book_button"><a href='detailTours.php?id=<?php echo $results->data[$i]['Id']; ?>'>book<span></span><span></span><span></span></a>
                            </div>
                            <div class="offer_reviews">
                                <div class="offer_reviews_content">
                                    <div class="offer_reviews_title">very good</div>
                                    <div class="offer_reviews_subtitle"><?php echo $results->data[$i]['View']; ?> lượt xem</div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
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