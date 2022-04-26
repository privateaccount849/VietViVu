<?php
include("./layout/header.php")
?>
<div class="main">
    <div class="main__slide_offers">
        <div class="home_slide__item">
            <div class="home_slide__background" style="background-image: url(styles/images/offers_slide.jpg)"></div>
            <div class="home__content">
                <div class="home__title animated bounceInLeft">
                    Offers
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
                <form action="offers.php" method="GET" class="search_content">
                    <div class="search_content__item">
                        <div>Places to go</div>
                        <select name="Address" class="search_content__input">
                            <?php
                            include("./connect.php");
                            $result2 = $con->query("SELECT Address FROM `tours` GROUP by Address");
                            while ($row2 = mysqli_fetch_array($result2)) {
                                echo "<option>$row2[Address]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="search_content__item">
                        <div>Check-in</div>
                        <input type="date" value="<?php echo date("Y-m-d"); ?>" name="StartDate" type="text" class="search_content__input" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="search_content__item">
                        <div>Check-out</div>
                        <input type="date" name="EndDate" type="text" class="search_content__input" placeholder="YYYY-MM-DD">
                    </div>
                   
                    <div class="search_content__item">
                        <div>Rate</div>
                        <select name="type" class="search_content__input">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <button name="searchTour" class="button search_content__button">Search<span></span><span></span><span></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="offers">
        
        <div class="box offers__box2">
            <div class="offers_grid" style="position: relative;">
                <?php
                require_once './admin/common/Paginator.class.php';

                $limit      = (isset($_GET['limit'])) ? $_GET['limit'] : 10;
                $page       = (isset($_GET['page'])) ? $_GET['page'] : 1;
                $links      = (isset($_GET['links'])) ? $_GET['links'] : 7;
                if (isset($_GET['searchTour'])) {
                    if ($_GET['EndDate']) {
                        $query      = "SELECT * FROM `tours` where EndDate like '%$_GET[EndDate]%' or StartDate like '%$_GET[StartDte]%' or Address like '%$_GET[Address]%' or Rate like '%$_GET[type]%'";
                        
                    } 
                    else{
                        $query      = "SELECT * FROM `tours` where StartDate like '%$_GET[StartDate]%' or Address like '%$_GET[Address]%'or Rate like '%$_GET[type]%'";
                    }
                } else {
                    $query      = "SELECT * FROM `tours`";
                }
                echo $query;

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