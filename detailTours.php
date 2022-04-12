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
        
    }
    $View +=1;
    $con->query("UPDATE `tours` SET `View`='$View' WHERE Id =$_GET[id]");

}


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="main">
    <div class="main__slide_offers">
        <div class="home_slide__item">
            <div class="home_slide__background" style="background-image: url(styles/images/about_slide.jpg)"></div>
            <div class="home__content">
                <div class="home__title animated bounceInDown">
                    Introduce
                </div>
            </div>
        </div>
    </div>

    <!--        About us-->
    <div class="about">
        <div class="box about__box">
            <div class="about__image"><img style="height: 36rem;" src="./admin/upload/<?php echo $Image ?>" alt=""></div>
            <div class="about__content">
                <div class="about__title"><?php echo $Name ?></div>
                <p class="about__text"><?php echo $SortTitle ?></p>
                <div class="button button_about">
                    <div class="button_bcg"></div>
                    <a href="checkOut.php?id=<?php echo $_GET["id"]?>">Order Now!<span></span><span></span><span></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="statistic">
        <div class="box statistic__box">
            <?php echo $Description ?>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: burlywood;">
                <h5 class="modal-title" id="exampleModalLabel">Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">FullName</label>
                        <input type="text" class="form-control" placeholder="Enter FullName">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sdt</label>
                        <input type="text" class="form-control" placeholder="Enter Sdt">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" placeholder="Enter Email">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
include("./layout/footer.php");
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
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
</script>

</html>