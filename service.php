<?php
include("./layout/header.php")


?>
<link rel="stylesheet" type="text/css" href="https://preview.colorlib.com/theme/travelix/A.styles,,_bootstrap4,,_bootstrap.min.css+plugins,,_font-awesome-4.7.0,,_css,,_font-awesome.min.css,Mcc.OzM49qaZ0r.css.pagespeed.cf.PGSAfPoyM2.css" />
<link rel="stylesheet" type="text/css" href="https://preview.colorlib.com/theme/travelix/styles/A.offers_styles.css+offers_responsive.css,Mcc.te5VF-H1AU.css.pagespeed.cf.m0UGBXmWzA.css" />
<div class="main">
    <div class="main__slide_offers">
        <div class="home_slide__item">
            <div class="home_slide__background" style="background-image: url(styles/images/offers_slide.jpg)"></div>
            <div class="home__content">
                <div class="home__title animated bounceInLeft">
                    Let choose a hotel you want!
                </div>
            </div>
        </div>
    </div>
    <!--        Intro-->

    <div class="offers">
        <div class="box offers__box1">
            <div class="offers_sorting_container">
                <ul class="offers_sorting" style="width: 100%;display: flex;justify-content: space-evenly;">
                    <li id="offer_1" style="width: 45%; margin-left: 60px;">
                        <span class="sorting_text">Price</span>
                        <i class="fas fa-angle-down"></i>
                        <ul id="offer_box_1" class="animated fadeInUp">
                            <li class="sort_btn"><span><a href="?id=<?php echo $_GET['id'] ?>&&order=0">Show All</a></span></li>
                            <li class="sort_btn"><span><a href="?id=<?php echo $_GET['id'] ?>&&order=1">Ascending</a></span></li>
                            <li class="sort_btn"><span><a href="?id=<?php echo $_GET['id'] ?>&&order=2">Descending</a></span></li>
                        </ul>
                    </li>

                    <li id="offer_2" style="width: 50%; margin-left: 60px;">
                        <span class="sorting_text">Stars</span>
                        <i class="fas fa-angle-down"></i>
                        <ul id="offer_box_2">
                            <li class="filter_btn" data-filter=".rating_1"><span><a href="?id=<?php echo $_GET['id'] ?>&&order=3">Show All</a></span></li>
                            <li class="filter_btn" data-filter=".rating_2"><span><a href="?id=<?php echo $_GET['id'] ?>&&order=4">Ascending</a></span></li>
                            <li class="filter_btn" data-filter=".rating_3"><span><a href="?id=<?php echo $_GET['id'] ?>&&order=5">3</a></span></li>
                            <li class="filter_btn" data-filter=".rating_4"><span><a href="?id=<?php echo $_GET['id'] ?>&&order=6">4</a></span></li>
                            <li class="filter_btn" data-filter=".rating_5"><span><a href="?id=<?php echo $_GET['id'] ?>&&order=7">5</a></span></li>

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
                if (isset($_GET['order'])) {
                    if ($_GET['order'] == 0) {
                        $query      = "SELECT * FROM `hotels` left join tourhotels on hotels.IdHotel = tourhotels.HotelId left join tours on tourhotels.TourId = tours.Id where tourId=$_GET[id]";
                    } else if ($_GET['order'] == 1) {
                        $query      = "SELECT * FROM `hotels` left join tourhotels on hotels.IdHotel = tourhotels.HotelId left join tours on tourhotels.TourId = tours.Id where tourId=$_GET[id] order BY HotelPrice";
                    } else if ($_GET['order'] == 2) {
                        $query      = "SELECT * FROM `hotels` left join tourhotels on hotels.IdHotel = tourhotels.HotelId left join tours on tourhotels.TourId = tours.Id where tourId=$_GET[id] order BY HotelPrice DESC";
                    } else if ($_GET['order'] == 3) {
                        $query      = "SELECT * FROM `hotels` left join tourhotels on hotels.IdHotel = tourhotels.HotelId left join tours on tourhotels.TourId = tours.Id where tourId=$_GET[id] order BY HotelRate";
                    } else if ($_GET['order'] == 4) {
                        $query      = "SELECT * FROM `hotels` left join tourhotels on hotels.IdHotel = tourhotels.HotelId left join tours on tourhotels.TourId = tours.Id where tourId=$_GET[id] order BY HotelRate";
                    } else if ($_GET['order'] == 5) {
                        $query      = "SELECT * FROM `hotels` left join tourhotels on hotels.IdHotel = tourhotels.HotelId left join tours on tourhotels.TourId = tours.Id where tourId=$_GET[id] AND HotelRate = 3";
                    } else if ($_GET['order'] == 6) {
                        $query      = "SELECT * FROM `hotels` left join tourhotels on hotels.IdHotel = tourhotels.HotelId left join tours on tourhotels.TourId = tours.Id where tourId=$_GET[id] AND HotelRate = 4";
                    } else if ($_GET['order'] == 7) {
                        $query      = "SELECT * FROM `hotels` left join tourhotels on hotels.IdHotel = tourhotels.HotelId left join tours on tourhotels.TourId = tours.Id where tourId=$_GET[id] AND HotelRate = 5";
                    }
                } else {
                    $query      = "SELECT * FROM `hotels` left join tourhotels on hotels.IdHotel = tourhotels.HotelId left join tours on tourhotels.TourId = tours.Id where tourId=$_GET[id]";
                }

                $Paginator  = new Paginator($con, $query);

                $results    = $Paginator->getData($limit, $page);
                function currency_format($number, $suffix = 'USD')
                {
                    if (!empty($number)) {
                        return number_format($number, 0, ',', '.') . "{$suffix}";
                    }
                }
                for ($i = 0; $i < count($results->data); $i++) : ?>
                    <div class="offers_item2">
                        <div class="offers_image f_image">
                            <div class="offers_image_background" style="background-image:url(./admin/upload/<?php echo $results->data[$i]['HotelImage']; ?>)"></div>
                            <div class="offers_name"><a href="detailHotels.php?id=<?php echo $results->data[$i]['IdHotel']; ?>"><?php echo $results->data[$i]['HotelName']; ?></a></div>
                        </div>
                        <div class="offers_content">
                            <div class="offers_price"><?php echo currency_format($results->data[$i]['HotelPrice']); ?></div>
                            <div class="rating rating_<?php echo $results->data[$i]['HotelRate']; ?> offers_rating" data-rating="4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="offers_text"><?php echo $results->data[$i]['HotelSortTitle']; ?>.</p>
                            <div class="offers_icons">
                                <ul class="offers_icons_list">
                                    <li class="offers_icons_item"><img src="styles/images/post.png" alt=""></li>
                                    <li class="offers_icons_item"><img src="styles/images/compass.png" alt=""></li>
                                    <li class="offers_icons_item"><img src="styles/images/bicycle.png" alt=""></li>
                                    <li class="offers_icons_item"><img src="styles/images/sailboat.png" alt=""></li>
                                </ul>
                            </div>
                            <div class="button book_button"><a href='checkOut.php?id=<?php echo $_GET['id'];?>&&hotelId=<?php echo $results->data[$i]['IdHotel'];?>'>book<span></span><span></span><span></span></a>
                            </div>
                            <div class="offer_reviews">
                                <div class="offer_reviews_content">
                                    <div class="offer_reviews_title">very good</div>
                                    <div class="offer_reviews_subtitle"><?php echo $results->data[$i]['View']; ?> View</div>
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

<script src="https://preview.colorlib.com/theme/travelix/styles/bootstrap4/popper.js"></script>
<script src="https://preview.colorlib.com/theme/travelix/styles,_bootstrap4,_bootstrap.min.js+plugins,_Isotope,_isotope.pkgd.min.js.pagespeed.jc.k3eNgP1vk_.js"></script>

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