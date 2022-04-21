<?php
require_once("./connect.php");
include("./layout/header.php");

if (isset($_GET['id'])) {
    $result = $con->query("SELECT * FROM `tours` WHERE Id = $_GET[id]");
    while ($row = mysqli_fetch_array($result)) {
        $Image =  $row['Image'];
        $Name =  $row['Name'];
        $SortTitle =  $row['SortTitle'];
        $Description =  $row['Description'];
        $View = $row['View'];
        $Price = $row['Price'];
    }

    $result2 = $con->query("SELECT * FROM `hotels` WHERE IdHotel = $_GET[hotelId]");
    while ($row2 = mysqli_fetch_array($result2)) {
        $hotelName =  $row2['HotelName'];
        $hotelPrice = $row2['HotelPrice'];
    }
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
                                <form class="card-body" method="POST" action="./vnpay_php/vnpay_create_payment.php">

                                    <!--Grid row-->
                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-6 mb-2">

                                            <!--firstName-->
                                            <div class="md-form ">
                                                <label for="firstName" class="custom-label">First name</label>
                                                <input name="firstName" type="text" id="firstName" class="form-control custom-input" placeholder="Long" required>
                                            </div>

                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-md-6 mb-2">

                                            <!--lastName-->
                                            <div class="md-form">
                                                <label for="lastName" class="custom-label">Last name</label>

                                                <input name="lastName" type="text" id="lastName" class="form-control custom-input" placeholder="Ngo Thanh" required>
                                            </div>

                                        </div>
                                        <!--Grid column-->

                                    </div>
                                    <!--Grid row-->
                                    <br>
                                    <!--email-->
                                    <div class="md-form mb-5">
                                        <label for="email" class="custom-label">Email</label>

                                        <input name="email" type="text" id="email" class="form-control custom-input" placeholder="youremail@example.com" required>
                                    </div>

                                    <!--address-->
                                    <div class="md-form mb-5">
                                        <label for="address" class="custom-label">Address</label>
                                        <input name="address" type="text" id="address" class="form-control custom-input" placeholder="1234 Main St">
                                    </div>

                                    <!--phone-number-->
                                    <div class="md-form mb-5">
                                        <label for="phone-number" class="custom-label">Phone Number</label>
                                        <input name="phoneNumber" type="number" id="phone-number" class="form-control custom-input" placeholder="0988410926" required>
                                    </div>
                                    <div class="row">
                                        <!--Grid column-->
                                        <div class="col-lg-4 col-md-12 mb-4">
                                            <label for="country" class="custom-label">Adults</label>
                                            <input min="0" type="number" class="form-control custom-input" id="Adults" placeholder="0" required>
                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-lg-4 col-md-6 mb-4">

                                            <label for="state" class="custom-label">Kids</label>
                                            <input min="0" type="number" class="form-control custom-input" id="Kids" placeholder="0">
                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-lg-4 col-md-6 mb-4">

                                            <label for="zip" class="custom-label">Baby</label>
                                            <input min="0" type="number" class="form-control custom-input" id="Baby" placeholder="0">
                                        </div>
                                        <!--Grid column-->
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <h4>Method Payment</h4>
                                            <div class="form-group">
                                                <label for="bank_code">Ngân hàng</label>
                                                <select name="bank_code" id="bank_code" class="form-control">
                                                    <option value="">Không chọn(Cash)</option>
                                                    <option value="NCB"> Ngan hang NCB</option>
                                                    <option value="AGRIBANK"> Ngan hang Agribank</option>
                                                    <option value="SCB"> Ngan hang SCB</option>
                                                    <option value="SACOMBANK">Ngan hang SacomBank</option>
                                                    <option value="EXIMBANK"> Ngan hang EximBank</option>
                                                    <option value="MSBANK"> Ngan hang MSBANK</option>
                                                    <option value="NAMABANK"> Ngan hang NamABank</option>
                                                    <option value="VNMART"> Vi dien tu VnMart</option>
                                                    <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                                    <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                                    <option value="HDBANK">Ngan hang HDBank</option>
                                                    <option value="DONGABANK"> Ngan hang Dong A</option>
                                                    <option value="TPBANK"> Ngân hàng TPBank</option>
                                                    <option value="OJB"> Ngân hàng OceanBank</option>
                                                    <option value="BIDV"> Ngân hàng BIDV</option>
                                                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                                    <option value="VPBANK"> Ngan hang VPBank</option>
                                                    <option value="MBBANK"> Ngan hang MBBank</option>
                                                    <option value="ACB"> Ngan hang ACB</option>
                                                    <option value="OCB"> Ngan hang OCB</option>
                                                    <option value="IVB"> Ngan hang IVB</option>
                                                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <!--phone-number-->
                                    <div class="md-form mb-5">
                                        <label for="phone-number" class="custom-label">Note</label>
                                        <input name="order_desc" type="text" id="phone-number" class="form-control custom-input" placeholder="0988410926" required>
                                    </div>
                                    <hr>
                                    <input name="amount" type="hidden" id="totalPayment" />
                                    <hr class="mb-4">
                                    <button name="redirect" class="btn btn-primary btn-lg btn-block" type="submit" style="height: 40px; font-size: medium;">Payment Now!</button>
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
                                    <span id="priceTour" class="text-muted"><?php echo $Price ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h3 class="my-0">Hotel Name</h3>
                                        <h5 class="text-muted"><?php echo $hotelName ?></h5>
                                    </div>
                                    <span id="priceHotel" class="text-muted"><?php echo $hotelPrice ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h3 class="my-0">Adults</h3>
                                        <h5 class="text-muted" id="briefAdults">x1</h5>
                                    </div>
                                    <span class="text-muted" id="priceAdults">0</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h3 class="my-0">Kids (2 - 12)</h3>
                                        <h5 class="text-muted" id="briefKids">x0</h5>
                                    </div>
                                    <span class="text-muted" id="priceKids">0</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h3 class="my-0">Baby (under 2 year old)</h3>
                                        <h5 class="text-muted" id="briefBaby">x0</h5>
                                    </div>
                                    <span class="text-muted" id="priceBaby">0</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between bg-light">
                                    <h3 id="total" style="color: red;">Total </h3>(USD)
                                </li>
                            </ul>
                            <!-- Cart -->

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
        $("#priceAdults").text((e.target.value * <?php echo $Price ?>));
        $("#total").text(
            parseInt($("#priceHotel").text()) +
            parseInt($("#priceAdults").text()) +
            parseInt($("#priceKids").text()) +
            parseInt($("#priceBaby").text()));
        $("#totalPayment").val(
            parseInt($("#priceHotel").text()) +
            parseInt($("#priceAdults").text()) +
            parseInt($("#priceKids").text()) +
            parseInt($("#priceBaby").text()));
    })

    $("#Kids").on("input", (e) => {
        $("#briefKids").text("x" + (e.target.value))
        $("#priceKids").text((e.target.value * <?php echo $Price - 50 ?>));
        $("#total").text(
            parseInt($("#priceHotel").text()) +
            parseInt($("#priceAdults").text()) +
            parseInt($("#priceKids").text()) +
            parseInt($("#priceBaby").text()));
        $("#totalPayment").val(
            parseInt($("#priceHotel").text()) +
            parseInt($("#priceAdults").text()) +
            parseInt($("#priceKids").text()) +
            parseInt($("#priceBaby").text()));

    })

    $("#Baby").on("input", (e) => {
        $("#briefBaby").text("x" + (e.target.value))
        $("#priceBaby").text((e.target.value * <?php echo $Price - 75 ?>));
        $("#total").text(
            parseInt($("#priceHotel").text()) +
            parseInt($("#priceAdults").text()) +
            parseInt($("#priceKids").text()) +
            parseInt($("#priceBaby").text())
        );
        $("#totalPayment").val(
            parseInt($("#priceHotel").text()) +
            parseInt($("#priceAdults").text()) +
            parseInt($("#priceKids").text()) +
            parseInt($("#priceBaby").text()));

    })
    $("#total").text(
        parseInt($("#priceHotel").text()) +
        parseInt($("#priceAdults").text()) +
        parseInt($("#priceKids").text()) +
        parseInt($("#priceBaby").text())
    );
</script>

</html>