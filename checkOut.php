<?php
require_once("./connect.php");
include("./layout/header.php");
if (isset($_GET["id"])) {
    $result = $con->query("SELECT * FROM `tours` WHERE Id = $_GET[id]");
    while ($row = mysqli_fetch_array($result)) {
        $Image =  $row['Image'];
        $Name =  $row['Name'];
        $SortTitle =  $row['SortTitle'];
        $Description =  $row['Description'];
        $View = $row['View'];
        $Price = $row['Price'];
    }
    $View += 1;
    $con->query("UPDATE `tours` SET `View`='$View' WHERE Id =$_GET[id]");
}


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="main">
    <div class="main__slide_offers">
        <div class="home_slide__item">
            <div class="home_slide__background" style="background-image: url(styles/images/about_slide.jpg)"></div>
            <div class="home__content">
                <div class="home__title animated bounceInDown">
                    Processing to Payment
                </div>
            </div>
        </div>
    </div>


    <div class="statistic">
        <div class="box statistic__box">
            <!-- Navbar -->


            <!--Main layout-->
            <main class="mt-5 pt-4">
                <div class="container wow fadeIn">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-8 mb-4">

                            <!--Card-->
                            <div class="card">

                                <!--Card content-->
                                <form class="card-body">

                                    <!--Grid row-->
                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-6 mb-2">

                                            <!--firstName-->
                                            <div class="md-form ">
                                                <label for="firstName" class="custom-label">First name</label>
                                                <input type="text" id="firstName" class="form-control custom-input" placeholder="Long">
                                            </div>

                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-md-6 mb-2">

                                            <!--lastName-->
                                            <div class="md-form">
                                                <label for="lastName" class="custom-label">Last name</label>

                                                <input type="text" id="lastName" class="form-control custom-input" placeholder="Ngo Thanh">
                                            </div>

                                        </div>
                                        <!--Grid column-->

                                    </div>
                                    <!--Grid row-->
                                    <br>
                                    <!--email-->
                                    <div class="md-form mb-5">
                                        <label for="email" class="custom-label">Email</label>

                                        <input type="text" id="email" class="form-control custom-input" placeholder="youremail@example.com">
                                    </div>

                                    <!--address-->
                                    <div class="md-form mb-5">
                                        <label for="address" class="custom-label">Address</label>
                                        <input type="text" id="address" class="form-control custom-input" placeholder="1234 Main St">
                                    </div>

                                    <!--phone-number-->
                                    <div class="md-form mb-5">
                                        <label for="phone-number" class="custom-label">Phone Number</label>
                                        <input type="number" id="phone-number" class="form-control custom-input" placeholder="0988410926">
                                    </div>
                                    <div class="row">
                                        <!--Grid column-->
                                        <div class="col-lg-4 col-md-12 mb-4">
                                            <label for="country" class="custom-label">Adults</label>
                                            <input type="number" class="form-control custom-input" id="Adults" placeholder="0" required>



                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-lg-4 col-md-6 mb-4">

                                            <label for="state" class="custom-label">Kids</label>
                                            <input type="number" class="form-control custom-input" id="Kids" placeholder="0" required>



                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-lg-4 col-md-6 mb-4">

                                            <label for="zip" class="custom-label">Baby</label>
                                            <input type="number" class="form-control custom-input" id="Baby" placeholder="0" required>
                                        </div>
                                        <!--Grid column-->
                                    </div>
                                   
                                    <?php
                                    $result2 = $con->query("SELECT * FROM `hotels` left join tourhotels on hotels.IdHotel = tourhotels.HotelId left join tours on tourhotels.TourId = tours.Id where tourId=$_GET[id]");
                                    ?>
                                    <div class="md-form mb-12">
                                        <label for="phone-number" class="custom-label">Hotel of The Tour</label>
                                        <select style="height: 33px; margin: bottom 15px;" class="form-control custom-input">
                                            <option selected>Choose a Hotel</option>
                                            <?php
                                            while ($row2 = mysqli_fetch_array($result2)) {
                                                echo "<option value='$row2[Id]'>$row2[HotelName]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="same-address">
                                        <label class="custom-control-label custom-label" for="same-address" style="font-size: medium;">Shipping address is the same as my billing address</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="save-info">
                                        <label class="custom-control-label" for="save-info" style="font-size: medium;">Save this information for next time</label>
                                    </div>
                                    <hr>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit" style="height: 40px; font-size: medium;">Payment Now!</button>
                                </form>
                            </div>
                            <!--/.Card-->

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-4 mb-4">

                            <!-- Heading -->
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                            </h4>

                            <!-- Cart -->
                            <ul class="list-group mb-3 z-depth-1">
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h3 class="my-0">Tour Name</h3>
                                        <h5 class="text-muted"><?php echo $Name ?></h5>
                                    </div>
                                    <span class="text-muted"><?php echo $Price ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h3 class="my-0">Adults</h3>
                                        <h5 class="text-muted" id="briefAdults">x0</h5>
                                    </div>
                                    <span class="text-muted" id="priceAdults">$50</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h3 class="my-0">Kids (2 - 12)</h3>
                                        <h5 class="text-muted" id="briefKids">x0</h5>
                                    </div>
                                    <span class="text-muted" id="priceKids">$8</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h3 class="my-0">Baby (under 2 year old)</h3>
                                        <h5 class="text-muted" id="briefBaby">x0</h5>
                                    </div>
                                    <span class="text-muted" id="priceBaby">$8</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between bg-light">
                                    <div class="text-success">
                                        <h3 class="my-0">Promo code</h3>
                                    </div>
                                    <span class="text-success">-$5</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <h3 style="color: red;">Total (USD)</h3>
                                    <strong>$20</strong>
                                </li>
                            </ul>
                            <!-- Cart -->

                            <!-- Promo code -->
                            <form class="card p-2">
                                <div class="input-group">
                                    <input type="text" class="form-control custom-input" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary btn-md waves-effect m-0" type="button" style="font-size: 14px;">Redeem</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Promo code -->

                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                </div>
            </main>
            <!--Main layout-->
        </div>
    </div>

</div>

<!-- Modal -->

<?php
include("./layout/footer.php");
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
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



    $("#Adults").on("input", (e) => {
        $("#briefAdults").text("x" + (e.target.value));
        $("#priceAdults").text("$" + (e.target.value * <?php echo $Price ?>));

    })

    $("#Kids").on("input", (e) => {
        $("#briefKids").text("x" + (e.target.value))
        $("#priceKids").text("$" + (e.target.value * <?php echo $Price ?>));

    })

    $("#Baby").on("input", (e) => {
        $("#briefBaby").text("x" + (e.target.value))
        $("#priceBaby").text("$" + (e.target.value * <?php echo $Price ?>));

    })
</script>

</html>